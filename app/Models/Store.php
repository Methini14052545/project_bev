<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    public function beverages()
    {
        return $this->belongsToMany(Beverage::class, 'store_beverages','store_id','beverage_id');
    }

    public function storeBeverages()
    {
        return $this->hasMany(StoreBeverage::class,'store_id');
    }
}
