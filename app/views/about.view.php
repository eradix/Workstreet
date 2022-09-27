<?php
$this->load_header();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="<?= ROOT ?>/assets/images/icon.jpg">
        <title><?= APP_NAME ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= ROOT ?>/assets/css/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
</head>

<body>
    <div class="container">

        <div class="row justify-content-center my-5">
            <div class="col-lg-8 bg-light p-5 border">
                <h1 class="display-1 mb-4 text-center">About <span class="text-success"><?= $title ?></span></h1>
                <hr>
                <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas sit id ducimus reiciendis similique quae quis dolorum, nesciunt fugiat maxime! Autem ratione dolore deleniti non quis blanditiis minima sed, earum temporibus quam numquam aspernatur voluptatem saepe esse possimus? Est voluptatem fugit odit nam consequuntur itaque perferendis rerum tempora autem laudantium!</p>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, sed quos quidem quia soluta velit unde eligendi, nulla quasi laudantium quisquam molestiae repellendus accusamus sit? Alias laudantium sed nisi rerum, est incidunt beatae deserunt iure possimus consequatur ab cumque, nemo iusto suscipit! Laboriosam est pariatur voluptatum cupiditate assumenda saepe quia.</p>
                <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique necessitatibus quaerat debitis laboriosam a dignissimos at fugiat enim quidem ducimus iste quas eius, cumque aperiam labore eos? Quisquam consequuntur dolorum non neque doloremque impedit molestiae nostrum quae qui odio voluptate nesciunt ullam harum alias, perspiciatis modi vitae omnis ut excepturi?</p>
            </div>
        </div>


    </div>



</body>

</html>


<?php
$this->view("includes/footer", $data);
