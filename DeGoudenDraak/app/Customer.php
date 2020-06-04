<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];

    public function help()
    {
        return $this->hasMany(CustomerHelp::class);
    }

    public function dishes()
    {
        return $this->BelongsToMany(Dish::class)->withPivot('amount', 'sale_date', 'comment');
    }
}
