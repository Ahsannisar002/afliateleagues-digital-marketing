<?php

	namespace App\Http\Controllers;

	class IndexController extends Controller
	{
		public function index()
		{
			return view('index');
		}

		public function contact_us()
		{
			return view('contact-us');
		}

		public function pricing()
		{
			return view('pricing');
		}

		public function services()
		{
			return view('services');
		}

		public function about_us()
		{
			return view('about-us');
		}

		public function terms_and_conditions()
		{
			return view('terms_and_conditions');
		}
	}
