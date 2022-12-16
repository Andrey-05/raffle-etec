<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Manager extends Model
{

    use HasFactory;

    public $incrementing = false;

    protected static function booted()
    {
        static::creating(fn (Manager $manager) => $manager->id = (string) Uuid::uuid4());
    }

    public function raffles()
    {
        return $this->hasMany(Raffle::class, "manager_id");
    }

    protected $fillable = ["name", "rm", "password"];
}
