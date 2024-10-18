<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Receive extends Model
{
    use HasFactory;
    protected $fillable = [
        "amount",
        "payer",
        "customer_id",
        "payment_id",
        "user_id",
        "desc",
        "profit",
        "deposit",
        "withdrawal"

    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    Public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
