<?php
$this->load_header();
?>

<?php $msg =  $_SESSION['message'] ?? false; ?>
<?php if ($msg) { ?>
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="alert alert-success text-center">
        <p class="lead"><?= $msg ?></p>
    </div>
<?php } ?>

<div class="banner p-5 bg-light border-bottom">
    <div class="container">
        <h2 class="text-center text-success mb-5">Company Profile</h2>

        <?php if ($profile) { ?>

            <div class="row justify-content-center">

                <div class="col-lg-3">
                    <?php if ($profile['logo']) { ?>
                        <img src='<?= ROOT . $profile['logo'] ?>' alt='' class='img-fluid mb-3' />
                    <?php } else { ?>
                        <img src='<?= ROOT ?>/assets/images/no-image.png' alt='' class='img-fluid mb-3' />
                    <?php } ?>
                </div>
                <div class="col-lg-5 mt-4">
                    <p><i class="fas fa-user-tie text-success"></i> Company: <?= $profile['company'] ?></p>
                    <p><i class="fas fa-search-location text-success"></i> Location: <?= $profile['address'] ?></p>
                    <p><i class="fas fa-mail-bulk text-success"> </i> Email Address: <?= $profile['email'] ?></p>
                    <p><i class="fas fa-globe text-success"></i> Website: <?= $profile['website'] ?></p>

                    <?php if ($_SESSION['user_role'] === 1 || $_SESSION['user_id'] === $profile['user_id']) { ?>
                        <div class="mb-3">
                            <a class="btn btn-outline-success" href="/workstreet/public/users/edit?user_id=<?= $profile['user_id'] ?>">Edit Profile</a>
                            <a class="btn btn-outline-success" href="/workstreet/public/users/listings">Manage Listings</a>
                        </div>
                    <?php } ?>
                </div>
            </div>

        <?php } else { ?>
            <div class='col-lg-12 '>
                <p class="lead text-danger text-center fw-bold">No Company found in this profile.</p>
            </div>
        <?php } ?>

    </div>

</div>


<!-- listings display -->
<div id="listings" class="m-lg-5">
    <div class="main-container">
        <?php if ($listings && $profile) { ?>
            <h3 class="text-success mb-4">Job Listings:</h3>
            <div class='row justify-content-between text-center'>


                <?php
                foreach ($listings as $listing) {
                ?>
                    <?php $tags = explode(", ", $listing['tags']) ?>
                    <div class='col-lg-6'>
                        <div class='p-5 my-3 bg-light listing-div'>
                            <a href="/workstreet/public/listings/show?id=<?= $listing['listing_id'] ?>">
                                <?php if ($listing['logo']) { ?>
                                    <img src='<?= ROOT . $listing['logo'] ?>' alt='' width="224" height="186" class=' mb-3' />
                                <?php } else { ?>
                                    <img src='<?= ROOT ?>/assets/images/no-image.png' alt='' width="224" height="186" class=' mb-3' />
                                <?php } ?>
                                <h2 class='text-success'><?= $listing['title'] ?> </h2>
                            </a>
                            <p class="text-muted fw-bold"><?= $listing['company'] ?></p>
                            <p><?php
                                foreach ($tags as $tag) {
                                    echo "<span class='badge bg-dark'><a href='/workstreet/public/listings/search?q=$tag'>$tag</a></span> ";
                                }
                                ?></p>
                            <p><i class="fas fa-search-location text-success"></i> <?= $listing['address'] ?></p>
                            <p class="text-muted"><i class="far fa-clock"></i> <?= time_ago($listing['created_at']) ?></p>
                        </div>

                    </div>

                <?php }
            } else { ?>
                <div class='col-lg-12 '>
                    <?php if ($profile) { ?>
                        <p class="lead text-danger text-center fw-bold">No Listings found.</p>
                    <?php } ?>
                </div>
            <?php } ?>


            </div>
    </div>
</div>

<?php
unset($_SESSION['message']);
$this->view("includes/footer", $data);
