<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTest extends TestCase
{
    /**
     * Invalid User email
     *
     * @return void
     */
    public function testRedeemInvalidEmail()
    {
        $response = $this->json('POST', 'api/voucher/redeem', ['email' => 'anjali@anjali.comX','code'=>'A5CITVZNX']);
        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 'error',
            ]);
    }

    /**
     *  Invalid voucher code, voucher code that does not exists in the db or that has been redeemed
     */
    public function testReddemWithInvalidVoucherCode()
    {
        $response = $this->json('POST', 'api/voucher/redeem', ['email' => 'anjali@yahoo.com','code'=>'xyz']);

        $response
            ->assertStatus(200)
            ->assertJson([
                'status' => 'error',
                'message' => 'Invalid Voucher code',
            ]);
    }

    /**
     *  Redemsion of a valid voucher code
     */
    public function testValidRedemtion()
    {
        $response = $this->json('POST', 'api/voucher/redeem', ['email' => 'anjali@yahoo.com','code'=>'XkKp8Jki']);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'percentage_discount'
            ]);
    }

    /**
     *  Test to validate output to show all voucher code for a particular recipient
     */
    public function testGetAllValidVouchers(){
        $response = $this->json('POST', 'api/voucher/all', ['email' => 'anjali@yahoo.com']);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                [
                'code',
                'offer'
                ]
            ]);
    }
}
