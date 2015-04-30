<?php

namespace Laraerp\Http\Controllers;

class DashboardController extends MainController {

    public function index() {
        return view('dashboard.index');
    }

}
