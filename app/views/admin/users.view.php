<?php
$this->load_header_admin();

?>

<div class="bg-light p-5" style="margin-left:20%">
    <h1 class="display-1 mb-4 text-center">Manage <span class="text-success"><?= $title ?></span></h1>
    <hr>
    <table class="table table-hovered table-striped" id="listing-table">
        <thead class="bg-success bg-opacity-50">
            <tr>
                <th>Company</th>
                <th>Email</th>
                <th>Address</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>

                <tr>
                    <td><?= $user['company'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['address'] ?></td>
                    <td><?= $user['update_flg'] == 1 ? '<span class="badge rounded-pill text-bg-success">Active</span>' : '<span class="badge rounded-pill text-bg-danger">Archived</span>' ?></td>
                    <td><a class="btn btn-sm btn-info" href="/workstreet/public/admin/user?user_id=<?= $user['user_id'] ?>">View</a>
                    </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>

</div>



<script src="<?= ROOT ?>/assets/js/script.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>


<?php
$this->view("includes/admin/footer", $data);
