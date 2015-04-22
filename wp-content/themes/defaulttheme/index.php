<?php   //  Template name: Homepage
get_header(); ?>
<div class="wrapper">
<?php
    if(have_posts()){
        while(have_posts()){
            the_post();
            echo "<h1>" . the_title() . "</h1>";
            the_content();
        }
    }
?>

    <a href="nus">eiurhgiuerhguiehrg</a>
    
</div>
<?php get_footer(); ?>