<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
	protected $status_code = 200;

	/**
	 * @return int
	 */
	public function getStatusCode()
	{
		return $this->status_code;
	}

	/**
	 * @param int $status_code
	 * @return
	 */
	public function setStatusCode( $status_code )
	{
		$this->status_code = $status_code;
		return $this;
	}


	public function responseJson( $data )
	{
		return [
			'status' => 'success',
			'status_code' => $this->getStatusCode(),
			'data' => $data
		];
	}

	public function responseError( $message = 'Not Found!' )
	{
		return [
			'status' => 'Faild',
			'status_code' => $this->setStatusCode(404)->getStatusCode(),
			'message' => $message
		];
	}
}
