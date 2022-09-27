<?php

date_default_timezone_set('Asia/Manila');

class ListingModel extends Model
{
    //display all listings or filtering listings
    public function index($data = [])
    {
        $searchValue = $data['search'] ?? false;
        $limit = $data['limit'] ?? false;

        $sql = "SELECT a.*, b.user_id, b.company, b.email, b.website, b.address, b.logo FROM listings a inner join ";
        $sql .= " user_account b on a.created_by = b.user_id WHERE a.update_flg = 1 and b.update_flg = 1 ";
        if ($searchValue) {
            $sql .= "and (title like '%" . f_sanitize($searchValue) . "%' ";
            $sql .= "or b.company like '%" . f_sanitize($searchValue) . "%' ";
            $sql .= "or tags like '%" . f_sanitize($searchValue) . "%' ";
            $sql .= "or b.address like '%" . f_sanitize($searchValue) . "%') ";
        }
        if ($limit) {
            $sql .= " ORDER BY created_at DESC limit {$data['limit']} offset {$data['offset']}";
        } else {
            $sql .= " ORDER BY created_at DESC";
        }

        $listings = f_get_rows($sql);

        return $listings;
    }

    public function count_all()
    {
        $sql = "SELECT count(*) FROM listings where update_flg = 1";
        $count =  f_get_one($sql);
        return $count;
    }

    //displaying single listings
    public function show($data)
    {
        $sql = "SELECT a.*, b.user_id, b.company, b.email, b.website, b.address, b.logo FROM listings a inner join ";
        $sql .= "user_account b on a.created_by = b.user_id WHERE a.update_flg = 1 AND b.update_flg = 1 ";
        $sql .= "AND listing_id = '{$data['listing_id']}'";
        $listing = f_get_row($sql);
        return $listing;
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

    public function test()
    {
        return f_get_rows("select * from listings");
    }
}
