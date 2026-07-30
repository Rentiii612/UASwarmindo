<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'table_number',
        'total_amount',
        'status',
        'notes',
    ];

    /**
     * Relasi ke detail pesanan
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Relasi ke pembayaran
     */
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    /**
     * Total item yang dipesan
     */
    public function getTotalItemAttribute()
    {
        return $this->items->sum('quantity');
    }
}