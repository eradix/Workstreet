<?php
$this->load_header();
?>


<div class="banner p-5 text-center bg-light border-bottom">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<h1 class="display-1"><span class="text-success">Work</span>street</h1>
				<p class="lead">Find jobs, Get hired but not in the streets!</p>
				<form action="/workstreet/public/listings/search">
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="q" placeholder="Search for title, company name or tags" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?= $search ?? '' ?>">
						<button class="input-group-text" id="basic-addon2">Search</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</div>

<?php $msg =  $_SESSION['message'] ?? false; ?>
<?php if ($msg) { ?>
	<div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="col-lg-6 mx-auto alert alert-danger text-center">
		<p class="lead"><?= $msg ?></p>
	</div>
<?php } ?>

<!-- listings display -->
<div id="listings" class="m-lg-5">
	<div class="main-container">

		<div class='row justify-content-between text-center'>
			<?php
			if ($listings) {

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
							<p class="text-muted fw-bold"><a href="/workstreet/public/users/profile?user_id=<?= $listing['created_by'] ?>"><?= $listing['company'] ?></a></p>
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
					<p class="lead text-danger text-center fw-bold">No Listings found.</p>
				</div>
			<?php } ?>


		</div>

		<!-- pagination -->
		<?php $page = $page ?? false;
		if ($page && $listings) { ?>
			<nav aria-label="Page navigation example">
				<ul class="pagination justify-content-end">
					<?php if ($page > 1) { ?>
						<li class="page-item">
							<a class="page-link" href="/workstreet/public/listings?page=<?= ($page - 1) ?>" tabindex="-1" aria-disabled="true">Previous</a>
						</li>
					<?php } ?>

					<?php if ($page != $total_pages) { ?>
						<li class="page-item">
							<a class="page-link" href="/workstreet/public/listings?page=<?= ($page + 1) ?>">Next</a>
						</li>
					<?php } ?>
				</ul>
			</nav>
		<?php } ?>


	</div>
</div>


<?php
unset($_SESSION['message']);
$this->view("includes/footer", $data);
