<?php //  Template name: Homepage
get_header(); ?>
    <div class="wrapper">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                the_title();
                the_content();
            }
        }
        ?>
    </div>
<?php get_footer();