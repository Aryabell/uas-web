<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'name',
        'day',
        'start_time',
        'end_time',
        'class',
    ];

    public function class()
    {
        return $this->belongsTo(ClassModel::class);
    }
}
