<!DOCTYPE html>
<?php header('X-Frame-Options: SAMEORIGIN'); ?>
<!--[if IE 9 ]> <html <?php language_attributes(); ?> class="ie9 <?php flatsome_html_classes(); ?>"> <![endif]-->
<!--[if IE 8 ]> <html <?php language_attributes(); ?> class="ie8 <?php flatsome_html_classes(); ?>"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="<?php flatsome_html_classes(); ?>"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'flatsome_after_body_open' ); ?>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'flatsome' ); ?></a>

<div id="wrapper">

	<?php do_action( 'flatsome_before_header' ); ?>

	<header class="sticky-top">
        <div class="gv-header-top">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="gv-header-text">
                            <p>Nemokamas pristatymas visoje lietuvoje užsakymams nuo 50€</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gv-header-mid">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="gv-header-warp">
                            <div class="gv-logo">
                                <a href="#"><img src="<?php echo get_theme_file_uri("assets/images/logo.png"); ?>" alt="logo"></a>
                            </div>
                            <div class="gv-search">
                                <form action="#">
                                    <div class="gv-s-icon">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </div>
                                    <input placeholder="Kokio produkto ieškote?" type="text">
                                </form>
                            </div>
                            <div class="gv-card">
                                <div class="gv-info">
                                    <a href="tel:+370 666 29977"><i class="fa-solid fa-phone"></i> +370 666 29977</a>
                                    <a href="mailto: name@email.com"><i class="fa-solid fa-envelope"></i> info@gaivuskvapas.lt</a>
                                </div>
                                <div class="gv-card-info">
                                    <a href="#"><i class="fa-solid fa-cart-shopping"></i> Krepšelis</a>
                                    <a href="#"><i class="fa-solid fa-circle-user"></i> Paskyra</a>
                                </div>
                                <div class="gv-mobile-card-info">
                                    <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                                    <a href="#"><i class="fa-solid fa-circle-user"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gv-header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="gb-header-wrap">
                            <div class="gv-hb-left">
                                <nav class="navbar navbar-expand-lg">
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                                            <i class="fa-solid fa-bars"></i>
                                          </a>
                                    </button>
                                    <div class="collapse navbar-collapse menu-menu" id="navbarSupportedContent">
                                        <ul class="navbar-nav me-auto">
                                            <li class="dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Naujausi produktai</a>
                                                <div class="dropdown-menu">
                                                    <ul>
                                                        <li><a class="dropdown-item" href="#">Visos prekės</a></li>
                                                        <li><a class="dropdown-item" href="#">Akcijos</a></li>
                                                        <li><a class="dropdown-item" href="#">Top prekės</a></li>
                                                        <li><a class="dropdown-item" href="#">Burnos skalavimo skysčiai</a></li>
                                                        <li><a class="dropdown-item" href="#">Dantų pastos</a></li>
                                                        <li><a class="dropdown-item" href="#">Priemonės vaikams</a></li>
                                                        <li><a class="dropdown-item" href="#">Kosmetika</a></li>
                                                        <li><a class="dropdown-item" href="#">DOVANŲ RINKINIAI</a></li>
                                                    </ul>
                                                    <ul>
                                                        <li><a class="dropdown-item" href="#">Pagal tikslą</a></li>
                                                        <li><a class="dropdown-item" href="#">Dantų balinimui</a></li>
                                                        <li><a class="dropdown-item" href="#">Kraujuojančioms</a></li>
                                                        <li><a class="dropdown-item" href="#">Tarpdančių</a></li>
                                                        <li><a class="dropdown-item" href="#">dantenoms</a></li>
                                                        <li><a class="dropdown-item" href="#">Jautriems dantims</a></li>
                                                        <li><a class="dropdown-item" href="#">Burnos irigatoriai</a></li>
                                                        <li><a class="dropdown-item" href="#">Tarpdančių siūlai</a></li>
                                                        <li><a class="dropdown-item" href="#">šepetėliai</a></li>
                                                    </ul>
                                                    <ul>
                                                        <li><a class="dropdown-item" href="#">Visos prekės</a></li>
                                                        <li><a class="dropdown-item" href="#">Akcijos</a></li>
                                                        <li><a class="dropdown-item" href="#">Top prekės</a></li>
                                                        <li><a class="dropdown-item" href="#">Burnos skalavimo skysčiai</a></li>
                                                        <li><a class="dropdown-item" href="#">Dantų pastos</a></li>
                                                        <li><a class="dropdown-item" href="#">Priemonės vaikams</a></li>
                                                        <li><a class="dropdown-item" href="#">Kosmetika</a></li>
                                                        <li><a class="dropdown-item" href="#">DOVANŲ RINKINIAI</a></li>
                                                    </ul>
                                                    <ul>
                                                        <li><a class="dropdown-item" href="#">Visos prekės</a></li>
                                                        <li><a class="dropdown-item" href="#">Akcijos</a></li>
                                                        <li><a class="dropdown-item" href="#">Top prekės</a></li>
                                                        <li><a class="dropdown-item" href="#">Burnos skalavimo skysčiai</a></li>
                                                        <li><a class="dropdown-item" href="#">Dantų pastos</a></li>
                                                        <li><a class="dropdown-item" href="#">Priemonės vaikams</a></li>
                                                        <li><a class="dropdown-item" href="#">Kosmetika</a></li>
                                                        <li><a class="dropdown-item" href="#">DOVANŲ RINKINIAI</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li><a class="active" aria-current="page" href="#">Parduotuvė</a></li>
                                            <li><a href="#">iŠPARDAVIMAS</a></li>                                            
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="gv-hb-right">
                                <div class="gv-choose-item">
                                    <select name="name">
                                        <option value="0">Informacija</option>
                                        <option value="1">Straipsniai</option>
                                        <option value="2">Pristatymas</option>
                                        <option value="3">Atsiliepimai</option>
                                        <option value="4">DUK</option>
                                        <option value="5">Apie mus</option>
                                        <option value="6">Kontaktai</option>
                                    </select>
                                </div>
                                <div class="gv-search">
                                    <form action="#">
                                        <div class="gv-s-icon">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </div>
                                        <input placeholder="Kokio produkto ieškote?" type="text">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Start -->
    <!-- Header Offcanvas Start -->
    <div class="offcanvas offcanvas-start main-menu-offcanvas" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <button type="button" class="text-reset ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="offcanvas-body">
            <nav class="navbar navbar-expand-lg">
                <div class="menu-menu">
                    <ul class="navbar-nav me-auto">
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Naujausi produktai</a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a class="dropdown-item" href="#">Visos prekės</a></li>
                                    <li><a class="dropdown-item" href="#">Akcijos</a></li>
                                    <li><a class="dropdown-item" href="#">Top prekės</a></li>
                                    <li><a class="dropdown-item" href="#">Burnos skalavimo skysčiai</a></li>
                                    <li><a class="dropdown-item" href="#">Dantų pastos</a></li>
                                    <li><a class="dropdown-item" href="#">Priemonės vaikams</a></li>
                                    <li><a class="dropdown-item" href="#">Kosmetika</a></li>
                                    <li><a class="dropdown-item" href="#">DOVANŲ RINKINIAI</a></li>
                                </ul>
                                <ul>
                                    <li><a class="dropdown-item" href="#">Pagal tikslą</a></li>
                                    <li><a class="dropdown-item" href="#">Dantų balinimui</a></li>
                                    <li><a class="dropdown-item" href="#">Kraujuojančioms</a></li>
                                    <li><a class="dropdown-item" href="#">Tarpdančių</a></li>
                                    <li><a class="dropdown-item" href="#">dantenoms</a></li>
                                    <li><a class="dropdown-item" href="#">Jautriems dantims</a></li>
                                    <li><a class="dropdown-item" href="#">Burnos irigatoriai</a></li>
                                    <li><a class="dropdown-item" href="#">Tarpdančių siūlai</a></li>
                                    <li><a class="dropdown-item" href="#">šepetėliai</a></li>
                                </ul>
                                <ul>
                                    <li><a class="dropdown-item" href="#">Visos prekės</a></li>
                                    <li><a class="dropdown-item" href="#">Akcijos</a></li>
                                    <li><a class="dropdown-item" href="#">Top prekės</a></li>
                                    <li><a class="dropdown-item" href="#">Burnos skalavimo skysčiai</a></li>
                                    <li><a class="dropdown-item" href="#">Dantų pastos</a></li>
                                    <li><a class="dropdown-item" href="#">Priemonės vaikams</a></li>
                                    <li><a class="dropdown-item" href="#">Kosmetika</a></li>
                                    <li><a class="dropdown-item" href="#">DOVANŲ RINKINIAI</a></li>
                                </ul>
                                <ul>
                                    <li><a class="dropdown-item" href="#">Visos prekės</a></li>
                                    <li><a class="dropdown-item" href="#">Akcijos</a></li>
                                    <li><a class="dropdown-item" href="#">Top prekės</a></li>
                                    <li><a class="dropdown-item" href="#">Burnos skalavimo skysčiai</a></li>
                                    <li><a class="dropdown-item" href="#">Dantų pastos</a></li>
                                    <li><a class="dropdown-item" href="#">Priemonės vaikams</a></li>
                                    <li><a class="dropdown-item" href="#">Kosmetika</a></li>
                                    <li><a class="dropdown-item" href="#">DOVANŲ RINKINIAI</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">Parduotuvė</a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a class="dropdown-item" href="#">Visos prekės</a></li>
                                    <li><a class="dropdown-item" href="#">Akcijos</a></li>
                                    <li><a class="dropdown-item" href="#">Top prekės</a></li>
                                    <li><a class="dropdown-item" href="#">Burnos skalavimo skysčiai</a></li>
                                    <li><a class="dropdown-item" href="#">Dantų pastos</a></li>
                                    <li><a class="dropdown-item" href="#">Priemonės vaikams</a></li>
                                    <li><a class="dropdown-item" href="#">Kosmetika</a></li>
                                    <li><a class="dropdown-item" href="#">DOVANŲ RINKINIAI</a></li>
                                </ul>
                                <ul>
                                    <li><a class="dropdown-item" href="#">Pagal tikslą</a></li>
                                    <li><a class="dropdown-item" href="#">Dantų balinimui</a></li>
                                    <li><a class="dropdown-item" href="#">Kraujuojančioms</a></li>
                                    <li><a class="dropdown-item" href="#">Tarpdančių</a></li>
                                    <li><a class="dropdown-item" href="#">dantenoms</a></li>
                                    <li><a class="dropdown-item" href="#">Jautriems dantims</a></li>
                                    <li><a class="dropdown-item" href="#">Burnos irigatoriai</a></li>
                                    <li><a class="dropdown-item" href="#">Tarpdančių siūlai</a></li>
                                    <li><a class="dropdown-item" href="#">šepetėliai</a></li>
                                </ul>
                                <ul>
                                    <li><a class="dropdown-item" href="#">Visos prekės</a></li>
                                    <li><a class="dropdown-item" href="#">Akcijos</a></li>
                                    <li><a class="dropdown-item" href="#">Top prekės</a></li>
                                    <li><a class="dropdown-item" href="#">Burnos skalavimo skysčiai</a></li>
                                    <li><a class="dropdown-item" href="#">Dantų pastos</a></li>
                                    <li><a class="dropdown-item" href="#">Priemonės vaikams</a></li>
                                    <li><a class="dropdown-item" href="#">Kosmetika</a></li>
                                    <li><a class="dropdown-item" href="#">DOVANŲ RINKINIAI</a></li>
                                </ul>
                                <ul>
                                    <li><a class="dropdown-item" href="#">Visos prekės</a></li>
                                    <li><a class="dropdown-item" href="#">Akcijos</a></li>
                                    <li><a class="dropdown-item" href="#">Top prekės</a></li>
                                    <li><a class="dropdown-item" href="#">Burnos skalavimo skysčiai</a></li>
                                    <li><a class="dropdown-item" href="#">Dantų pastos</a></li>
                                    <li><a class="dropdown-item" href="#">Priemonės vaikams</a></li>
                                    <li><a class="dropdown-item" href="#">Kosmetika</a></li>
                                    <li><a class="dropdown-item" href="#">DOVANŲ RINKINIAI</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="#">iŠPARDAVIMAS</a></li>                                            
                    </ul>
                </div>
            </nav>
            <div class="gv-info">
                <a href="tel:+370 666 29977"><i class="fa-solid fa-phone"></i> +370 666 29977</a>
                <a href="mailto: name@email.com"><i class="fa-solid fa-envelope"></i> info@gaivuskvapas.lt</a>
            </div>
        </div>
    </div>
     <!-- Header Offcanvas End -->

	<?php do_action( 'flatsome_after_header' ); ?>

	<main id="main" class="<?php flatsome_main_classes(); ?>">
