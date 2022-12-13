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

    protected $fillable = ["title", "description", "date", "price", "manager_id"];
}
