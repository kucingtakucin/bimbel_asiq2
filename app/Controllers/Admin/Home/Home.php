<?php

namespace App\Controllers\Admin\Home;

use App\Controllers\BaseController;

class Home extends BaseController
{
	public function __construct()
	{
		helper('auth');
	}

	public function index()
	{
		return view('Admin/Home/index');
	}
}
