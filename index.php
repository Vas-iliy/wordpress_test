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
                        <a href="<? the_permalink(); ?>" class="btn btn-primary">Читать далее</a>
                    </div>
                </div>
            </div>
	    <?endwhile;?>
        <? the_posts_pagination([
			    'end_size'     => 1,
			    'mid_size'     => 1,
			    'prev_text'    => __('« Previous'),
			    'next_text'    => __('Next »'),
		    ]); ?>
	    <?endif;?>
    </div>


	    <? get_sidebar(); ?>
    </div>

</div>


<? get_footer(); ?>