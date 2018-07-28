<?php

/**
 * @author Fabio William Conceição
 * @since 1.1
 */
class SpecialsOffersTest extends TestCase
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
     * Get all special/offer of application.
     *
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
        $this->json('GET', '/special/offer')
            ->seeJson([
                'code' => 200,
                'status' => true
            ]);
    }

    /**
     * Get one special/offer of application.
     *
     *
     * @return bool the integer of the set mode used. FALSE if foo
     *             foo could not be set.
     *
     * @access public
     * @static
     * @since 1.0
     */
    public function testCanGetOneRecipients()
    {
        $id = rand(1,9999999);
        $this->json('GET', "/special/offer/{$id}" )
            ->seeJson([
                'code' => 200,
                'status' => true
            ]);
    }

    /**
     * Create one special/offer of application.
     *
     *
     * @return bool the integer of the set mode used. FALSE if foo
     *             foo could not be set.
     *
     * @access public
     * @static
     * @since 1.0
     */
    public function testCanCreateRecipients()
    {
        $data['data'] = [
            'email' =>
                  str_repeat($this->getAlphaLetters(rand(1,25)), rand(1,20)).'@'.str_repeat($this->getAlphaLetters(rand(1,25)), rand(1,20)).'.com',
            'name'  => 'Fabio William Conceição'
        ];
        $this->json('POST', "/special/offer", $data)
            ->seeJson([
                'code' => 200,
                'status' => true
            ]);
    }

    /**
     * Update one special/offer of application.
     *
     *
     * @return bool the integer of the set mode used. FALSE if foo
     *             foo could not be set.
     *
     * @access public
     * @static
     * @since 1.0
     */
    public function testCanUpdateRecipients()
    {
        $id = rand(1,9999999999);
        $data['data'] = [
            'name' => 'Brutal special',
            'discount_percentage' => 10
        ];
        $this->json('PUT', "/special/offer/{$id}", $data)
            ->seeJson([
                'code' => 200,
                'status' => true
            ]);
    }

    /**
     * Delete one special/offer of application.
     *
     *
     * @return bool the integer of the set mode used. FALSE if foo
     *             foo could not be set.
     *
     * @access public
     * @static
     * @since 1.0
     */
    public function testCanDeleteRecipients()
    {
        $id = rand(1, 99999);
        $this->json('DELETE', "/special/offer/{$id}")
            ->seeJson([
                'code' => 200,
                'status' => true
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


      private function getAlphaLetters($index)
      {
           return $alphas = range('a', 'z')[$index];
      }
}
