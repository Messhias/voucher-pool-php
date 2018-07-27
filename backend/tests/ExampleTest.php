<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * Turn up the tests
     *
     * @access public
     * @static
     * @since 1.0
     */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/');

        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }

    /**
     * Turn down the tests
     *
     * @access public
     * @static
     * @since 1.0
     */
    public function tearDown()
    {
        parent::tearDown();  // Moving that call to the top of the function didn't work either.
    }
}
