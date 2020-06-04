<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDish extends Model
{
    protected $table = 'dish_user';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function dish()
    {
        return $this->belongsTo(Dish::class, 'dish_id', 'id');
    }
}
