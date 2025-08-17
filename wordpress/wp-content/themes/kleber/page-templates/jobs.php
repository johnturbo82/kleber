<?php
/* 
Template Name: Karriere
*/
get_header(); ?>

<div class="stage content">
    <?php while (have_posts()) : the_post(); ?>
        <h1 class="title"><span><?php the_title(); ?></span></h1>
        <?php the_content(); ?>
    <?php endwhile; ?>
    <h2>Aktuelle Stellenangebote</h2>
    <div class="jobs">
        <?php
        $jobs_query = new WP_Query(array(
            'post_type' => 'jobs', // Custom Post Type "Jobs"
            'posts_per_page' => 100, // Anzahl der angezeigten Jobs
            'orderby' => 'date', // Sortierung nach Datum
            'order' => 'DESC' // Neueste zuerst
        ));

        if ($jobs_query->have_posts()) :
            while ($jobs_query->have_posts()) : $jobs_query->the_post(); ?>
                <div class="job">
                    <p><?php echo get_post_meta(get_the_ID(), 'job_start_date', true) ?: 'Ab sofort'; ?></p>
                    <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                    <p><?php echo get_post_meta(get_the_ID(), 'job_hours', true) ?: '40h / Woche'; ?></p>
                </div>
            <?php endwhile;
            wp_reset_postdata(); // Reset der Query
        else : ?>
            <p>Derzeit sind keine Stellenangebote verfügbar.</p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>