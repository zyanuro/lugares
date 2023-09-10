<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    public function user(){

        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function theme(){

        return $this->belongsTo(Theme::class, 'theme_id', 'id');
    }
    public function Comments(){

        return $this->belongsToMany('App\Models\Comment');
    }

   
}
