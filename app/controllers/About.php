<?php

/**
 * about php
 */
class About extends Controller
{

    function index()
    {
        $data['title'] = APP_NAME;
        $this->view('about', $data);
    }

    public function load_header()
    {
        $user = $this->load_model("ListingModel");
        $data['user'] = $user->show_profile(['user_id' => $_SESSION['user_id']]);
        $this->view("includes/header", $data);
    }
}
