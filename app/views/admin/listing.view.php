<?php
$this->load_header_admin();

?>

<div class="bg-light p-5" style="margin-left:20%">
    <h1 class="display-1 mb-4 text-center">View <span class="text-success"><?= $title ?></span></h1>
    <hr>

    <?php $msg =  $_SESSION['message'] ?? false; ?>
    <?php if ($msg) { ?>
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="alert alert-success text-center">
            <p class="lead"><?= $msg ?></p>
        </div>
    <?php } ?>


    <div class="col-lg-12">
        <?php if ($listing) { ?>
            <div class="text-end">
                <form action="/workstreet/public/admin/destroy" method="POST">
                    <a href="/workstreet/public/admin/edit_listing?id=<?= $listing['listing_id'] ?>" class="btn btn-outline-primary"><i class="fas fa-edit"></i> Edit</a>

                    <input type="hidden" name="listing_id" value="<?= $listing['listing_id'] ?>">
                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Delete <?= $listing['title'] ?> listing?')"><i class="far fa-trash-alt"></i> Delete</button>
                    <a href="/workstreet/public/admin/listings" class="btn btn-outline-dark">Back</a>
                </form>
            </div>
        <?php } ?>
    </div>

    <?php if ($listing) { ?>
        <div class='p-5 my-3 bg-light listing-div'>
            <div class="card mb-4">
                <div class="row g-0">
                    <div class="col-md-4">
                        <?php if ($listing['logo']) { ?>
                            <img src='<?= ROOT . $listing['logo'] ?>' alt='' class='img-fluid mb-3 rounded-start' style="height: 100% !important;" />
                        <?php } else { ?>
                            <img src='<?= ROOT ?>/assets/images/no-image.png' alt='' class='img-fluid mb-3 rounded-start' style="height: 100% !important;" />
                        <?php } ?>
                    </div>
                    <div class=" col-md-8">
                        <div class="card-body">
                            <h2 class="card-title"><?= $listing['title'] ?></h2>
                            <p class="card-text lead fw-bold text-success"><?= $listing['company'] ?></p>
                            <p class="card-text"><?= $listing['tags'] ?></p>
                            <p class="card-text"><small class="text-muted"><i class="far fa-clock"></i> <?= "Posted time: " . time_ago($listing['created_at']) ?></small></p>
                            <p class="card-text"><small class="text-muted"><i class="far fa-clock"></i> <?= "Last updated : " . time_ago($listing['updated_at']) ?></small></p>
                            <p class="card-text">Status: <?= $listing['update_flg'] == 1 ? '<span class="badge rounded-pill text-bg-success">Active</span>' : '<span class="badge rounded-pill text-bg-danger">Archived</span>' ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <h4 class="fw-bold text-start mb-3">Job Description:</h4>
            <p class="text-left"><?= $listing['description'] ?></p>
            <div class="d-grid gap-2">
                <a href="mailto:<?= $listing['email'] ?>" class="btn btn-success">Email: <?= $listing['email'] ?></a>
                <a href="<?= $listing['website'] ?>" target="_blank" class="btn btn-secondary">Website: <?= $listing['website'] ?></a>
            </div>
            <div class="d-grid gap-2 mt-3">
                <a href="/workstreet/public/admin/listings" class="btn btn-dark">Back</a>
            </div>


        <?php } else { ?>
            <div class="alert alert-danger text-center">
                <p class="lead">Listing Data was not found.</p>
                <a href="/workstreet/public/admin/listings" class="btn btn-dark">Go to Home</a>
            </div>
        <?php } ?>

        </div>

</div>



<script src="<?= ROOT ?>/assets/js/script.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>


<?php
unset($_SESSION['message']);
$this->view("includes/admin/footer", $data);
