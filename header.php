<?php
/**
 * @package Réseau_LTT
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>
<header id="menu-header">
    <nav>
        <div id="logo">
            <a href="<?php echo site_url(); ?>"><img src="<?php echo esc_url(  get_template_directory_uri().'/img/logo-ltt.png'); ?>" class="logo"></a>
        </div><!-- #logo -->
        <ul id="header-ul">
            <li class="header-li">
                <a href="<?php echo site_url(); ?>">Accueil</a>
            </li>


            <li class="header-li">
                <a href="<?php echo site_url('/actualites/'); ?>">Actualités</a>
            </li>

            <li class="header-li">
                <a href="<?php echo site_url('/qui-sommes-nous/'); ?>">Qui sommes nous ?</a>
            </li>

            <li class="header-li">
                <a href="<?php echo site_url('/annuaire/'); ?>">Annuaire</a>
            </li>

            <li class="header-li">
                <a href="<?php echo site_url('/partenaires/'); ?>">Partenaires</a>
            </li>

            <li class="header-li">
                <a href="<?php echo site_url('/contact/'); ?>">Contact</a>
            </li>
        </ul>
    </nav>

    <a id="hamburger">
        <span></span>
        <span></span>
        <span></span>
    </a>

    <div id="overlay"></div>

    <div class="horizontal-line"></div>

</header>
<div id="wrap-content">