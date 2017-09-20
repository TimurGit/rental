<?php

use Illuminate\Database\Seeder;

class MarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marks = require_once 'Marks.php';
        foreach ($marks as $mark)
        {
            \App\Models\Mark::create(['name'=>$mark['title']]);
        }
    }
}
