<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Raffle extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected static function booted()
    {
        static::creating(fn (Raffle $raffle) => $raffle->id = (string) Uuid::uuid4());
    }

    public function prizes()
    {
        return $this->hasMany(Prize::class, "raffle_id");
    }

    public function purchasedTickets()
    {
        return $this->hasMany(PurchasedTicket::class, "raffle_id");
    }

    protected $fillable = ["title", "description", "date", "price", "manager_id", "ticket_book_number", "ticket_number_by_book"];
}
