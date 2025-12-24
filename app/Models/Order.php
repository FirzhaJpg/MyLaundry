<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\OrderStatusHistory;
use App\Models\DeliverySchedule;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_name',
        'customer_phone',
        'service_type',
        'quantity',
        'price',
        'order_date',
        'payment_status',
        'laundry_status',
    ];

    protected $casts = [
        'order_date' => 'datetime',
        'quantity' => 'decimal:2',
        'price' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function statusHistory(): HasMany
    {
        return $this->hasMany(OrderStatusHistory::class);
    }

    public function deliverySchedule(): HasOne
    {
        return $this->hasOne(DeliverySchedule::class);
    }
}
