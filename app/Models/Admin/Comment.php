<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['name' ,'comment'];
    protected $hidden = ['created_at' .'updated_at'];
    public $timestamps = true;
}
