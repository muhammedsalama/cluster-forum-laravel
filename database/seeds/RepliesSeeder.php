<?php

use Illuminate\Database\Seeder;
use App\Reply;

class RepliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reply::create([
           'user_id'=>2,
           'discussion_id'=>3,
           'content'=>'jioveioubvrubvruihnhnvirvfhnujbcxuyhvvveriweirjhuwierhurfhbvxw'
        ]);
        Reply::create([
            'user_id'=>1,
            'discussion_id'=>1,
            'content'=>'jioveioubvrubvruihnhnvirvfhnujbcxuyhvvveriweirjhuwierhurfhbvxw'
        ]);
        Reply::create([
            'user_id'=>2,
            'discussion_id'=>4,
            'content'=>'jioveioubvrubvruihnhnvirvfhnujbcxuyhvvveriweirjhuwierhurfhbvxw'
        ]);
        Reply::create([
            'user_id'=>2,
            'discussion_id'=>2,
            'content'=>'jioveioubvrubvruihnhnvirvfhnujbcxuyhvvveriweirjhuwierhurfhbvxw'
        ]);
        Reply::create([
            'user_id'=>1,
            'discussion_id'=>1,
            'content'=>'jioveioubvrubvruihnhnvirvfhnujbcxuyhvvveriweirjhuwierhurfhbvxw'
        ]);

    }
}
