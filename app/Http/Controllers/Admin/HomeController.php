<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // dd(\Auth::guard('admin')->user()->hasRole('editor'));
        return view('admin.dashboard');
    }


    public function adminTest()
    {
        // if(\Auth::guard('admin')->user()->hasRole('admin')){
        //     dd('only admin allowed');
        // }
        
        if(\Gate::forUser(\Auth::guard('admin')->user())->allows('admin')){
            dd('only admin allowed');
        }
        abort(403);
    }

    public function editorTest()
    {
        if(\Auth::guard('admin')->user()->hasRole('editor')){
            dd('only editor allowed');
        }
        abort(403);
    }

}
