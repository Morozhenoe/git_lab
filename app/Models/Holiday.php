<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
