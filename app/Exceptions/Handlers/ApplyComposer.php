<?php

namespace App\Exceptions\Handlers;

use App\Redirections\ToInstall;
use Exception;
use ErrorException;
use Illuminate\Http\Response;
use Illuminate\View\View;
use RuntimeException;
use Throwable;

class ApplyComposer
{
	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param Illuminate\Http\Request $request
	 * @param Throwable               $exception
	 *
	 * @return bool
	 */
	public function check($request, Throwable $exception)
	{
        // echo get_class($exception);
        // echo $exception instanceof ErrorException;
        // echo '|';
        // echo (strpos($exception->getFile(), 'laravel/framework/src/Illuminate/Routing/Router.php') !== false);
        // dd($exception);
		return $exception instanceof ErrorException && (strpos($exception->getFile(), 'laravel/framework/src/Illuminate/Routing/Router.php') !== false);
	}

	/**
	 * @return Response or View
	 */
	// @codeCoverageIgnoreStart
	public function go()
	{
        return response()->view('error.error', ['code' => '500', 'message' => 'Missing dependency, please do: <code>composer install --no-dev</code><br>(or use the release channel.)']);
	}
}