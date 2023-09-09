<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class StoreBeverage extends Pivot
{
    protected $table = 'store_beverages';

    public function beverage()
    {
        return $this->belongsTo(Beverage::class, 'beverage_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
}
