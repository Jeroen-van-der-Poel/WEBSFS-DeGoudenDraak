<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    public function users()
    {
        return $this->BelongsToMany(User::class)->withPivot('amount', 'sale_date');
    }

    public function menu()
    {
        return $this->BelongsTo(Menu::class);
    }
}
