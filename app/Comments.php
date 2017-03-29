<?php

namespace App;

class Comments extends Model
{
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
    
}
