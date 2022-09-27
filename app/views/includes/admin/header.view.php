<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?= ROOT ?>/assets/images/icon.jpg">
    <title><?= APP_NAME . " | ADMIN" ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/admin.css">
</head>

<body>

    <div class="container-fluid">

        <ul>
            <h1 class="text-success mb-3 text-center"><?= APP_NAME ?></h1>
            <hr>
            <li><a class="<?= $_SERVER['REQUEST_URI'] == "/workstreet/public/admin" ? 'active' : ''  ?>" href="/workstreet/public/admin">Dashboard</a></li>
            <li><a class="<?= $_SERVER['REQUEST_URI'] == "/workstreet/public/admin/listings" ? 'active' : ''  ?>" href=" /workstreet/public/admin/listings">Manage Listings</a></li>
            <li><a class="<?= $_SERVER['REQUEST_URI'] == "/workstreet/public/admin/listing_new" ? 'active' : ''  ?>" href="/workstreet/public/admin/listing_new">New Listing</a></li>
            <li><a class="<?= $_SERVER['REQUEST_URI'] == "/workstreet/public/admin/users" ? 'active' : ''  ?>" href="/workstreet/public/admin/users">Manage Users</a></li>
            <li><a class="<?= $_SERVER['REQUEST_URI'] == "/workstreet/public/admin/users-new" ? 'active' : ''  ?>" href="/workstreet/public/admin/users-new">New User</a></li>
            <li><a href="/workstreet/public/listings">Website View</a></li>
        </ul>