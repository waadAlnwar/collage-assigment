<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class certificate extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function facutly()
    {
        return $this->belongsTo(Facutly::class);
    }
    public function major()
    {
        return $this->belongsTo(Major::class);
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
    public function degree()
    {
        return $this->belongsTo(Degree::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
