<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    public function orders()
    {
        return $this->hasMany(Order::class, 'pizza_type', 'type');
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class, 'pizza_id');
    }
}
