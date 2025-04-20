<?php
/* 
Template Name: Startseite
*/
get_header(); ?>

<div class="stage content team"></div>
<div class="stage content first-page">
    <div class="entry-content">
        <?php while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
        <h2>Aktuelle Stellenangebote</h2>
        <div class="jobs">
            <div class="job">
                <p>Ab sofort</p>
                <p><a href="#">Heizungsbaumeister/in in Teilzeit</a></p>
                <p>bis 20h / Woche</p>
            </div>
            <div class="job">
                <p>Ab sofort</p>
                <p><a href="#">Teamassistenz</a></p>
                <p>40h / Woche</p>
            </div>
            <div class="job">
                <p>Ab sofort</p>
                <p><a href="#">Heizungsmonteur/in in Vollzeit</a></p>
                <p>40h / Woche</p>
            </div>
        </div>
        <a href="#">&raquo; Zu weiteren Stellenangeboten</a>
    </div>
</div>
<div class="stage content-container services">
    <div class="heizung"><span>Heizung</span></div>
    <div class="klima"><span>Klima</span></div>
    <div class="sanitaer"><span>Sanitär</span></div>
    <div class="solar"><span>Solaranlagen</span></div>
    <div class="medizin"><span>Medizinischer Bereich</span></div>
    <div class="wartungen"><span>Wartungen</span></div>
</div>

<?php get_footer(); ?>