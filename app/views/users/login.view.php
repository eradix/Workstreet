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

    <?php $login_error = $_SESSION['login_error'] ?? false ?>

    <main>
        <div class="container">
            <div class="row form-container">
                <div class="col-md-6 bg-success p-5 text-light">
                    <h2 class="display-4 fw-bold">Welcome to Workstreet</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere sed, ducimus repellendus veritatis quaerat aliquid sint ipsum nesciunt veniam suscipit consectetur iusto architecto aliquam corrupti ab reiciendis assumenda maiores! Nisi?</p>
                    <ul>
                        <li>Find Jobs.</li>
                        <li>Get hired.</li>
                        <li>Jump start your career.</li>
                    </ul>
                </div>
                <div class="col-md-6 bg-light p-5">
                    <h2 class="text-success mb-4">User login</h2>
                    <?php if ($login_error) { ?>
                        <div class="col bg-danger bg-opacity-25 p-3 my-4 text-danger">
                            <?php echo "<li>$login_error</li>"; ?>
                        </div>
                    <?php }  ?>
                    <form method="post" action="/workstreet/public/users/login_user">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                    <div class="d-grid gap-2">
                        <a class="btn btn-secondary mt-3" href="/workstreet/public/users/register">Create an account</a>
                    </div>
                </div>
            </div>
        </div>
    </main>


</body>

</html>