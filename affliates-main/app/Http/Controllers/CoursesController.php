<?php

namespace App\Http\Controllers;

use App\Content;
use App\Membership;
use App\Title;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
    	if (current_user()->membership()->id > 1) {
			$courses = Membership::all();
			return view('courses.index', compact('courses'));
    	}
    	else{
			return redirect(route('membership.create'))->with('toast_error', 'purchase a package');
    	}
    }

	public function detail($id)
	{
		$data = Content::where('title_id', '=', $id)->firstOrFail();
		$title = Title::where('id', $id)->first();
		return view('courses.detail', ['data' => $data, 'title' => $title]);
	}


    public function show($id)
    {
    	$titles = Title::where('membership_id', $id)->get();
    	return view('courses.show', compact('titles'));

    }
}
