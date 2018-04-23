<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['name', 'bio'];

    public function question()
    {
        return $this->belongsToMany(Question::class)->withTimestamps();
    }
}
