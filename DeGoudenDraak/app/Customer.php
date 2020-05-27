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
}
