<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Auth;
use App\Models\Topic;
use App\Repositories\QuestionRepository;
use App\Requests\QuestionRequest;

/**
 * Class QuestionController
 * @package App\Http\Controllers
 */
class QuestionController extends Controller
{
	/**
	 * @var QuestionRepository
	 */
	protected $questionRepository;

	/**
	 * QuestionController constructor.
	 */
	public function __construct ( QuestionRepository $questionRepository )
	{
		$this->middleware( 'auth' )->except( 'index', 'show' );
		$this->questionRepository = $questionRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 */
	public function index ()
	{
		$info = $this->questionRepository->getAll();
		$i = Question::all();
		return view( 'questions.index', compact( 'i' ) );

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create ()
	{
		return view( 'questions.create' );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Requests\QuestionRequest; $request
	 * @return \Illuminate\Http\Response
	 */
	public function store ( QuestionRequest $request )
	{
		//懒,前端没做,伪造数据
		$data = array_merge( $request->all(), [ 'user_id' => Auth::user()->id ] );
		$data[ 'topic' ] = $this->nomarlizeTopic( [ '1', 'java' ] );
		//正式处理流程
		$this->questionRepository->store( $data );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show ( $id )
	{
		return $this->questionRepository->byId( $id );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit ( $id )
	{
		$info = $this->questionRepository->byId( $id );
		return view( 'questions.edit', compact( 'info' ) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 * @param  \App\Requests\QuestionRequest; $request
	 */
	public function update ( QuestionRequest $request, $id )
	{
		//懒,前端没做,伪造数据
		$data = array_merge( $request->all(), [ 'user_id' => Auth::user()->id ] );
		$data[ 'topic' ] = $this->nomarlizeTopic( [ '1' ] );
		//正式处理流程
		$question = $this->questionRepository->byId( $id );
		$this->questionRepository->update( $question, $data );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 */
	public function destroy ( $id )
	{
		//
	}

	/**
	 * @param $topics
	 * @return array
	 */
	public function nomarlizeTopic ( $topics )
	{
		return collect( $topics )->map( function ( $topic ) {
			if ( is_numeric( $topic ) )
				return (int)$topic;
			$newTopic = Topic::create( [ 'name' => $topic ] );
			return $newTopic->id;
		} )->ToArray();
	}
}
