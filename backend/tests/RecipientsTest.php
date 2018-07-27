<?php

/**
 * @author Fabio William Conceição
 * @since 1.1
 */
class RecipientsTest extends TestCase
{
    /**
     * Turn up the tests
     *
     * @access public
     * @static
     * @since 1.1
     */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * Get all recipients of application.
     *
     *  @var int $number is on brazilian number format
     *
     * @return bool the integer of the set mode used. FALSE if foo
     *             foo could not be set.
     *
     * @access public
     * @static
     * @since 1.0
     */
    public function testCanGetRecipients()
    {
        $this->json('GET', '/recipients')
            ->seeJson([
                'code' => 200
            ]);
    }

    /**
     * Turn down the tests
     *
     * @access public
     * @static
     * @since 1.1
     */
    public function tearDown()
    {
        parent::tearDown();  // Moving that call to the top of the function didn't work either.
    }
}
