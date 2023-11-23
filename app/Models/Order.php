<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;

protected $fillable = ['user_id','phone','address', 'order_status', 'total',' discount', 'delivery_charges'

    ];


    /**
     * Define the relationship between orders and customers.
     */


    /**
     * Define the relationship between orders and order details.
     */
    
    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
