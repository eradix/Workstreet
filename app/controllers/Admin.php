<?php

/**
 * admin php
 */
class Admin extends Controller
{

    public function index()
    {
        if (!is_admin()) {
            redirectTo("/workstreet/public/listings/");
        }
        $admin = $this->load_model("adminModel");
        // $data['listings'] = $admin->show_all_listings();
        $data['litings_count'] = count($admin->show_all_listings());
        $data['user_count'] = count($admin->show_all_users());
        $data['title'] = "dashboard";
        $this->view('admin/dashboard', $data);
    }

    public function load_header_admin()
    {
        $user = $this->load_model("ListingModel");
        $data['user'] = $user->show_profile(['user_id' => $_SESSION['user_id']]);
        $this->view("includes/admin/header", $data);
    }
    public function listings()
    {
        if (!is_admin()) {
            redirectTo("/workstreet/public/listings/");
        }
        $admin = $this->load_model("adminModel");
        $data['listings'] = $admin->show_all_listings();
        $data['title'] = "listings";
        $this->view('admin/listings', $data);
    }
    public function show()
    {
        if (!is_admin()) {
            redirectTo("/workstreet/public/listings/");
        }
        $admin = $this->load_model("adminModel");
        $data['listing'] = $admin->show(['listing_id' => f_sanitize(request('listing_id'))]);
        $data['title'] = "Listing";
        $this->view('admin/listing', $data);
    }
    public function edit_listing()
    {
        if (!is_admin()) {
            redirectTo("/workstreet/public/listings/");
        }
        $admin = $this->load_model("adminModel");
        $data['listing'] = $admin->show(['listing_id' => f_sanitize(request('id'))]);
        $data['title'] = "Listing";
        $this->view('admin/edit', $data);
    }
    public function users()
    {
        if (!is_admin()) {
            redirectTo("/workstreet/public/listings/");
        }
        $admin = $this->load_model("adminModel");
        $data['users'] = $admin->show_all_users();
        $data['title'] = "Users";
        $this->view('admin/users', $data);
    }
    //update listing
    function update()
    {
        if (!is_admin()) {
            redirectTo("/workstreet/public/listings/");
        }
        $listing = $this->load_model('adminModel');

        $validate = validate_listing();

        if (count($validate) == 0) {
            $form['listing_id'] = request('listing_id');
            $form['title']         = request('title');
            $form['tags']         = request('tags');
            $form['description'] = request('description');

            $store = $listing->update($form);
            unset_listingSessions();
            if ($store) {
                $_SESSION['message'] = "{$form['title']} listing successfully updated!";
            }
            echo header("Location: /workstreet/public/admin/show?listing_id={$form['listing_id']}");
        } else {
            $_SESSION['title_error']        = request('title');
            $_SESSION['tags_error']        = request('tags');
            $_SESSION['description_error']    = request('description');
            $_SESSION['errors']         = $validate;
            redirectTo('/workstreet/public/admin/edit_listing?id=' . request('listing_id'));
            exit();
        }
    }
    //delete listing
    function destroy()
    {
        if (!is_admin()) {
            redirectTo("/workstreet/public/listings/");
        }
        $listing = $this->load_model('AdminModel');

        $form['listing_id'] = request('listing_id');

        $listing_data = $listing->show(['listing_id' => f_sanitize(request('listing_id'))]);

        $destory = $listing->destroy($form);

        if ($destory) {
            $_SESSION['message'] = "{$listing_data['title']} listing deleted successfully!";
        }
        echo header("Location: /workstreet/public/admin/listings");
    }

    //showing create form
    function listing_new()
    {
        if (!is_admin()) {
            redirectTo("/workstreet/public/listings/");
        }

        $listing = $this->load_model('AdminModel');

        $data['profile'] = $listing->show_profile(['user_id' => $_SESSION['user_id']]);

        $this->view('admin/create-listing', $data);
    }

    //showing create form
    function store()
    {
        $validate = validate_listing();

        $listing = $this->load_model('AdminModel');

        if (count($validate) == 0) {

            $form['title']         = request('title');
            $form['tags']         = request('tags');
            $form['description'] = request('description');

            $store = $listing->store($form);
            $id = f_last_insert_id();

            if ($store) {
                $_SESSION['message'] = "{$form['title']} listing successfully posted!";
            }
            echo header("Location: /workstreet/public/admin/show?listing_id=$id");
        } else {
            $data['title']         = request('title');
            $data['tags']         = request('tags');
            $data['description'] = request('description');
            $data['errors'] = $validate;

            $data['profile'] = $listing->show_profile(['user_id' => $_SESSION['user_id']]);

            $data['header'] = "Post New Listing";
            $this->view('admin/create-listing', $data);
        }
    }
    public function user()
    {
        if (!is_admin()) {
            redirectTo("/workstreet/public/listings/");
        }
        $user = $this->load_model('adminmodel');

        $data['user_id'] = f_sanitize(request('user_id'));

        $user_data['user'] = $user->show_single_profile($data);

        $user_data['all_post'] = count($user->show_listing_by_user($data));

        $this->view('admin/user', $user_data);
    }
}
