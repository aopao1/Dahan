<?php

namespace App\Http\Controllers;

use Auth;

class QuestionFollowController extends Controller
{
	public function follow ( $question_id )
	{
		AUth::user()->followThis( $question_id );
	}
}
