<?php
/**
 * Template for displaying single job posts.
 */
get_header();
?>

<div class="stage content job-details">
    <h1 class="title"><span><?php the_title(); ?></span></h1>
    <div class="job-meta">
        <p>Startdatum: <?php echo get_post_meta(get_the_ID(), 'job_start_date', true) ?: 'Ab sofort'; ?></p>
        <p>Arbeitszeit: <?php echo get_post_meta(get_the_ID(), 'job_hours', true) ?: '40h / Woche'; ?></p>
        <?php if (has_category()) : ?>
            <p>Kategorie: <?php the_category(', '); ?></p>
        <?php endif; ?>
    </div>
    <div class="job-content">
        <?php the_content(); ?>
    </div>
    <div class="job-contact">
        <h2>Interessiert?</h2>
        <p>Dann freuen wir uns auf Ihre Bewerbung!</p>
        <p>📧 <a href="mailto:info@heizungstechnik-kleber.de">info@heizungstechnik-kleber.de</a></p>
        <p>📞 <a href="tel:+49084669519630">(08466) 951 963 0</a></p>
    </div>
</div>

<?php get_footer(); ?>