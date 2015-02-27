<?php

namespace Laraerp\Http\Controllers;

class DashboardController extends MainController {

    public function getIndex() {
        return view('dashboard.index');
    }

}
