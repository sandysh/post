<?php

namespace App;
// use App\Model as Model;

class Post extends Model
{
    protected $fillable = ['title','body', 'user_id'];
    
    public function addPost()
    {
         Post::create([
            'title'     => request('title'),
            'body'      => request('body'),
            'user_id'   => auth()->user()->id,
            ]);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
    
    public function addComment($body)
    {
            Comments::create([
            'body'      => request('body'),
            'post_id'   => $this->id,
            'user_id'   => auth()->user()->id,
            ]);
    }
    
    public static function archives()
    {
        return Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) as published')
                    ->groupBy('year','month')
                    ->get();
    }
}
