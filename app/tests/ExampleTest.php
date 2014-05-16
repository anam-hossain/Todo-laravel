<?php

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		// $this->call('GET', '/');
		// $this->assertResponseOk();
		$this->call('Post', 'tags');
		$this->assertRedirectedToRoute('home', null, ['flash_message']);

		// $crawler = $this->client->request('GET', '/');

		// $this->assertTrue($this->client->getResponse()->isOk());
	}

	public function testIndex()
	{
		$this->call('GET', '/');
		$this->assertViewHas('title');
	}

}