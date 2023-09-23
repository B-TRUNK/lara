<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this -> middleware('auth')->except('middlewareExceptFn');
    }

    public function showAdminName() {

        return 'Hello Admin';

    }

    public function middlewareExceptFn() {

        return 'Hello Admin';

    }

}
