<?php
$this->load_header();
?>


<div class="banner p-5 text-center bg-light border-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h1 class="display-1"><span class="text-success">Work</span>street</h1>
                <p class="lead">Find jobs, Get hired but not in the streets!</p>
            </div>
        </div>
    </div>

</div>
<?php $msg =  $_SESSION['message'] ?? false; ?>
<?php if ($msg) { ?>
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="alert alert-success text-center">
        <p class="lead"><?= $msg ?></p>
    </div>
<?php } ?>

<!-- listings display -->
<div class="m-lg-5">
    <div class="main-container">
        <div class='row justify-content-center'>
            <div class="col-lg-8">
                <?php if ($listing && ($listing['created_by'] == $_SESSION['user_id'] || $_SESSION['user_id'] == 1)) { ?>
                    <div class="float-end">
                        <form action="/workstreet/public/listings/destroy" method="POST">
                            <a href="/workstreet/public/listings/edit?id=<?= $listing['listing_id'] ?>" class="btn btn-outline-dark"><i class="fas fa-edit"></i> Edit</a>

                            <input type="hidden" name="listing_id" value="<?= $listing['listing_id'] ?>">
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Delete <?= $listing['title'] ?> listing?')"><i class="far fa-trash-alt"></i> Delete</button>
                        </form>
                    </div>
                <?php } ?>
            </div>
            <div class='col-lg-8'>

                <div class='p-5 my-3 bg-light text-center listing-div'>
                    <?php
                    if ($listing) { ?>
                        <?php if ($listing['logo']) { ?>
                            <img src='<?= ROOT . $listing['logo'] ?>' alt='' class='img-fluid mb-3' />
                        <?php } else { ?>
                            <img src='<?= ROOT ?>/assets/images/no-image.png' alt='' class='img-fluid mb-3' />
                        <?php } ?>
                        <h2 class='text-success'><?= $listing['title'] ?> </h2>
                        <p class="text-muted fw-bold"><?= $listing['company'] ?></p>
                        <p><?= $listing['tags'] ?></p>
                        <p><i class="fas fa-search-location text-success"></i> <?= $listing['address'] ?></p>
                        <p class="text-muted"><i class="far fa-clock"></i> <?= "Posted time: " . time_ago($listing['created_at']) ?></p>
                        <p class="text-muted"><i class="far fa-clock"></i> <?= "Last updated : " . time_ago($listing['updated_at']) ?></p>
                        <hr>
                        <h4 class="fw-bold text-start mb-3">Job Description:</h4>
                        <p class="text-left"><?= $listing['description'] ?></p>
                        <div class="d-grid gap-2">
                            <a href="mailto:<?= $listing['email'] ?>" class="btn btn-success">Email: <?= $listing['company'] ?></a>
                            <a href="<?= $listing['website'] ?>" target="_blank" class="btn btn-secondary"><?= $listing['company'] ?> Website</a>
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <a href="/workstreet/public/listings" class="btn btn-dark">Back</a>
                        </div>

                    <?php } else { ?>
                        <div class="alert alert-danger text-center">
                            <p class="lead">Listing Data was not found.</p>
                            <a href="/workstreet/public/listings" class="btn btn-dark">Go to Home</a>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>


    </div>
</div>


<?php
unset($_SESSION['message']);
$this->view("includes/footer", $data);
