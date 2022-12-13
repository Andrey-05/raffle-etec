<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Prize extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected static function booted()
    {
        static::creating(fn (Prize $prize) => $prize->id = (string) Uuid::uuid4());
    }

    protected $fillable = ["description", "position", "raffle_id"];
}
