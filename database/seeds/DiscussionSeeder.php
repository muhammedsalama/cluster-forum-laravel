<?php

use Illuminate\Database\Seeder;
use App\Discussion;

class DiscussionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = 'Implementing Oauth with laravel passport';
        $t2 = 'Making responsive web sites with bootstrap ';
        $t3 = 'Making single web apps with React ';
        $t4 = 'Making dynamic web sites with PHP ';

        $d1 = [
          'title'=>$t1,
          'content'=>'hhfhfueigbeufuebcdnqwxcmokmwqe',
          'channel_id'=>1,
          'user_id'=>2,
          'slug'=>str_slug($t1)
        ];$d2 = [
          'title'=>$t2,
          'content'=>'hhfhfueigbeuwfwerqgfrwqfe2qfuebcdnqwxcmokmwqe',
          'channel_id'=>2,
          'user_id'=>2,
          'slug'=>str_slug($t2)
        ];$d3 = [
          'title'=>$t3,
          'content'=>'hhfhfueigbeufuknewcfbnewqbubwqeebcdnqwxcmokmwqe',
          'channel_id'=>1,
          'user_id'=>1,
          'slug'=>str_slug($t3)
        ];$d4 = [
          'title'=>$t4,
          'content'=>'hhfjbefwufbweuhfueigbeufuebcdnqwxcmokmwqe',
          'channel_id'=>2,
          'user_id'=>1,
          'slug'=>str_slug($t4)
        ];


        Discussion::create($d1);
        Discussion::create($d2);
        Discussion::create($d3);
        Discussion::create($d4);

    }
}
