<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use \Naux\Mail\SendCloudTemplate;

Auth::loginUsingId( 1 );

Route::get( '/', function () {
	return view( 'welcome' );
} );

Auth::routes();

Route::get( '/home', 'HomeController@index' );

Route::resource( 'questions', 'QuestionController' );

/**模拟用户关注问题*/
Route::get( '/questions/{question_id}/follow', 'QuestionFollowController@follow' );

Route::resource( '/topics', 'TopicController' );

/**
 * 发送邮件练习
 */
Route::get( 'verify', function () {
	// 模板变量
	$data = [ 'url' => 'http://www.zhihu.io/' . str_random( 40 ), 'name' => '卡布奇诺' ];
	$template = new SendCloudTemplate( 'zhihu_io_zhihu', $data );

	Mail::raw( $template, function ( $message ) {
		$message->from( 'admin@9397.org', 'SendCloud Send Mail!' );

		$message->to( 'aopao@qq.com' )->cc( 'aopao@qq.com' );
	} );
} );

/**
 * 消息通知练习
 */
Route::get( '/notify', function () {
	$question = \App\Models\Question::find( 1 );
	Auth::user()->notify( new \App\Notifications\QuestionPublished( $question ) );
} );

Route::get( '/read', function () {
	foreach ( Auth::user()->unreadNotifications as $unreadNotification ) {
		echo $unreadNotification->type . "<br>";
	}
} );

Route::get( '/sign', function () {
	Auth::user()->unreadNotifications->markAsRead();
} );

Route::get( '/all', function () {
	return Auth::user()->readNotifications;
} );




