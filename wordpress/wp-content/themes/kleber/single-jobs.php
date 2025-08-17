<?php
/**
 * Template for displaying single job posts.
 */
get_header();
?>

<div class="job-detail content">
    <h1><?php the_title(); ?></h1>
    <div class="job-meta">
        <p><strong>Startdatum:</strong> <?php echo get_post_meta(get_the_ID(), 'job_start_date', true) ?: 'Ab sofort'; ?></p>
        <p><strong>Stunden:</strong> <?php echo get_post_meta(get_the_ID(), 'job_hours', true) ?: '40h / Woche'; ?></p>
        <?php if (has_category()) : ?>
            <p><strong>Kategorie:</strong> <?php the_category(', '); ?></p>
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