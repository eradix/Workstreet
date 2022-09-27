<?php
$this->load_header_admin();

?>

<div class="bg-light p-5" style="margin-left:20%">
    <h1 class="display-1 mb-4 text-center">Manage <span class="text-success"><?= $title ?></span></h1>
    <hr>
    <?php $msg =  $_SESSION['message'] ?? false; ?>
    <?php if ($msg) { ?>
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="alert alert-danger text-center">
            <p class="lead"><?= $msg ?></p>
        </div>
    <?php } ?>

    <table class="table table-hovered table-striped" id="listing-table">
        <thead class="bg-success bg-opacity-50">
            <tr>
                <th>Title</th>
                <th>Tags</th>
                <th>Date created</th>
                <th>Created by</th>
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
                    <td><?= $listing['company'] ?></td>
                    <td><?= $listing['update_flg'] == 1 ? '<span class="badge rounded-pill text-bg-success">Active</span>' : '<span class="badge rounded-pill text-bg-danger">Archived</span>' ?></td>
                    <td><a class="btn btn-sm btn-info" href="/workstreet/public/admin/show?listing_id=<?= $listing['listing_id'] ?>">View</a>
                    </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>

</div>



<script src="<?= ROOT ?>/assets/js/script.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>


<?php
unset($_SESSION['message']);
$this->view("includes/admin/footer", $data);
