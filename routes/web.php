<?php


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');*/

Route::get('{provider}/auth',[
    'uses'=>'SocialsController@auth',
    'as'=>'social.auth'
]);

Route::get('/{provider}/redirect',[
    'uses'=>'SocialsController@auth_callback',
    'as'=>'social.callback'
]);


Route::get('discussion/{slug}',[
    'uses'=>'DiscussionController@show',
    'as'=>'discussion'
]);

Route::get('channel/{slug}',[
    'uses'=>'ForumController@channel',
    'as'=>'channel'
]);

Route::group(['middleware'=>'auth'],function (){

   Route::resource('channels','ChannelController');

   Route::get('discussion/create/new',[
       'uses'=>'DiscussionController@create',
       'as'=>'discussion.create'
   ]);

   Route::post('discussion/store',[
       'uses'=>'DiscussionController@store',
       'as'=>'discussion.store'
   ]);



    Route::get('/forum',[
        'uses'=>'ForumController@index',
        'as'=>'forum'
    ]);

    Route::post('discussion/reply/{id}',[
        'uses'=>'DiscussionController@reply',
        'as'=>'discussion.reply'
    ]);

    Route::get('/reply/like/{id}',[
        'uses'=>'RepliesController@like',
        'as'=>'reply.like'
    ]);

    Route::get('/reply/dislike/{id}',[
        'uses'=>'RepliesController@dislike',
        'as'=>'reply.dislike'
    ]);

    Route::get('/discussion/watch/{disc_id}',[
       'uses'=>'WatcherController@watch',
       'as'=>'discussion.watch'
    ]);

    Route::get('/discussion/unwatch/{disc_id}',[
       'uses'=>'WatcherController@unwatch',
       'as'=>'discussion.unwatch'
    ]);

    Route::get('/reply/mark-best-answer/{reply_id}',[
       'uses'=>'RepliesController@mark_as_best_answer',
       'as'=>'best_answer'
    ]);


});


