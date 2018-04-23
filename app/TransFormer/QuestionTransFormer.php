<?php
/**
 *
 * Author: Jason
 * Email: Admin@wujinyu.com
 * Version: V1.0
 * Time: 2018/4/22 09:45:07
 */

namespace App\TransFormer;


/**
 * Class QuestionTransFormer
 * @package App\TransFormer
 */
class QuestionTransFormer extends TransFormer
{
	/**
	 * @param $item
	 * @return array
	 */
	public function transFormer( $item )
	{
		return [
			'title' => $item[ 'title' ],
			'content' => $item[ 'body' ]
		];
	}
}