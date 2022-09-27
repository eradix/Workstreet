<?php
$this->load_header_admin();

?>
<?php $validation_errors = $errors ?? []; ?>


<div class="bg-light p-5" style="margin-left:20%">
    <h1 class="display-1 mb-4 text-center">Create new <span class="text-success">Listing</span></h1>
    <hr>
    <form method="post" action="/workstreet/public/admin/store" enctype="multipart/form-data">
        <div class='p-5 my-3 bg-light border'>

            <?php if (isset($message)) { ?>
                <div class="mb-3 p-3 text-center">
                    <p class="text-success"><?= $message ?></p>
                </div>

            <?php } ?>
            <div class="mb-5 text-center">
                <?php if ($profile['logo']) { ?>
                    <img src='<?= ROOT . $profile['logo'] ?>' alt='' class='mb-3' width="186" height="146" />
                    <input type="hidden" name="old_logo" value="<?= $listing['logo'] ?>">
                <?php } else { ?>
                    <img src='<?= ROOT ?>/assets/images/no-image.png' alt='' class='mb-3' width="186" height="146" />
                    <input type="hidden" name="old_logo" value="<?= $listing['logo'] ?>">
                <?php } ?>
                <h3 class="fw-bold"><?= $profile['company'] ?></h3>
                <p><i class="fas fa-search-location text-success"> </i> <?= $profile['address'] ?></p>
                <p><i class="fas fa-mail-bulk text-success"> </i> <?= $profile['email'] ?></p>
                <p><i class="fas fa-globe text-success"></i> <?= $profile['website'] ?></p>

            </div>

            <?php if ($validation_errors !== []) { ?>
                <div class="col bg-danger bg-opacity-25 p-3 my-4 text-danger">
                    <?php foreach ($validation_errors as $error)
                        echo "<li>$error</li>";
                    ?>
                </div>
            <?php } ?>

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Job title/Position" value="<?= $title ?? "" ?>">
            </div>

            <div class="mb-3">
                <label for="tags" class="form-label">Tags</label>
                <input type="text" class="form-control" id="tags" name="tags" placeholder="Comma separated values ex. Java, PHP, Python" value="<?= $tags ?? "" ?>">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Job description/qualifications"> <?= $description ?? "" ?></textarea>
            </div>

            <div class="d-grid gap-2 mt-3">
                <button class="btn btn-success">Create Listing</button>
                <a href="/workstreet/public/admin" class="btn btn-dark">Back</a>
            </div>
    </form>

</div>



<script src="<?= ROOT ?>/assets/js/script.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>


<?php
$this->view("includes/admin/footer", $data);
