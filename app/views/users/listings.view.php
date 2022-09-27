<?php
$this->load_header();
?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<script src="<?= ROOT ?>/assets/css/users/listings.css"></script>

<div class="banner p-5 text-center bg-light border-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h1 class="display-1">All listings for <span class="text-success"><?= $profile['company'] ?></span></h1>
            </div>
        </div>
    </div>

</div>

<div class="container">
    <div class="row my-4 justify-content-center">
        <div class="col-lg-9">
            <table class="table table-hovered table-striped" id="listing-table">
                <thead class="bg-success bg-opacity-50">
                    <tr>
                        <th>Title</th>
                        <th>Tags</th>
                        <th>Date created</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listings as $listing) { ?>

                        <tr>
                            <td><?= $listing['title'] ?></td>
                            <td><?= $listing['tags'] ?></td>
                            <td><?= $listing['created_at'] ?></td>
                            <td><?= $listing['update_flg'] == 1 ? '<span class="badge rounded-pill text-bg-success">Active</span>' : '<span class="badge rounded-pill text-bg-danger">Archived</span>' ?></td>
                            <td><a class="btn btn-sm btn-info">View</a>
                                <a class="btn btn-sm btn-primary">Edit</a>
                                <a class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="<?= ROOT ?>/assets/js/script.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>