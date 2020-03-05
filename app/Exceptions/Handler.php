<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Exceptions\Handlers\NoEncryptionKey;
use App\Exceptions\Handlers\InvalidPayload;
use App\Exceptions\Handlers\AccessDBDenied;
use Throwable;

class Handler extends ExceptionHandler
{
	/**
	 * A list of the exception types that are not reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		DecryptException::class,
	];

	/**
	 * A list of the inputs that are never flashed for validation exceptions.
	 *
	 * @var array
	 */
	protected $dontFlash = [
		'password',
		'password_confirmation',
	];

	/**
	 * Report or log an exception.
	 *
	 * @param Throwable $exception
	 *
	 * @return void
	 *
	 * @throws Exception
	 */
	public function report(Throwable $exception)
	{
		parent::report($exception);
	}

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param Throwable                $exception
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, Throwable $exception)
	{
		$checks = [];
		$checks[] = new NoEncryptionKey();
		$checks[] = new InvalidPayload();
		$checks[] = new AccessDBDenied();

		foreach ($checks as $check){
			if ($check->check($request, $exception))
			{
				return $check->go();
			}
		}

		return parent::render($request, $exception);
	}

	private function redirect_install()
	{

	}
}
