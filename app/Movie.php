<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies';

    protected $fillable = ['title', 'why', 'description', 'user_id'];

    

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
