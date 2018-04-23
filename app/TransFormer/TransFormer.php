<?php
/**
 * Author: Jason
 * Email: Admin@wujinyu.com
 * Version: V1.0
 * Time: 2018/4/22 09:42:37
 */

namespace App\TransFormer;


/**
 * Class TransFormer
 * @package App\TransFormer
 */
abstract class TransFormer
{
	/**
	 * @param $item
	 * @return array
	 */
	public function transFormerCollection( $item )
	{
		return array_map( [ $this, 'transFormer' ], $item );
	}

	/**
	 * @param $item
	 * @return mixed
	 */
	public abstract function transFormer( $item );
}