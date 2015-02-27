<?php

namespace Laraerp\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class MainController extends BaseController {

    use DispatchesCommands, ValidatesRequests;
}
