<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

	protected $fillable = ['username', 'email', 'password'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
