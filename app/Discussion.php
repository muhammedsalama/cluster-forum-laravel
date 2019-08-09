<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Discussion extends Model
{
    protected $fillable = [
        'user_id',
        'channel_id',
        'title',
        'content',
        'slug'
    ];

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function watchers()
    {
        return $this->hasMany(Watcher::class);
    }

    public function is_being_watched_by_auth_user()
    {
        $user_id = Auth::id();

        $watchers = array();

        foreach ($this->watchers as $watcher):
            array_push($watchers, $watcher->id);
        endforeach;

        if (in_array($user_id, $watchers)) {
            return true;
        } else {
            return false;
        }

    }


}
