<?php get_header(); ?>

<div class="wrapper">

    <?php
        if(have_posts()){
            while(have_posts()){
                the_post();
            }
        }
    ?>

</div>

<?php get_footer(); ?>