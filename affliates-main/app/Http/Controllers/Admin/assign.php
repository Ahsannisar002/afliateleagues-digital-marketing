<?php


	namespace App\Http\Controllers\Admin;


	use App\Content;
	use App\Title;
	use Illuminate\Http\Request;

	trait assign
	{

		/**
		 * @param $id
		 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public function showAssignVideo($id)
		{
			$title = Title::findOrFail($id);
			return view('Admin.titles.assignVideo', compact(['title']));
		}

		public function assignVideo(Request $request, Title $title, Content $content)
		{
			$data = $request->all();
			$titleInfo = $title->where('id', $data['title_id'])->first();
			if ($titleInfo) {
				$contentInfo = $content->where('title_id', $titleInfo->id)->first();
				if ($contentInfo) {
					return redirect(route('titles.index'))->with('toast_error', 'title already is assigned with data');
				} else {
					$content->create(
						[
							'title_id' => $data['title_id'],
							'video' => $data['link']
						]
					);
					return redirect(route('titles.index'))->withToastSuccess('Video added to title ' . $data['title_id'] . '.');
				}
			} else {
				return redirect(route('titles.index'))->withToastSuccess('Title doesnt exists.');
			}
		}

		public function AssignData(Request $request, Title $title, Content $content)
		{
			$data = $request->all();
			$titleInfo = $title->where('id', $data['title_id'])->first();
			if ($titleInfo) {
				$contentInfo = $content->where('title_id', $titleInfo->id)->first();
				if ($contentInfo) {
					return redirect(route('titles.index'))->with('toast_error', 'title already is assigned with data');
				} else {
					$content->create(
						[
							'title_id' => $data['title_id'],
							'data' => $data['data']
						]
					);
					return redirect(route('titles.index'))->withToastSuccess('Data added to title ' . $data['title_id'] . '.');
				}
			} else {
				return redirect(route('titles.index'))->withToastSuccess('Title doesnt exists.');
			}
		}

		/**
		 * @param $id
		 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public function showAssignData($id)
		{
			$title = Title::findOrFail($id);
			return view('Admin.titles.assign', compact(['title']));
		}

		public function AssignImage(Request $request, Title $title, Content $content)
		{
			$data = $request->all();
			$titleInfo = $title->where('id', $data['title_id'])->first();
			if ($titleInfo) {
				$contentInfo = $content->where('title_id', $titleInfo->id)->first();
				if ($contentInfo) {
					return redirect(route('titles.index'))->with('toast_error', 'title already is assigned with data');
				} else {
					$content->create(
						[
							'title_id' => $data['title_id'],
							'image' => $data['image']
						]
					);
					return redirect(route('titles.index'))->withToastSuccess('Data added to title ' . $data['title_id'] . '.');
				}
			} else {
				return redirect(route('titles.index'))->withToastSuccess('Title doesnt exists.');
			}
		}

		/**
		 * @param $id
		 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public function showAssignImage($id)
		{
			$title = Title::findOrFail($id);
			return view('Admin.titles.assignImage', compact(['title']));
		}
	}