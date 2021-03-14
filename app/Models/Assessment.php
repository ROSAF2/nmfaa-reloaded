<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable=['name','date','course_id'];

    // Relationships
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
