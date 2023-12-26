<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\commonMdl;
use Config;
use Session;
use DB;

class commonCntrlr extends Controller
{
    function registeredForms()
    {
        $output = commonMdl::getRegisteredUsers();
    	return view('admin.registeredForms', compact("output"));
    }

    function unregisteredForms()
    {
        $output = commonMdl::getUnRegisteredUsers();
    	return view('admin.unregisteredForms', compact("output"));
    }
}
