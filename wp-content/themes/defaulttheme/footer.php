<footer>
    <!--    footer content goes here... -->
    <?php
    if (function_exists('get_field')) {
        $sFooterContact = get_field('contactgegevens', 'option');
        if (!empty($sFooterContact)) {
            echo $sFooterContact;
        }
        echo socialMediaLinks();
    }
    ?>
</footer>
<?php
echo googleAnalytics();
?>
<?php wp_footer(); ?>
</body>
</html>
