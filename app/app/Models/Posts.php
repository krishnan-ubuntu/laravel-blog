<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $table = 'posts';
    public $timestamps = false;

    public function users() {
    	return $this->belongsTo('App\Models\Users');
    }
    
    public function categories() {
    	return $this->belongsTo('App\Models\Categories');
    }

}
