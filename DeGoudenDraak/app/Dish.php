<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    public function users()
    {
        return $this->BelongsToMany(User::class)->withPivot('amount', 'sale_date', 'comment');
    }

    public function menu()
    {
        return $this->BelongsTo(Menu::class);
    }

    public function customers()
    {
        return $this->BelongsToMany(Customer::class, 'customer_dish')->withPivot('amount', 'sale_date', 'comment', 'order_number', 'pickup_date');
    }
}
