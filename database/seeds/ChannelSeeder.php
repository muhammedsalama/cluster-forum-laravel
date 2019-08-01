<?php

use Illuminate\Database\Seeder;
use App\Channel;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title'=>'laravel'];
        $channel2 = ['title'=>'php'];
        $channel3 = ['title'=>'java'];
        $channel4 = ['title'=>'c++'];
        $channel5 = ['title'=>'javascript'];
        $channel6 = ['title'=>'nodejs'];
        $channel7 = ['title'=>'angularjs'];
        $channel8 = ['title'=>'reactjs'];
        $channel9 = ['title'=>'vuejs'];
        $channel10 = ['title'=>'python'];
        $channel11 = ['title'=>'asp.net'];


        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
        Channel::create($channel6);
        Channel::create($channel7);
        Channel::create($channel8);
        Channel::create($channel9);
        Channel::create($channel10);
        Channel::create($channel11);
    }
}
