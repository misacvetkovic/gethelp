<?php

namespace App\Http\Controllers;

use App\Post;

/**
* Pages Controller
*/
class PagesController extends Controller {
	
	public function getIndex() {

		$posts = Post::orderBy('created_at', 'desc')->limit(10)->get();

		//ja sam ovo dodao
        $features = Post::where('featured_post', '=', '1')->get(); 

		return view('pages.welcome')->withPosts($posts)->withFeatures($features);

	}

	public function getAbout() {

		$first = 'Misa';
		$last = 'Cvetkovic';

		$fullname = $first . " " . $last;
		$email = 'cvetkovicmisa@yahoo.com';
		$data = [];
		$data['email'] = $email;
		$data['fullname'] = $fullname;

		return view('pages.about')->withData($data);

	}

	public function getContact() {

		return view('pages.contact');
		
	}

}