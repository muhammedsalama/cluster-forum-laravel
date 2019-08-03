<?php


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('{provider}/auth',[
    'uses'=>'SocialsController@auth',
    'as'=>'social.auth'
]);

Route::get('/{provider}/redirect',[
    'uses'=>'SocialsController@auth_callback',
    'as'=>'social.callback'
]);

Route::group(['middleware'=>'auth'],function (){
   Route::resource('channels','ChannelController');

   Route::get('discussion/create',[
       'uses'=>'DiscussionController@create',
       'as'=>'discussion.create'
   ]);

   Route::post('discussion/store',[
       'uses'=>'DiscussionController@store',
       'as'=>'discussion.store'
   ]);

    Route::get('discussion/{slug}',[
        'uses'=>'DiscussionController@show',
        'as'=>'discussion'
    ]);

    Route::get('/forum',[
        'uses'=>'ForumController@index',
        'as'=>'forum'
    ]);



});


