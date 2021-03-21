<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable=['number','start_date', 'is_holiday_week','semester_id'];

    // Relationships
    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}
