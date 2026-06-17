<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Equipment extends Model
{
    protected $table = 'equipments';
    protected $fillable = [
        'category_id',
        'code',
        'name',
        'brand',
        'year',
        'daily_price',
        'status',
        'image',
        'description',
    ];

    protected $casts = [
        'daily_price' => 'decimal:2',
        'year' => 'integer',
    ];

    /**
     * Relasi ke kategori
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relasi ke booking
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}