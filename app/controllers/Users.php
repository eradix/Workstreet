<?php

class Users extends Controller
{

    function index()
    {
        $user = $this->load_model('UserModel');

        $data['user_id'] = request('user_id');
        $data['display_all'] = false;

        $user_data['profile'] = $user->show_profile($data);

        $user_data['listings'] = $user->show_listing_by_user($data);

        $this->view('users/profile', $user_data);
    }

    //showing LOGIN form
    function login()
    {
        $data['header'] = "Login Page";
        $this->view('users/login', $data);
    }


    function login_user()
    {
        $user = $this->load_model('UserModel');

        $data['email'] = f_sanitize(request('email'));
        $data['password'] = sha1(f_sanitize(request('password')));


        $user->auth_user($data);
    }

    //showing LOGIN form
    function register()
    {
        if (isset($_SESSION['login_error'])) {
            unset($_SESSION['login_error']);
        }
        $data['header'] = "Login Page";
        $this->view('users/register', $data);
    }

    //register a new user
    function store_user()
    {
        $user = $this->load_model('UserModel');

        $validate = validate_user_registration();

        if ($user->isEmailExist(f_sanitize(request('email')))) {
            $email_add = f_sanitize(request('email'));
            array_push($validate, "Email: $email_add already exist.");
        }

        if (count($validate) == 0) {

            $path = $_SERVER["DOCUMENT_ROOT"] . "/workstreet/public/assets/images/uploads";

            $temp_file = $_FILES['logo']['tmp_name'];
            $_SERVER["DOCUMENT_ROOT"];

            $newfilepath = "";
            if ($temp_file != "") {
                $newfilepath = $path . "/" . $_FILES['logo']['name'];

                if (move_uploaded_file($temp_file, $newfilepath)) {

                    $form['logo']           = '/assets/images/uploads/' . $_FILES['logo']['name'];
                    $form['company']        = request('company');
                    $form['address']        = request('address');
                    $form['email']          = request('email');
                    $form['website']        = request('website');
                    $form['password']       = sha1(request('password'));

                    $store = $user->store_login($form);

                    // if ($store) {
                    //     $_SESSION['message'] = "{$form['title']} listing successfully posted!";
                    // }
                    echo header("Location: /workstreet/public/listings/login");
                } else {
                    echo "failed!";
                }
            } else {
                $form['logo']           = request('logo');
                $form['company']        = request('company');
                $form['address']        = request('address');
                $form['email']          = request('email');
                $form['website']        = request('website');
                $form['password']       = sha1(request('password'));

                $user->store_login($form);

                echo header("Location: /workstreet/public/listings/login");
            }
        } else {
            $data['company']        = request('company');
            $data['address']        = request('address');
            $data['email']          = request('email');
            $data['website']        = request('website');
            $data['errors']         = $validate;
            $this->view('users/register', $data);
        }
    }
    function logout()
    {
        $user = $this->load_model('UserModel');

        $user->logout();

        $this->login();
    }


    //showing edit form
    function edit()
    {
        is_logged_in();

        if (empty(request('user_id')) ||  ($_SESSION['user_role'] != 1 &&  $_SESSION['user_id'] != request('user_id'))) {
            redirectTo('workstreet/public/users/profile?user_id=' . $_SESSION['user_id']);
            exit();
        }

        $data['user_id'] = request('user_id');

        $user = $this->load_model('UserModel');
        $data['profile'] = $user->show_profile($data);

        $data['header'] = "Update Profile";

        $this->view('users/edit', $data);
    }

    function update()
    {

        is_logged_in();

        if (empty(request('user_id')) ||  ($_SESSION['user_role'] != 1 &&  $_SESSION['user_id'] != request('user_id'))) {
            redirectTo('workstreet/public/users/profile?user_id=' . $_SESSION['user_id']);
            exit();
        }

        $user = $this->load_model('UserModel');

        $user_profile = $user->show_profile(['user_id' => request('user_id')]);

        $validate = validate_user_registration(true, $user_profile);
        if (count($validate) == 0) {

            $path = $_SERVER["DOCUMENT_ROOT"] . "/workstreet/public/assets/images/uploads";

            $temp_file = $_FILES['new-logo']['tmp_name'];
            $_SERVER["DOCUMENT_ROOT"];


            $password = request('new_password') != "" ? request('new_password') : request('password');

            $newfilepath = "";
            if ($temp_file != "") {
                $newfilepath = $path . "/" . $_FILES['new-logo']['name'];

                if (move_uploaded_file($temp_file, $newfilepath)) {

                    $form['logo']           = '/assets/images/uploads/' . $_FILES['new-logo']['name'];
                    $form['company']        = request('company');
                    $form['address']        = request('address');
                    $form['email']          = request('email');
                    $form['website']        = request('website');
                    $form['password']       = sha1($password);
                    $form['user_id']        = request('user_id');

                    $update = $user->update($form);

                    if ($update) {
                        $_SESSION['message'] = request('company') . " successfully updated!";
                    }
                    unset_userSessions();
                    echo header("Location: /workstreet/public/users/profile?user_id=" . request('user_id'));
                } else {
                    echo "failed!";
                }
            } else {
                $form['logo']           = request('logo');
                $form['company']        = request('company');
                $form['address']        = request('address');
                $form['email']          = request('email');
                $form['website']        = request('website');
                $form['password']       = sha1($password);
                $form['user_id']        = request('user_id');

                $update = $user->update($form);
                if ($update) {
                    $_SESSION['message'] = request('company') . " successfully updated!";
                }
                unset_userSessions();

                echo header("Location: /workstreet/public/users/profile?user_id=" . request('user_id'));
            }
        } else {
            $_SESSION['company_error']        = request('company');
            $_SESSION['address_error']        = request('address');
            $_SESSION['email_error']          = request('email');
            $_SESSION['website_error']        = request('website');
            $_SESSION['errors']         = $validate;
            redirectTo('/workstreet/public/users/edit?user_id=' . request('user_id'));
            exit();
        }
    }
    public function load_header()
    {
        $user = $this->load_model("HeaderModel");
        $data['user'] = $user->show_profile(['user_id' => $_SESSION['user_id']]);
        $this->view("includes/header", $data);
    }

    function listings()
    {
        $user = $this->load_model('UserModel');

        $user_data['profile'] = $user->show_profile(['user_id' => $_SESSION['user_id']]);

        $user_data['listings'] = $user->show_listing_by_user(['user_id' => $_SESSION['user_id'], 'display_all' => true]);

        $this->view('users/listings', $user_data);
    }
}
