<?php
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
        <h1>404: Pagina niet gevonden</h1>
        <p>De pagina die je zoekt, kan niet worden geopend.</p>
        <p>Ga terug naar <a href="<?php echo home_url(); ?>/">de homepage</a>.</p>
    </div>
<?php get_footer();