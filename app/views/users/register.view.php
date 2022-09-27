<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?= ROOT ?>/assets/images/icon.jpg">
    <title><?= APP_NAME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <?php $validation_errors = $errors ?? []; ?>

    <main>
        <div class="container">
            <div class="row register-container justify-content-center">

                <div class="col-lg-7 bg-light p-5 border my-5">
                    <h2 class="display-5 fw-bold">Welcome to <span class="text-success">Workstreet</span></h2>
                    <hr>
                    <h3 class="text-success text-muted mb-4">Register User</h2>

                        <?php if ($validation_errors !== []) { ?>
                            <div class="col bg-danger bg-opacity-25 p-3 my-4 text-danger">
                                <?php foreach ($validation_errors as $error)
                                    echo "<li>$error</li>";
                                ?>
                            </div>
                        <?php } ?>
                        <form method="post" action="/workstreet/public/users/store_user" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="company" class="form-label">Company</label>
                                <input type="text" class="form-control" id="company" name="company" value="<?= $company ?? '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" class="form-control" id="logo" name="logo" multiple accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="company" name="email" value="<?= $email ?? '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="website" class="form-label">Website</label>
                                <input type="text" class="form-control" id="website" name="website" value="<?= $website ?? '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="<?= $address ?? '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="<?= $password ?? '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                        <div class="d-grid gap-2">
                            <a class="btn btn-secondary mt-3" href="/workstreet/public/users/login">Already have an account? Login here.</a>
                        </div>
                </div>
            </div>
        </div>
    </main>


</body>

</html>