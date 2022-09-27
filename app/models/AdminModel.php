<?php
date_default_timezone_set('Asia/Manila');

class AdminModel extends Model
{
    public function show_all_listings()
    {
        $sql = "SELECT a.*, b.user_id, b.company, b.email, b.website, b.address, b.logo FROM listings a inner join ";
        $sql .= "user_account b on a.created_by = b.user_id WHERE b.update_flg = 1 ";
        $sql .= "ORDER BY created_at DESC";
        $listing = f_get_rows($sql);
        return $listing;
    }

    public function show_all_users()
    {
        $sql = "select * from user_account where update_flg <> 2 order by created_at desc";
        return f_get_rows($sql);
    }

    //displaying single listings
    public function show($data)
    {
        $sql = "SELECT a.*, b.user_id, b.company, b.email, b.website, b.address, b.logo FROM listings a inner join ";
        $sql .= "user_account b on a.created_by = b.user_id WHERE b.update_flg <> 2 ";
        $sql .= "AND listing_id = '{$data['listing_id']}'";
        $listing = f_get_row($sql);
        return $listing;
    }

    //update LISTING
    public function update($data)
    {
        $now = date("Y-m-d H:i:s");

        $columns = [
            'title'         => $data['title'],
            'tags'          => $data['tags'],
            'description'   => $data['description'],
            'updated_at'    => $now,
            'update_flg'    => 1,
        ];

        $where = " listing_id = '{$data['listing_id']}'";

        $result = f_update('listings', $columns, $where);

        return $result;
    }

    //delete LISTING
    public function destroy($data)
    {
        $now = date("Y-m-d H:i:s");

        $columns = [
            'updated_at'    => $now,
            'update_flg'    => 2
        ];

        $where = " listing_id = '{$data['listing_id']}'";

        $result = f_update('listings', $columns, $where);

        return $result;
    }

    //STORING NEW LISTING
    public function store($data)
    {
        $now = date("Y-m-d H:i:s");

        $columns = [
            'title'         => $data['title'],
            'tags'          => $data['tags'],
            'description'   => $data['description'],
            'created_by'    => $_SESSION['user_id'],
            'updated_at'    => $now,
            'update_flg'    => 1,
        ];

        $result = f_insert('listings', $columns);

        return $result;
    }

    //profile
    //displaying single user
    public function show_single_profile($data)
    {
        $sql = "SELECT * FROM user_account ";
        $sql .= "WHERE user_id = '{$data['user_id']}'";
        $listing = f_get_row($sql);
        return $listing;
    }
    //
    public function show_listing_by_user($data)
    {
        $sql = "SELECT a.*, b.user_id, b.company, b.email, b.website, b.address, b.logo FROM listings a inner join ";
        $sql .= "user_account b on a.created_by = b.user_id ";
        $sql .= "WHERE created_by = '{$data['user_id']}' ORDER BY created_at DESC";
        $listing = f_get_rows($sql);
        return $listing;
    }
}
