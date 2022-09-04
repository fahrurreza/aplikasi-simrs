<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];

    public function price()
    {
        return $this->hasOne(Price::class);
    }

    public function group()
    {
        return $this->hasOne(Group::class);
    }

    public function study()
    {
        return $this->hasOne(Study::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
