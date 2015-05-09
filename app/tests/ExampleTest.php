<?php

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */

	public function testHomePageRedicrection() {
		$this->call('GET', '/');
		$this->assertRedirectedTo('cats');
	}

	public function testVisitorIsRedirected() {
		Route::enableFilters();
		$this->call('GET','/cats/create');
		$this->assertRedirectedTo('login');
	}

	public function testLoggedInUserCanCreateCat() {
		Route::enableFilters();
		$user = new User(array('username'=>'John Doe',
								'is_admin' => false));
		$this->be($user);
		$this->call('GET', '/cats/create');
		$this->assertResponseOk();
	}
}
