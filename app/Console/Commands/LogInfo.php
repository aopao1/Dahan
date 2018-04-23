<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LogInfo extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'log:info {name=daily}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'I create a command shell';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct ()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle ()
	{
		echo 'I am a super: ' . $this->argument( 'name' );
	}
}
