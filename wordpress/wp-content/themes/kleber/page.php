<?php get_header(); ?>

<div class="stage content">
    <?php while (have_posts()) : the_post(); ?>
        <h1 class="title"><span><?php the_title(); ?></span></h1>
        <?php the_content(); ?>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>