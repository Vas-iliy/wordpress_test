<? get_header(); ?>

<? while (have_posts()): the_post(); ?>
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title"><? the_title(); ?></h5>
			</div>

			<div class="card-body">
				<p class="card-text"><? the_content(); ?></p>
			</div>

		</div>
	</div>
<?endwhile;?>

<? get_footer(); ?>
