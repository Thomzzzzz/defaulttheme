<?php //    Template name: Contactpagina
get_header();
//  Breadcrumbs
if (function_exists('yoast_breadcrumb')) {
    $breadcrumbs = yoast_breadcrumb('', '', false);
}
?>
    <div class="breadcrumbs">
        <div class="wrapper">
            <?php echo $breadcrumbs; ?>
        </div>
    </div>
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