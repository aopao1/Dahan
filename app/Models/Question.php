<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	protected $fillable = [ 'user_id', 'title', 'body', 'view' ];

	public function topic ()
	{
		return $this->belongsToMany( Topic::class )->withTimestamps();
	}

	public function user ()
	{
		return $this->belongsTo( User::class );
	}

	public function followers ()
	{
		return $this->belongsToMany( User::class, 'user_question' )->withTimestamps();
	}
}
