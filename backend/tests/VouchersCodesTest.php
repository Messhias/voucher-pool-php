<?php

/**
 * @author Fabio William Conceição
 * @since 1.1
 */
class VouchersCodesTest extends TestCase
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
     * Get all voucher/code of application.
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
        $this->json('GET', '/voucher/code')
            ->seeJson([
                'code' => 200,
                'status' => true
            ]);
    }

    /**
     * Get one voucher/code of application.
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
        $code = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 10);
        $this->json('GET', "/voucher/code/{$code}" )
            ->seeJson([
                'code' => 200,
                'status' => true
            ]);
    }

    /**
     * Create one voucher/code of application.
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
            'offer_id' => rand(1, 999999),
            'recipient_id' => rand(1, 999999),
            'expiration_date' => date('Y-m-d', strtotime( '+'.mt_rand(0,30).' days'))
        ];
        $this->json('POST', "/voucher/code", $data)
            ->seeJson([
                'code' => 200,
                'status' => true
            ]);
    }

    /**
     * Update one voucher/code of application.
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
            'expiration_date' => date('Y-m-d', strtotime( '+'.mt_rand(0,30).' days'))
        ];
        $this->json('PUT', "/voucher/code/{$id}", $data)
            ->seeJson([
                'code' => 200,
                'status' => true
            ]);
    }

    /**
     * Delete one voucher/code of application.
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
        $code = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 10);
        $this->json('DELETE', "/voucher/code/{$code}")
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
