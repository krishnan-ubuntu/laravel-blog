<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\Posts;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';
    public $timestamps = false;

    public function posts() {
    	return $this->hasMany('App\Models\Posts');
    }

}
