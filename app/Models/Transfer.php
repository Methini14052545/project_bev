<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    public function storeFrom()
    {
        return $this->belongsTo(Store::class, 'store_from_id');
    }

    public function storeTo()
    {
        return $this->belongsTo(Store::class, 'store_to_id');
    }
    
    public function beverages()
    {
        return $this->belongsToMany(Beverage::class, 'transfer_beverage','transfer_id','beverage_id');
    }

    public function transferBeverages()
    {
        return $this->hasMany(TransferBeverage::class,'transfer_id');
    }
    
}
