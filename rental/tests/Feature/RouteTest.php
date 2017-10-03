<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RouteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $urls = [
            url('opportunities'),
            url('opportunities/1/edit'),
            url('opportunities/create'),
            url('transports'),
            url('transports/1/edit')
        ];

        foreach ($urls as $url) {
            $response = $this->call('GET', $url);
            $this->assertEquals(200, $response->status(), $url.' did not return a 200');
        }

        \Session::start();
        $response = $this->call('POST', 'opportunities/create', [
            '_token' => csrf_token(),
            'transport_id'=>'1',
            'start'=>'2016-10-03 05:31:31',
            'finish'=>'2016-10-06 05:31:31',
            'user_id'=>1
        ]);
        $this->assertEquals(302, $response->getStatusCode());
        $response->assertRedirect('opportunities');
    }
}
