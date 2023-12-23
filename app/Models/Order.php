<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['pizza_type', 'pizza_base', 'customer_name', 'total_amount', 'paid_amount', 'change'];
    
    public function pizza()
    {
        return $this->belongsTo(Pizza::class, 'pizza_type', 'type');
    }
}


