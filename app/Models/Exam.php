<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'title',
        'date',
        'vote',

    ];
    public function user()
    {
        return $this->belongsto(User::class);
    }
}


