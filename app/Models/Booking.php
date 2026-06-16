<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'equipment_id',
        'booking_code',
        'start_date',
        'end_date',
        'duration',
        'project_location',
        'operator_needed',
        'delivery_needed',
        'subtotal',
        'tax',
        'total',
        'status',
        'notes'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function equipment(): BelongsTo
    {
        return $this->belongsTo(Equipment::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }
}