<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TransferBeverage extends Pivot
{
    public static function boot()
    {
        parent::boot();
        /**
         * Write code on Method
         *
         * @return response()
         */
        static::creating(function ($transferBeverage) {
            $transferBeverage->amount = $transferBeverage->beverage->inv_cost * $transferBeverage->quantity;
        });

        static::created(function ($transferBeverage) {
            // FROM
            $fromStoreBeverage =  StoreBeverage::firstOrCreate(
                [
                    'store_id' => $transferBeverage->transfer->storeFrom->id,
                    'beverage_id' => $transferBeverage->beverage->id,
                ],
                [
                    'on_hand_qty' => 0
                ]
            );

            StoreBeverage::where('store_id', $transferBeverage->transfer->storeFrom->id)
                ->where('beverage_id', $transferBeverage->beverage->id)
                ->update(['on_hand_qty' => $fromStoreBeverage->on_hand_qty - $transferBeverage->quantity]);

            // TO
            $toStoreBeverage =  StoreBeverage::firstOrCreate(
                [
                    'store_id' => $transferBeverage->transfer->storeTo->id,
                    'beverage_id' => $transferBeverage->beverage->id,
                ],
                [
                    'on_hand_qty' => 0
                ]
            );

            StoreBeverage::where('store_id', $transferBeverage->transfer->storeTo->id)
                ->where('beverage_id', $transferBeverage->beverage->id)
                ->update(['on_hand_qty' => $toStoreBeverage->on_hand_qty + $transferBeverage->quantity]);
        });

        static::updating(function ($transferBeverage) {
            $transferBeverage->amount = $transferBeverage->beverage->inv_cost * $transferBeverage->quantity;
        });
    }

    public function beverage()
    {
        return $this->belongsTo(Beverage::class, 'beverage_id');
    }

    public function transfer()
    {
        return $this->belongsTo(Transfer::class, 'transfer_id');
    }
}
