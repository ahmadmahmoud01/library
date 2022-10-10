<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'desc', 'img', 'price', 'author_id'];

    // Books belongsTo Author
    public function author() {

        return $this->belongsTo('App\Author');
        
    }
}
