<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{

    use SoftDeletes;

    protected $table = 'comments';
    protected $fillable = ['name' ,'comment'];
    protected $hidden = ['created_at' .'updated_at'];
    public $timestamps = true;
}
