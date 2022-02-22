<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreOrder extends Model
{
    use HasFactory;

    protected $fillable = ['quantity', 'price', 'subtotal', 'user_id', 'store_id', 'product_id', 'order_no', 'order_id', 'payment_status'];

    public function getCreatedAtAttribute($value)
{
    return Carbon::parse($value)->toDateTimeString();
}

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function orderinfo()
    {
        return $this->hasOne(OrderInformation::class,'order_id','order_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
