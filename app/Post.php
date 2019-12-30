<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

  protected $fillable = ['titre','contenu', 'excerpt', 'user_id'];

	public function user()
	{
		// return $this->belongsTo('App\User');
    // return $this->belongsTo(User::class);
    return $this->belongsTo('App\User');
	}

}