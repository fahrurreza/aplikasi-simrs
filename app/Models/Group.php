<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];

    public function study()
    {
        return $this->belongsTo(Study::class);
    }

    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
