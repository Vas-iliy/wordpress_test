<? get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col">
	        <? if (have_posts()): while (have_posts()): the_post(); ?>
                <div class="col">
                    <div class="card row">
                        <div class="card-header">
                            <h5 class="card-title"><? the_title(); ?></h5>
                        </div>

                        <div class="card-body">
					        <?if (has_post_thumbnail()):
						        the_post_thumbnail(); else:?>
                                <img src="https://picsum.photos/1275/638" alt="">
					        <?endif;?>
                            <p class="card-text"><? the_excerpt(); ?></p>
                        </div>

                        <div class="card-footer">
                            <a href="<? the_permalink(); ?>" class="btn btn-primary">Читать далее</a>
                        </div>
                    </div>
                </div>
	        <?endwhile;?>
	        <?endif;?>
        </div>

	    <? get_sidebar(); ?>
    </div>

</div>


<? get_footer(); ?>