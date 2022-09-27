<?php
$this->load_header();
?>

<?php $validation_errors = $_SESSION['errors'] ?? []; ?>

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

<!-- listings display -->
<div class="m-lg-5">
    <div class="main-container">
        <div class='row justify-content-center'>
            <div class='col-lg-8'>
                <form method="post" action="/workstreet/public/listings/update" enctype="multipart/form-data">
                    <div class='p-5 my-3 bg-light'>

                        <?php if ($listing) { ?>

                            <input type="hidden" name="listing_id" value="<?= $listing['listing_id'] ?>">

                            <h2 class="text-success mb-5 text-center"><?= $header ?></h2>

                            <?php if ($validation_errors !== []) { ?>
                                <div class="col bg-danger bg-opacity-25 p-3 my-4 text-danger">
                                    <?php foreach ($validation_errors as $error)
                                        echo "<li>$error</li>";
                                    ?>
                                </div>
                            <?php } ?>

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?= $_SESSION['title_error'] ?? $listing['title'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="logo" class="form-label">Logo</label>
                            </div>

                            <?php if ($listing['logo']) { ?>
                                <img src='<?= ROOT . $listing['logo'] ?>' alt='' class='img-fluid mb-3' />
                                <input type="hidden" name="old_logo" value="<?= $listing['logo'] ?>">
                            <?php } else { ?>
                                <img src='<?= ROOT ?>/assets/images/no-image.png' alt='' class='img-fluid mb-3' />
                                <input type="hidden" name="old_logo" value="<?= $listing['logo'] ?>">
                            <?php } ?>

                            <div class="mb-3">
                                <label for="tags" class="form-label">Tags</label>
                                <input type="text" class="form-control" id="tags" name="tags" value="<?= $_SESSION['tags_error'] ?? $listing['tags'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="company" class="form-label">Company</label>
                                <input type="text" class="form-control" id="company" name="company" value="<?= $listing['company'] ?>" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" id="location" name="location" value="<?= $listing['address'] ?>" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= $listing['email'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="website" class="form-label">Website</label>
                                <input type="text" class="form-control" id="website" name="website" value="<?= $listing['website'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="10"><?= $_SESSION['description'] ?? $listing['description'] ?></textarea>
                            </div>

                            <div class="d-grid gap-2 mt-3">
                                <button class="btn btn-success">Update Listing</button>
                                <a href="/workstreet/public/listings" class="btn btn-dark">Cancel</a>
                            </div>

                        <?php } else { ?>
                            <div class="alert alert-danger text-center">
                                <p class="lead">Listing Data was not found.</p>
                                <a href="/workstreet/public" class="btn btn-dark">Go to Home</a>
                            </div>
                        <?php } ?>
                </form>
            </div>
        </div>

    </div>


</div>
</div>

<?php
$this->view("includes/footer", $data);
