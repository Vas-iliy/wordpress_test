<? get_header(); ?>

<h1>Hello, world!</h1>

<? if (have_posts()): while (have_posts()): the_post(); ?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><? the_title(); ?></h5>
            </div>

            <div class="card-body">
                <p class="card-text"><? the_excerpt(); ?></p>
            </div>

            <div class="card-footer">
                <a href="<? the_permalink(); ?>" class="btn btn-primary">Читать далее</a>
            </div>
        </div>
    </div>
<?endwhile;?>
<?endif;?>

<? get_footer(); ?>