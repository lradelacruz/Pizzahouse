<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    public function pizza()
    {
        return $this->belongsTo(Pizza::class, 'pizza_id');
    }
    
}
