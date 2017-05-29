<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class K_AdminController extends Controller
{
    //
    public function getK_Admin(){
    	return view('admin.layout.k_admin');
    }
}
