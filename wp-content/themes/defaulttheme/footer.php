<footer>
    <!--    footer content goes here... -->
    <?php
        the_field('contactgegevens', 'option');
        echo socialMediaLinks();
    ?>
</footer>
<?php
    echo googleAnalytics();
?>
<?php wp_footer(); ?>
</body>
</html>
