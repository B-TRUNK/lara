<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    //declare representing table
    protected $table = "offers";
    //all applicable inserting fields
    protected $fillable = ['name' ,'price' ,'details','created_at' ,'updated_at'];
    //hide specific elements when selecting from database
    protected $hidden = ['created_at' ,'updated_at'];
    //automatic timestamp db store
    public $timestamps = true;
}
