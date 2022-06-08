<?php

namespace App\Http\Controllers;

use App\Practice;
use App\User;
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

		switch (auth()->user()->role->name) {
			case 'admin':
				$data = [
					'total_practices' => Practice::count(),
					'total_import' => Practice::sum('import'),
					'total_business' => User::role('business')->count(),
				];
			default:
				$data = [];
		}
		return view('dashboards.' . auth()->user()->role->name)->with('data', $data);
	}

}