<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{

    use SoftDeletes;

    protected $table = 'comments';
    protected $fillable = ['comment','user_id'];
    protected $hidden = ['created_at' .'updated_at'];
    public $timestamps = true;


    //Belongs To Relationship
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
