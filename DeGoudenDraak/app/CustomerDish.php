<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerDish extends Model
{
    protected $table = 'customer_dish';

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function dishes()
    {
        return $this->belongsTo(Dish::class, 'dish_id', 'id');
    }
}
