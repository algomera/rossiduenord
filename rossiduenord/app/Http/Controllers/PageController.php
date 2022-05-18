<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    /**
     * Return login page
     */
    public function index()
    {
        return view('auth.login');
    }

	/**
	 * Return user's profile page
	 */
	public function profile()
	{
		return view('pages.profile');
	}

	/**
	 * Return user's role dashboard page
	 */
	public function dashboard() {
		return view('dashboards.' . auth()->user()->role);
	}

}