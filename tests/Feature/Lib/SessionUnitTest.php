<?php

namespace Tests\Feature\Lib;

use App\ModelFunctions\SessionFunctions;
use Tests\TestCase;

class SessionUnitTest
{
	/**
	 * Logging in.
	 *
	 * @param TestCase $testCase
	 * @param string   $username
	 * @param string   $password
	 * @param string   $result
	 */
	public function login(TestCase &$testCase, string $username, string $password, string $result = 'true')
	{
		$response = $testCase->post('/api/Session::login', [
			'user' => $username,
			'password' => $password,
		]);
		$response->assertOk();
		$response->assertSee($result);
	}

	/**
	 * Logging out.
	 *
	 * @param TestCase $testCase
	 */
	public function logout(TestCase &$testCase)
	{
		$response = $testCase->post('/api/Session::logout');
		$response->assertOk();
		$response->assertSee('true');
	}

	/**
	 * Set a new login and password.
	 *
	 * @param TestCase $testCase
	 * @param string   $login
	 * @param string   $password
	 * @param string   $result
	 */
	public function set(TestCase &$testCase, string $login, string $password, string $result = 'true')
	{
		$response = $testCase->post('/api/Settings::setLogin', [
			'username' => $login,
			'password' => $password,
		]);
		$response->assertOk();
		$response->assertSee($result);
	}

	/**
	 * @param int $id
	 */
	public function log_as_id(int $id)
	{
		$sessionFunctions = new SessionFunctions();
		$sessionFunctions->log_as_id($id);
	}
}