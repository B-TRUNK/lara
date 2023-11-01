<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Events\RouteMatched;
use Illuminate\Routing\RouteParameterBinder;

class Student extends Model
{
    //a function to search by student name rather than id(injection)
    public function getRouteKeyName()
    {

        return 'name';

    }





}
