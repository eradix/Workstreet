<?php

date_default_timezone_set('Asia/Manila');

class UserModel extends Model
{
    //profile
    //displaying single listings
    public function show_listing_by_user($data)
    {
        $sql = "SELECT a.*, b.user_id, b.company, b.email, b.website, b.address, b.logo FROM listings a inner join ";
        $sql .= "user_account b on a.created_by = b.user_id WHERE b.update_flg = 1 ";
        if (!$data['display_all']) {
            $sql .= "AND a.update_flg = 1 ";
        }
        $sql .= "AND created_by = '{$data['user_id']}' ORDER BY created_at DESC";
        $listing = f_get_rows($sql);
        return $listing;
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_role']);

        echo "<Script>window.location.href='/workstreet/public/users/login/';</script>";
    }

    //STORING NEW user
    public function store_login($data)
    {
        $now = date("Y-m-d H:i:s");

        $columns = [
            'company'       => $data['company'],
            'logo'          => $data['logo'],
            'address'       => $data['address'],
            'email'         => $data['email'],
            'website'       => $data['website'],
            'password'      => $data['password'],
            'role'          => 2,
            'updated_at'    => $now,
            'update_flg'    => 1,
        ];

        $result = f_insert('user_account', $columns);

        return $result;
    }


    //STORING NEW user
    public function auth_user($data)
    {
        $sql = "SELECT *, count(*) as count FROM user_account WHERE email = ? and password = ?";
        $result = f_get_row($sql, [$data['email'], $data['password']]);

        if ($result['count'] > 0) {
            $_SESSION['user_id']        = $result['user_id'];
            $_SESSION['user_role']      = $result['role'];
            unset($_SESSION['login_error']);
            echo "<Script>window.location.href='/workstreet/public/listings/';</script>";
        } else {
            $_SESSION['login_error'] = "Invalid username or password.";
            echo "<Script>window.location.href='/workstreet/public/users/login';</script>";
        }
    }


    //update user profile
    public function update($data)
    {
        $now = date("Y-m-d H:i:s");

        $columns = [
            'company'       => $data['company'],
            'logo'          => $data['logo'],
            'address'       => $data['address'],
            'email'         => $data['email'],
            'website'       => $data['website'],
            'password'      => $data['password'],
            'role'          => 2,
            'updated_at'    => $now,
            'update_flg'    => 1,
        ];

        $where = " user_id = '{$data['user_id']}'";

        $result = f_update('user_account', $columns, $where);

        return $result;
    }
    //validate email
    public function isEmailExist($email)
    {
        $sql = "SELECT count(*) as count FROM user_account WHERE email = ?";
        $result = f_get_one($sql, [$email]);
        if ($result > 0) {
            return true;
        }
        return false;
    }
}
