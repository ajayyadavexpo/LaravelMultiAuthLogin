<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class AdminController extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    use AuthorizesRequests {
        authorize as protected baseAuthorize;
    }

    public function authorize($ability, $arguments = []){
        if(\Auth::guard('admin')->check()){
            \Auth::shouldUse('admin');
        }

        $this->baseAuthorize($ability, $arguments);
    }
}
