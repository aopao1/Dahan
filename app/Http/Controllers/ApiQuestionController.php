<?php

namespace App\Http\Controllers;

use App\Repositories\QuestionRepository;
use App\TransFormer\QuestionTransFormer;
use Illuminate\Http\Request;

class ApiQuestionController extends ApiController
{
	protected $questionTransFormer;
	protected $questionRepository;

	/**
	 * ApiQuestionController constructor.
	 * @param $questionTransFormer
	 */
	public function __construct( QuestionRepository $questionRepository, QuestionTransFormer $questionTransFormer )
	{
		$this->questionRepository = $questionRepository;
		$this->questionTransFormer = $questionTransFormer;
	}

	public function index()
	{
		$question = $this->questionRepository->getAll();
		return $this->responseJson( $this->questionTransFormer->transFormerCollection( $question ) );

	}

	public function show( $question_id )
	{
		$question = $this->questionRepository->byId( $question_id );
		if ( !$question ) {
			return $this->responseError();
		}
		return $this->responseJson( $this->questionTransFormer->transFormer( $question ) );
	}

}
