<?php get_header(); ?>
<div class="container">
<section>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article>
        <h2><?php the_title(); ?></h2>
        <p><?php the_excerpt()?><br>
        <a href= "<?php the_permalink(); ?>" ><?php _e('Mehr?','motrton-two')?></a>
        </p>
    </article>
    <?php endwhile; else: ?>
    <p>
    <?php _e('Leider gibt es keinen Post.'); ?>
    </p>
    <?php endif; ?>
</section>

<aside>
<?php get_sidebar(); ?>
</aside>
</div>
<?php get_footer(); ?>
