<?php
/* main model */

class Model
{
    //profile
    //displaying single listings
    public function show_profile($data)
    {
        $sql = "SELECT * FROM user_account ";
        $sql .= "WHERE update_flg = 1 ";
        $sql .= "AND user_id = '{$data['user_id']}'";
        $listing = f_get_row($sql);
        return $listing;
    }
}
