<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title' ,'body' ,'user_id'
    ];
    //this function to return the name of the auther
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
