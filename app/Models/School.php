<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable=['name', 'holiday_weeks', 'working_weeks'];

    // Relationships
    public function semesters()
    {
        return $this->hasMany(Semester::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function publicHolidays()
    {
        return $this->hasMany(PublicHoliday::class);
    }
}
