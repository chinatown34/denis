<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $guarded = [];

    protected $perPage = 25;
    
    protected $casts = [
        'moderated_at' => 'datetime',
    ];

    public function person()
    {
        return $this->belongsTo('App\Person');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function moderator()
    {
        return $this->belongsTo('App\User', 'moderator_id');
    }

    public function scopeNotModerated($query)
    {
        return $query->where('moderator_id', null);
    }

    public function scopeModerated($query)
    {
        return $query->whereNotNull('moderator_id');
    }

    public function scopeMine($query)
    {
        return $query->where('author_id', Auth::id());
    }

}
