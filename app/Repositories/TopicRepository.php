<?php
/**
 * Topic表处理
 * Author: Jason
 * Email: Admin@wujinyu.com
 * Version: V1.0
 * Time: 2018/4/20 13:57:22
 */

namespace App\Repositories;

use App\Models\Topic;

/**
 * Class QuestionRepository
 * @package App\Repositories
 */
class TopicRepository
{

	/**
	 * @param string $id
	 * @return mixed
	 */
	public function byId ( $id = '' )
	{
		return Topic::find( $id );
	}

	/**
	 * @return mixed
	 */
	public function getAll ()
	{
		return Topic::all();
	}

	/**
	 * @param array $data
	 * @return mixed
	 */
	public function store ( array $data )
	{
		return Topic::create( $data );
	}
}