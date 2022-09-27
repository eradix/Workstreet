<?php

/**
 * 404 for page not found
 */
class _404 extends Controller
{

	function index()
	{
		$data['title'] = '404';
		$this->view('404', $data);
	}

	public function load_header()
	{
		$user = $this->load_model("ListingModel");
		$data['user'] = $user->show_profile(['user_id' => $_SESSION['user_id']]);
		$this->view("includes/header", $data);
	}
}
