<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function study()
    {
        return $this->belongsToMany(Study::class)->with('group');
    }
}
