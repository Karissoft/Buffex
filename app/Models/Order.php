<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_no',
        'status',
        'total_amount',
        'tax',
        'commission',
        'shipping_charges',
        'promo',
        'discount',
        'grand_total',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderhistories()
    {
        return $this->hasMany(OrderHistory::class)->with('store');
    }
    public function orderinfo()
    {
        return $this->hasOne(OrderInformation::class);
    }
    public function storeorder()
    {
        return $this->hasMany(StoreOrder::class);
    }
}
