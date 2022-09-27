<?php

/**
 * Listing Controller
 */
class Listings extends Controller
{
	//index view
	function index()
	{
		is_logged_in();

		$page = $_GET['page'] ?? 1;
		$data['limit'] = 10;
		$data['offset'] = ($page - 1) * $data['limit'];

		$listing = $this->load_model('ListingModel');
		$data['listings'] = $listing->index($data);

		$data['total_records'] = $listing->count_all();
		$data['total_pages'] = ceil($data['total_records'] / $data['limit']);
		$data['page'] = (int) $page;

		$test = "test";

		$this->view('listings/listings', $data);
	}
	//for searching listings
	function search()
	{
		is_logged_in();

		$listing = $this->load_model('ListingModel');
		$data['listings'] = $listing->index(['search' => f_Sanitize(request('q'))]);
		$data['search'] = f_Sanitize(request('q'));
		$this->view('listings/listings', $data);
	}
	//for displaying listing based on their listing id
	function show()
	{
		is_logged_in();

		if (empty(request('id'))) {
			$this->index();
			exit();
		}
		$listing = $this->load_model('ListingModel');
		$data['listing'] = $listing->show(['listing_id' => f_Sanitize(request('id'))]);
		$this->view('listings/listing', $data);
	}
	//showing create form
	function create()
	{
		is_logged_in();

		$listing = $this->load_model('ListingModel');

		$data['profile'] = $listing->show_profile(['user_id' => $_SESSION['user_id']]);

		$data['header'] = "Post New Listing";
		$this->view('listings/create.listing', $data);
	}

	//showing create form
	function store()
	{
		$validate = validate_listing();

		$listing = $this->load_model('ListingModel');

		if (count($validate) == 0) {

			$form['title'] 		= request('title');
			$form['tags'] 		= request('tags');
			$form['description'] = request('description');

			$store = $listing->store($form);
			$id = f_last_insert_id();

			if ($store) {
				$_SESSION['message'] = "{$form['title']} listing successfully posted!";
			}
			echo header("Location: /workstreet/public/listings/show?id=$id");
		} else {
			$data['title'] 		= request('title');
			$data['tags'] 		= request('tags');
			$data['description'] = request('description');
			$data['errors'] = $validate;

			$data['profile'] = $listing->show_profile(['user_id' => $_SESSION['user_id']]);

			$data['header'] = "Post New Listing";
			$this->view('listings/create.listing', $data);
		}
	}

	//showing edit form
	function edit()
	{
		is_logged_in();

		if (empty(request('id'))) {
			$this->index();
			exit();
		}

		$listing = $this->load_model('ListingModel');
		$data['listing'] = $listing->show(['listing_id' => f_Sanitize(request('id'))]);

		$data['header'] = "Update Listing";
		$this->view('listings/edit', $data);
	}

	//update listing
	function update()
	{
		$listing = $this->load_model('ListingModel');

		$validate = validate_listing();

		if (count($validate) == 0) {
			$form['listing_id'] = request('listing_id');
			$form['title'] 		= request('title');
			$form['tags'] 		= request('tags');
			$form['description'] = request('description');

			$store = $listing->update($form);
			unset_listingSessions();
			if ($store) {
				$_SESSION['message'] = "{$form['title']} listing successfully updated!";
			}
			echo header("Location: /workstreet/public/listings/show?id={$form['listing_id']}");
		} else {
			$_SESSION['title_error']        = request('title');
			$_SESSION['tags_error']        = request('tags');
			$_SESSION['description_error']    = request('description');
			$_SESSION['errors']         = $validate;
			redirectTo('/workstreet/public/listings/edit?id=' . request('listing_id'));
			exit();
		}
	}

	//delete listing
	function destroy()
	{
		$listing = $this->load_model('ListingModel');

		$form['listing_id'] = request('listing_id');

		$destory = $listing->destroy($form);

		if ($destory) {
			$_SESSION['message'] = "{$form['title']} listing deleted successfully!";
		}
		echo header("Location: /workstreet/public/");
	}

	public function load_header()
	{
		$user = $this->load_model("HeaderModel");
		$data['user'] = $user->show_profile(['user_id' => $_SESSION['user_id']]);
		$this->view("includes/header", $data);
	}
}
