<?php   //  Template name: Zoekresultaten
get_header();
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
    <h1>Zoekresultaten</h1>
    <?php

    echo "<p>Je hebt gezocht naar: " . get_search_query() . "</p>";

    if(have_posts()){
        while(have_posts()){
            the_post();
            echo "<h2>" . get_the_title() . "</h2>";
            the_excerpt();
            echo "<a href=\"".get_the_permalink()."\" >PERMALINK: " . get_the_title() . " &raquo;</a>";
        }
    } else {
        echo "Er zijn geen zoekresultaten gevonden";
    }
    ?>

    <?
    //  pagination
    $prev_link = get_previous_posts_link(__('&laquo; Vorige'));
    $next_link = get_next_posts_link(__('Volgende &raquo;'));
    // as suggested in comments
    if ($prev_link || $next_link) {
        echo "<ul class=\"navigation\">";
        if ($prev_link){
            echo "<li>".$prev_link ."</li>";
        }
        if ($next_link){
            echo "<li>".$next_link ."</li>";
        }
        echo "</ul>";
    }

    ?>
</div>

<?php get_footer(); ?>