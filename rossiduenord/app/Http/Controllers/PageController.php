<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth.login');
    }

	/**
	 * Return user's role dashboard
	 */
	public function dashboard() {
		return view('dashboards.' . auth()->user()->role);
	}

}