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
        $channel1 = ['title'=>'laravel','slug'=>str_slug('laravel')];
        $channel2 = ['title'=>'php','slug'=>str_slug('php')];
        $channel3 = ['title'=>'java','slug'=>str_slug('java')];
        $channel4 = ['title'=>'c++','slug'=>str_slug('c++')];
        $channel5 = ['title'=>'javascript','slug'=>str_slug('javascript')];
        $channel6 = ['title'=>'node js','slug'=>str_slug('node js')];
        $channel7 = ['title'=>'angular js','slug'=>str_slug('angular js')];
        $channel8 = ['title'=>'react js','slug'=>str_slug('react js')];
        $channel9 = ['title'=>'vue js','slug'=>str_slug('vue js')];
        $channel10 = ['title'=>'python','slug'=>str_slug('python')];
        $channel11 = ['title'=>'asp.net','slug'=>str_slug('asp.net')];


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
