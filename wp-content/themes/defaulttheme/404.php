<?php get_header();
//  Breadcrumbs
if ( function_exists('yoast_breadcrumb') ) {
    $breadcrumbs = yoast_breadcrumb('','',false);
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
    <p>Misschien is de pagina verplaatst. Of de pagina bestaat niet meer. Of heel misschien heb je zelf per ongeluk een verkeerd adres ingetypt?.</p>
    <p>Wat het ook is, het is niet erg! Je kunt altijd naar <a href="<?php echo home_url(); ?>/">de homepage</a> en daar opnieuw te beginnen.</p>
    <p>Je kunt ook even proberen te zoeken:</p>
    <?php
        get_search_form();
    ?>
</div>

<?php get_footer(); ?>