    </div>
    <div class="footer">
        <div class="content">
            <div class="logo_rad"></div>
            <?php 
            $query = new WP_Query(array(
                'p' => 37,
                'post_type' => 'page'
            ));
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    the_title('<h2>', '</h2>');
                    the_content();
                }
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20489.13005673033!2d11.435434550328173!3d48.9343448172901!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479efe3fa6109133%3A0xeb8d2a347b1a1bae!2sKleber%20Rudolf%20Heizungstechnik!5e0!3m2!1sde!2sde!4v1726667694512!5m2!1sde!2sde"
            style="filter: invert(90%) hue-rotate(180deg); width: 100%; border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="emergency-bar">
        <div class="emergency-content">
            <p>24h Service</p>
            <p>
                <a href="tel:+4984669519630">
                <svg class="telephone-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path
                        d="M20.89 23.654c-7.367 3.367-18.802-18.86-11.601-22.615l2.107-1.039 3.492 6.817-2.083 1.026c-2.189 1.174 2.37 10.08 4.609 8.994.091-.041 2.057-1.007 2.064-1.011l3.522 6.795c-.008.004-1.989.978-2.11 1.033zm-9.438-2.264c-1.476 1.072-3.506 1.17-4.124.106-.47-.809-.311-1.728-.127-2.793.201-1.161.429-2.478-.295-3.71-1.219-2.076-3.897-1.983-5.906-.67l.956 1.463c.829-.542 1.784-.775 2.493-.609 1.653.388 1.151 2.526 1.03 3.229-.212 1.223-.45 2.61.337 3.968 1.243 2.143 4.579 2.076 6.836.316-.412-.407-.811-.843-1.2-1.3z"
                        style="fill:#ffffff" />
                </svg></a><a class="telephone" href="tel:+4984669519630">08466/951 963 0</a>
                <a href="tel:+4917664028824">
                <svg class="mobile-icon" width="24" height="24" viewBox="0 0 24 24">
                    <path
                        d="M16 0v3h-8c-1.104 0-2 .896-2 2v17c0 1.104.896 2 2 2h8c1.104 0 2-.896 2-2v-22h-2zm0 13h-8v-7h8v7z"
                        id="path1" style="fill:#ffffff" />
                </svg></a><a class="mobile" href="tel:+4917664028824">0176/64 02 88 24</a>
            </p>
        </div>
    </div>
    <?php wp_footer(); ?>
</body>

</html>