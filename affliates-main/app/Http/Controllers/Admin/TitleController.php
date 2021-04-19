<?php

	namespace App\Http\Controllers\Admin;

	use App\Content;
	use App\Membership;
	use App\Title;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\RedirectResponse;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\Validator;

	class TitleController extends Controller
	{
		use assign;

		public function index()
		{
			$titles = Title::all();
			return view('Admin.titles.index', compact('titles'));
		}

		/**
		 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public function create()
		{
			$courses = Membership::all();
			return view('Admin.titles.create', compact('courses'));
		}

		public function store(Request $request)
		{
			$data = $this->validator($request->all())->validate();
			DB::transaction(function () use ($data) {
				Title::create(['title' => $data['title'], 'membership_id' => $data['course_id'],]);
			});
			return redirect(route('titles.index'))->withToastSuccess('Title Created Successfully!');
		}

		/**
		 * Get a validator for an incoming registration request.
		 *
		 * @param array $data
		 * @return \Illuminate\Contracts\Validation\Validator
		 */
		protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
		{
			return Validator::make($data, [
				'title' => ['required', 'string', 'unique:titles'],
				'course_id' => ['required', 'integer', 'exists:memberships,id']
			]);
		}

		/**
		 * @param $id
		 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public function show($id)
		{
			$title = Title::findOrFail($id);
			return view('Admin.titles.show', compact('title'));
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param \Illuminate\Http\Request $request
		 * @param int $id
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, $id)
		{
			//
		}

		/**
		 * @param $id
		 * @return RedirectResponse
		 */
		public function destroy($id): RedirectResponse
		{
			$title = Title::where('id', $id)->first();
			$title->delete();
			return redirect(route('titles.index'))->withToastSuccess('Title with name ' . $title->name . ' have been deleted successfully.');
		}

		public function getTitleDetailsForDestroying(Request $request, Title $title): \Illuminate\Http\JsonResponse
		{
			$data = $request->all();
			$titleInfo = $title->where('id', $data['id'])->first();
			$array = ['name' => $titleInfo->title];
			return response()->json($array);
		}

	}
