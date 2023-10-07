<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table        = 'videos';
    protected $fillable     = ['name' ,'views'];
    protected $hidden       = ['created_at' ,'updated_at'];
}
