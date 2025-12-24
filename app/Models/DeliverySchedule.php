<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DeliverySchedule extends Model
{
    protected $fillable = [
        'order_id',
        'delivery_date',
        'delivery_time',
        'customer_address',
        'customer_phone',
        'status',
        'notes',
    ];

    protected $casts = [
        'delivery_date' => 'date',
        'delivery_time' => 'datetime:H:i:s',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
