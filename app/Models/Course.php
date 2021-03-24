<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    //Primary Key
    protected $primaryKey = 'id';
    public $incrementing =false;
    protected $keyType ='string';

    public $timestamps = false;
    protected $fillable=['name', 'date', 'course_id'];

    // Relationships
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function assessments()
    {
        return $this->hasMany(Assessment::class);
    }
}
