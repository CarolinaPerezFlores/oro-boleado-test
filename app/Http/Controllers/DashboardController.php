<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        if (auth()->user()->hasRole('admin')) {
            return "Bienvenido, Admin";
        }
        abort(403);
    }

    public function user()
    {
        if (auth()->user()->hasRole('user')) {
            return "Bienvenido, Usuario";
        }
        abort(403);
    }
}
