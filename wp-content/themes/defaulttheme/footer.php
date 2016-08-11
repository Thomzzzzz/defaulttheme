<footer>
    <!--    footer content goes here... -->
    <?php
    if (function_exists('get_field')) {
        $sFooterContact = get_field('contactgegevens', 'option');
        if (!empty($sFooterContact)) {
            echo $sFooterContact;
        }
        if(function_exists('socialMediaLinks')) {
            echo socialMediaLinks();
        }
    }
    ?>
</footer>
<?php
if(function_exists('googleAnalytics')){
    echo googleAnalytics();
}
wp_footer();
?>
</body>
</html>