<? get_header(); ?>

<? while (have_posts()): the_post(); ?>
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title"><? the_title(); ?></h5>
			</div>

			<div class="card-body">
				<?if (has_post_thumbnail()):
					the_post_thumbnail(); else:?>
                    <img src="https://picsum.photos/1275/638" alt="">
				<?endif;?>
				<p class="card-text"><? the_content(); ?></p>
			</div>

		</div>
	</div>
<?endwhile;?>

<? get_footer(); ?>
