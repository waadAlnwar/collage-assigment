<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class certificate extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();
        static::created(function (certificate $certificate) {
            $certificate->refreance_number = 1000 + $certificate->id;
            $certificate->status_id = 1;
            $certificate->save();
        });
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->second_name . ' ' . $this->third_name . ' ' . $this->fourth_name;
    }

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
