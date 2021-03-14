<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable=['name','start_date','weeks_first_term','user_id'];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function weeks()
    {
        return $this->hasMany(Week::class);
    }

}
