<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'content',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    // public function setImageAttribute($value)
    // {
    //     $f = '/images/posts/';
    //     if (isset($f)) {
    //         $this->attributes['image'] = str_replace('/images/posts/', '', $value);
    //     }
    // }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function getImageAttribute($value){

        return 'images/posts/' .$value ;

    }

}
