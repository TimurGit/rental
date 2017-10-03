<?php

namespace Tests\Unit;

use App\Models\Enum\TransportType;
use App\Models\Mark;
use App\Models\Transport;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransportTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {

        $transport = new Transport([
            'type_id'=>TransportType::Car,
            'mark_id'=>3,
            'reg_number'=>'e323em159'
        ]);

        $transport->save();

        $this->assertEquals(TransportType::Car, $transport->type_id);
        $this->assertEquals(3, $transport->mark_id);
        $this->assertEquals('e323em159', $transport->reg_number);
    }
}
