<?php

namespace App\Http\Controllers;

use gersonalves\laravelBase\Traits\ControllerTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ControllerTrait, DispatchesJobs, ValidatesRequests;
}
