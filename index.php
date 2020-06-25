<? get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <?/*query_posts('posts_per_page=3')*/?>

	    <? if (have_posts()): while (have_posts()): the_post(); ?>
            <div class="col">
                <div class="card row">
                    <div class="card-header">
                        <h5 class="card-title"><? the_title(); ?></h5>
                    </div>

                    <div class="card-body">
					    <?if (has_post_thumbnail()):
						    the_post_thumbnail('anime', ['class' => 'float-left mr-3']);
					    else:?>
                            <img src="https://picsum.photos/150/150" width="150px" height="150px" alt="" class="float-left mr-3">
					    <?endif;?>
                        <p class="card-text"><? the_excerpt(); ?></p>
                    </div>

                    <div class="card-footer">
                        <a href="<? the_permalink(); ?>" class="btn btn-primary"><?_e('Читать далее', 'test')?></a>
                    </div>
                </div>
            </div>
	    <?endwhile;?>
        <? the_posts_pagination([
			    'end_size'     => 2,
			    'mid_size'     => 1,
		    ]); ?>
        <?else:?>
            <p>Постов нет...</p>
	    <?endif;?>

    </div>
	    <? get_sidebar(); ?>
    </div>

	<?$query = new WP_Query(array(
		'cat' => '6,15',
		'posts_per_page' => '-1',
        'orderby' => 'title',
        'order' => 'ASC'
	));?>

	<? if ($query->have_posts()): while ($query->have_posts()): $query->the_post(); ?>
        <h3><? the_title() ?></h3>
	<?endwhile;?>
	<?endif;?>
    <? wp_reset_postdata(); ?>

</div>


<? get_footer(); ?>