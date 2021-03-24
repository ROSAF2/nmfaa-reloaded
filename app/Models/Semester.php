<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable=['name','start_date','weeks_first_term','working_weeks', 'holiday_weeks','user_id'];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function weeks()
    {
        return $this->hasMany(Week::class);
    }

}
