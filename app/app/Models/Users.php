<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\models\Posts;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';
    public $timestamps = false;

    public function posts() {
    	return $this->hasMany('App\Models\Posts');
    }
}
