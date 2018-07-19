</div>
<footer>
    <div class="container">
        <div class="codee">
            <span>[</span>code<span>e]</span> <?php echo date('Y') ?>
        </div>
    </div>
</footer>

<?php if ( is_detect_ie() ) : ?>
    <div class="is_detect_ie flex_center">
        <div class="is_detect_ie__inner">
            <div class="is_ie_info">
                <h4>Thanks for visiting our site!</h4>
                <p>Unfortunately, you are trying to reach it via Internet Explorer which <br> we highly don't recommend to use. Because it's far out of date.</p>
                <p>Please use one of the modern browsers to enjoy the Web.</p>
            </div>
            <div class="modern_browsers flex_start">
                <a class="browser_item" href="https://www.google.com/chrome/" target="_blank" rel="noopener">
                    <figure>
                        <img src="<?php echo theme('images/chrome.png'); ?>" alt="chrome">
                        <figcaption>Google Chrome</figcaption>
                    </figure>
                </a>
                <a class="browser_item" href="http://www.mozilla.org/firefox/new/" target="_blank" rel="noopener">
                    <figure>
                        <img src="<?php echo theme('images/firefox.png'); ?>" alt="firefox">
                        <figcaption>Mozilla Firefox</figcaption>
                    </figure>
                </a>
                <a class="browser_item" href="https://www.microsoft.com/en-us/windows/microsoft-edge" target="_blank" rel="noopener">
                    <figure>
                        <img src="<?php echo theme('images/edge.png'); ?>" alt="edge">
                        <figcaption>Microsoft Edge</figcaption>
                    </figure>
                </a>
                <a class="browser_item" href="https://www.apple.com/safari/" target="_blank" rel="noopener">
                    <figure>
                        <img src="<?php echo theme('images/safari.png'); ?>" alt="safari">
                        <figcaption>Apple Safari</figcaption>
                    </figure>
                </a>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
<?php if( @!WP_DEBUG) {	ob_end_flush(); } ?>
