<?php
$this->load_header_admin();

?>

<div class="bg-light p-5" style="margin-left:20%">
    <h1 class="display-1 mb-4 text-center">View <span class="text-success">User</span></h1>
    <hr>

    <?php $msg =  $_SESSION['message'] ?? false; ?>
    <?php if ($msg) { ?>
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="alert alert-success text-center">
            <p class="lead"><?= $msg ?></p>
        </div>
    <?php } ?>


    <div class="col-lg-12">
        <?php if ($user) { ?>
            <div class="text-end">
                <form action="/workstreet/public/admin/destroy" method="POST">
                    <a href="/workstreet/public/admin/edit_listing?id=<?= $user['user_id'] ?>" class="btn btn-outline-primary"><i class="fas fa-edit"></i> Edit</a>

                    <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Delete <?= $user['company'] ?>?')"><i class="far fa-trash-alt"></i> Delete</button>
                    <a href="/workstreet/public/admin/users" class="btn btn-outline-dark">Back</a>
                </form>
            </div>
        <?php } ?>
    </div>

    <?php if ($user) { ?>
        <div class='p-5 my-3 bg-light listing-div'>
            <div class="card mb-4">
                <div class="row g-0">
                    <div class="col-md-4">
                        <?php if ($user['logo']) { ?>
                            <img src='<?= ROOT . $user['logo'] ?>' alt='' class='img-fluid mb-3 rounded-start' style="height: 100% !important;" />
                        <?php } else { ?>
                            <img src='<?= ROOT ?>/assets/images/no-image.png' alt='' class='img-fluid mb-3 rounded-start' style="height: 100% !important;" />
                        <?php } ?>
                    </div>
                    <div class=" col-md-8">
                        <div class="card-body">
                            <h2 class="card-title fw-bold"><?= $user['company'] ?></h2>
                            <p class="card-text">Email: <?= $user['email'] ?></p>
                            <p class="card-text"><small class="text-muted"><i class="far fa-clock"></i> <?= "Date registered: " . time_ago($user['created_at']) ?></small></p>
                            <p class="card-text"><small class="text-muted"><i class="far fa-clock"></i> <?= "Last updated : " . time_ago($user['updated_at']) ?></small></p>
                            <p class="card-text">Status: <?= $user['update_flg'] == 1 ? '<span class="badge rounded-pill text-bg-success">Active</span>' : '<span class="badge rounded-pill text-bg-danger">Archived</span>' ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <p class="lead">Address: <?= $user['address'] ?></p>
            <p class="lead">Website: <a href="<?= $user['website'] ?>"><?= $user['website'] ?></a></p>
            <p class="lead">Role: <?= $user['role'] === 1 ? 'Administrator' : 'User' ?></p>
            <p class="lead">Number of listings posted: <?= $all_post ?></p>


        <?php } else { ?>
            <div class="alert alert-danger text-center">
                <p class="lead">Listing Data was not found.</p>
                <a href="/workstreet/public/admin/users" class="btn btn-dark">Go to Home</a>
            </div>
        <?php } ?>

        </div>

</div>



<script src="<?= ROOT ?>/assets/js/script.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>


<?php
unset($_SESSION['message']);
$this->view("includes/admin/footer", $data);
