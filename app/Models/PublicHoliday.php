<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicHoliday extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable=['name', 'date', 'location_affected'];

    // Relationships
    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
