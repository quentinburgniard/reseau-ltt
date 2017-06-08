<?php
/**
 * @package Réseau_LTT
 */
?>
</div>
<footer id="menu-footer">
    <?php if( is_front_page() ) : ?>
    <nav id="footer-front-page"><!-- menu pour la page d'accueil  -->
        <?php else : ?>
        <nav id="footer-classic"><!-- menu classique -->
            <?php endif; ?>
            <ul>
                <li>
                    <a href="<?php echo site_url('/mentions-legales/'); ?>">Mentions légales</a>
                </li>
                <li>
                    <a href="<?php echo get_permalink(42); ?>">Partenaires</a>
                </li>
                <li>
                    <a href="<?php echo get_permalink(44); ?>">Nous contacter</a>
                </li>
            </ul>
        </nav>
</footer>
<?php wp_footer(); ?>
</body>
</html>
