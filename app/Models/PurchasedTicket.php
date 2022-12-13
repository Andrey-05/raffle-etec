<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class PurchasedTicket extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected static function booted()
    {
        static::creating(fn (PurchasedTicket $purchasedTicket) => $purchasedTicket->id = (string) Uuid::uuid4());
    }

    protected $fillable = ["raffle_id", "seller_id", "buyer_phone", "buyer_name", "ticket_number"];
}
