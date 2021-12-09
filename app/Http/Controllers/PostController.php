<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Symfony\Component\Console\Input\Input;

class PostController extends Controller
{

	public function index()
	{
		//
	}


	public function create(Request $request)
	{




		$region1 = $request->region1;


		return Inertia::render('Create', ["region1" => $region1]);
	}


	public function store(Request $request)
	{
		$request->validate([
			'title' => 'required|min:3',
			'content' => 'required|min:3',
			'image' => 'image',
			'region1' => 'required'


		]);



		// $user_id = Auth::user()->id;

		// $region =
		// 	$request->region1;

		$post = new Post();
		$post->user_id = Auth::user()->id;
		$post->title = $request->title;
		$post->content = $request->content;


		$path = $request->image->store('image', 'public');
		$imgpath = "/storage/" . $path;
		$post->image = $imgpath;
		$post->region = $request->region1;

		$post->save();




		// $validated = array_merge($validated, ['image' => $imgpath]);
		// $validated = array_merge($validated, ['user_id' => $user_id]);
		// $validated = array_merge($validated, ['region' => $region]);



		// Post::create($validated);










		// if ($request->hasFile('image')) {
		// 	$image_path = $request->file('image')->store('image', 'public');
		// }


		// $post = new Post();


		// $post->title = $request->title;
		// $post->content = $request->content;
		// $post->user_id = Auth::user()->id;
		// $post->region  = $request->region;


		// $post->image = "/storage/" . $image_path;




		// $posts = Post::all();

		// $b2018 = DB::table('crimes')->get();
		// $t2018 = json_decode(json_encode($b2018), true);





		// $region1 = $request->region1;


		return Redirect::route('dashboard');
	}


	public function show($id)
	{

		$posts = Post::find($id);

		return Inertia::render('Show', ["posts" => $posts]);
	}


	public function edit($id)
	{
		$post = Post::find($id);
		return Inertia::render('Edit', ["post" => $post]);
	}


	public function update(Request $request, $id)
	{
		$post = Post::find($id);
		$post->title = $request->title;
		$post->content = $request->content;
		$post->user_id = Auth::user()->id;

		if ($request->hasFile('image')) {

			$fileName = time() . '_' . $request->file('image')->getClientOriginalName();

			$request->file('image')->storeAs('public/images', $fileName);

			if ($fileName) {
				$input = array_merge($input, ['image' => $fileName]);
			}
		}




		$post->save();


		$posts = Post::find($id);



		return Inertia::render('Show', ["posts" => $posts]);
	}


	public function destroy($id)
	{
		$post = Post::find($id);
		$post->delete();

		//게시글에 첨부된 이미지가 있으면 , 파일시스템에서도 삭제 해 줘야합니다.

		if ($post->image) {
			Storage::delete('public/images/' . $post->image);
		}

		return Redirect::route('dashboard');
	}
}
