</div>
<footer>
    <div class="container">
        <div class="codee">
            <span>[</span>codee<span>]</span> <?php echo date('Y') ?>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
<?php if( @!WP_DEBUG) {	ob_end_flush(); } ?>
