<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Seller extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected static function booted()
    {
        static::creating(fn (Seller $seller) => $seller->id = (string) Uuid::uuid4());
    }

    protected $fillable = ["rm"];
}
