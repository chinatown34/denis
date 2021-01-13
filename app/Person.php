<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['gender', 'description', 'description_expert'];

    protected $perPage = 25;
    
    protected $casts = [
        'gender' => 'boolean',
        'bad_photos_flag' => 'boolean',
        'moderated_flag' => 'boolean',
    ];

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function moderator()
    {
        return $this->belongsTo('App\User', 'moderator_id');
    }

    public function photos()
    {
        return $this->hasMany('App\Photo', 'person_id');
    }


    public function getGenderAsStringAttribute()
    {
        return $this->gender ? 'м' : 'ж';
    }

    public function getPhotoAttribute()
    {
        return \Storage::disk('public')->url($this->photo_path);
    }

    public function scopeForReview($query)
    {
        $ids = Result::where('author_id', Auth::id())->pluck('person_id');
        
        return $query->where('moderated_flag', true)->whereNotIn('id', $ids);
    }
    
    public function scopeNotModerated($query)
    {
        return $query->where('moderated_flag', false);
    }

}
