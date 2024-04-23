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
<?php wp_body_open(); 


$logo_width = get_theme_mod('logo_width', 200);
print_r($logo_width);
$logo_url = wp_get_attachment_image_url( $logo_width, 'full' );
?>

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'flatsome' ); ?></a>

<div id="wrapper">

<?php do_action( 'flatsome_before_header' ); ?>
<!-- Header Start -->
<header class="sticky-top gv-header">
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
             
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?><?php echo get_bloginfo( 'name' ) && get_bloginfo( 'description' ) ? ' - ' : ''; ?><?php bloginfo( 'description' ); ?>" rel="home">
                                <?php if(flatsome_option('site_logo')){
                                $logo_height = get_theme_mod('header_height',90);
                                $logo_width = get_theme_mod('logo_width', 200);
                                $site_title = esc_attr( get_bloginfo( 'name', 'display' ) );
                                if(get_theme_mod('site_logo_sticky')) echo '<img width="'.$logo_width.'" height="'.$logo_height.'" src="'.get_theme_mod('site_logo_sticky').'" class="header-logo-sticky" alt="'.$site_title.'"/>';
                                echo '<img width="'.$logo_width.'" height="'.$logo_height.'" src="'.flatsome_option('site_logo').'" class="header_logo header-logo" alt="'.$site_title.'"/>';
                                if(!get_theme_mod('site_logo_dark')) echo '<img  width="'.$logo_width.'" height="'.$logo_height.'" src="'.flatsome_option('site_logo').'" class="header-logo-dark" alt="'.$site_title.'"/>';
                                if(get_theme_mod('site_logo_dark')) echo '<img  width="'.$logo_width.'" height="'.$logo_height.'" src="'.get_theme_mod('site_logo_dark').'" class="header-logo-dark" alt="'.$site_title.'"/>';
                                } else {
                                bloginfo( 'name' );
                                }
                            ?>
                      
                            </a>
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
                                <a href="tel:+370 666 29977">
                                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1_374)">
                                            <path d="M15.669 11.9152L13.2718 9.51884C13.1673 9.41353 13.0429 9.33004 12.9058 9.27321C12.7688 9.21638 12.6218 9.18735 12.4734 9.1878H12.4722C12.1705 9.1878 11.8868 9.30587 11.6738 9.51884L10.0757 11.1164L5.28088 6.32313L6.87896 4.72556C7.31973 4.28493 7.31973 3.56749 6.87839 3.12686L4.48071 0.730502C4.37607 0.625399 4.25162 0.542076 4.11457 0.485352C3.97752 0.428627 3.83057 0.399627 3.68224 0.400029C3.37991 0.400029 3.09567 0.518095 2.88263 0.731632L0.484949 3.12855C0.412052 3.20086 -0.21972 3.88441 0.0803433 5.38651C0.434091 7.15412 1.91463 9.35162 4.48071 11.9169C8.15324 15.5882 10.4696 16.4006 11.8003 16.4006C12.7214 16.4006 13.1713 16.0114 13.2718 15.9108L15.669 13.5145C15.8826 13.3009 16.0007 13.0168 16.0001 12.7145C16.0001 12.4129 15.8826 12.1287 15.669 11.9152ZM12.4728 15.1115C12.457 15.1273 10.5464 16.382 5.27975 11.1175C-0.100486 5.73958 1.28625 3.92677 1.28399 3.92734L3.68167 1.52985L6.07935 3.92734L4.08176 5.9243C4.02923 5.97672 3.98756 6.03897 3.95913 6.10751C3.9307 6.17604 3.91607 6.2495 3.91607 6.3237C3.91607 6.39789 3.9307 6.47135 3.95913 6.53988C3.98756 6.60842 4.02923 6.67067 4.08176 6.72309L9.6756 12.3152C9.72803 12.3677 9.79031 12.4093 9.85886 12.4377C9.92741 12.4662 10.0009 12.4808 10.0751 12.4808C10.1493 12.4808 10.2228 12.4662 10.2914 12.4377C10.3599 12.4093 10.4222 12.3677 10.4746 12.3152L12.4722 10.3176L14.8699 12.7151L12.4728 15.1115Z" fill="#032E72"/>
                                        </g>
                                    <defs>
                                        <clipPath id="clip0_1_374">
                                            <rect width="16" height="16" fill="white" transform="translate(0 0.400024)"/>
                                        </clipPath>
                                    </defs>
                                    </svg> +370 666 29977
                                </a>
                                <a href="mailto: name@email.com"><svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14 14.2001H2C1.46957 14.2001 0.960859 13.9894 0.585786 13.6143C0.210714 13.2392 0 12.7305 0 12.2001V4.20007C0 3.66964 0.210714 3.16093 0.585786 2.78586C0.960859 2.41079 1.46957 2.20007 2 2.20007H14C14.5304 2.20007 15.0391 2.41079 15.4142 2.78586C15.7893 3.16093 16 3.66964 16 4.20007V12.2001C16 12.7305 15.7893 13.2392 15.4142 13.6143C15.0391 13.9894 14.5304 14.2001 14 14.2001ZM2 3.20007C1.73478 3.20007 1.48043 3.30543 1.29289 3.49297C1.10536 3.6805 1 3.93486 1 4.20007V12.2001C1 12.4653 1.10536 12.7196 1.29289 12.9072C1.48043 13.0947 1.73478 13.2001 2 13.2001H14C14.2652 13.2001 14.5196 13.0947 14.7071 12.9072C14.8946 12.7196 15 12.4653 15 12.2001V4.20007C15 3.93486 14.8946 3.6805 14.7071 3.49297C14.5196 3.30543 14.2652 3.20007 14 3.20007H2Z" fill="#032E72"/>
                                    <path d="M7.99999 9.20012C7.8879 9.20009 7.77908 9.16241 7.69099 9.09312L0.690985 3.59312C0.638136 3.55298 0.593806 3.50272 0.560581 3.44527C0.527356 3.38782 0.5059 3.32433 0.497464 3.2585C0.489028 3.19268 0.493781 3.12583 0.511446 3.06186C0.529111 2.99789 0.559334 2.93807 0.600353 2.8859C0.641373 2.83373 0.692367 2.79025 0.750364 2.75799C0.808361 2.72573 0.8722 2.70534 0.938159 2.69801C1.00412 2.69067 1.07088 2.69655 1.13454 2.71528C1.19821 2.73401 1.25751 2.76523 1.30899 2.80712L7.99999 8.06412L14.691 2.80712C14.7425 2.76523 14.8018 2.73401 14.8654 2.71528C14.9291 2.69655 14.9959 2.69067 15.0618 2.69801C15.1278 2.70534 15.1916 2.72573 15.2496 2.75799C15.3076 2.79025 15.3586 2.83373 15.3996 2.8859C15.4406 2.93807 15.4709 2.99789 15.4885 3.06186C15.5062 3.12583 15.5109 3.19268 15.5025 3.2585C15.4941 3.32433 15.4726 3.38782 15.4394 3.44527C15.4062 3.50272 15.3618 3.55298 15.309 3.59312L8.30899 9.09312C8.22089 9.16241 8.11207 9.20009 7.99999 9.20012Z" fill="#032E72"/>
                                    </svg>
                                    info@gaivuskvapas.lt
                                </a>
                            </div>
                            <div class="gv-card-info">
                                <a href="#">
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.2917 18.8466H7.74707L7.48147 17.7606H21.6975L24 7.72953L5.21809 5.47808L4.35763 0.455566H0V2.35304H2.75759L5.80386 18.8883C5.22685 18.9831 4.69303 19.2533 4.27495 19.6622C3.85688 20.071 3.57484 20.5987 3.46718 21.1734C3.35952 21.7482 3.43145 22.3421 3.6732 22.8746C3.91495 23.407 4.31479 23.8521 4.81837 24.1493C5.32195 24.4465 5.90483 24.5815 6.4878 24.5358C7.07076 24.4901 7.62551 24.266 8.07665 23.894C8.52779 23.522 8.85343 23.02 9.0093 22.4565C9.16517 21.8929 9.14371 21.2949 8.94784 20.744H17.615C17.4154 21.3122 17.4017 21.9292 17.5759 22.5057C17.7502 23.0822 18.1033 23.5883 18.5842 23.9509C19.0651 24.3134 19.6489 24.5136 20.2511 24.5224C20.8533 24.5313 21.4427 24.3483 21.934 24C22.4253 23.6517 22.7931 23.1561 22.9842 22.585C23.1752 22.0138 23.1796 21.3967 22.9968 20.8229C22.8139 20.2491 22.4532 19.7483 21.9669 19.393C21.4806 19.0377 20.8939 18.8464 20.2916 18.8466H20.2917ZM5.55244 7.4289L21.6783 9.36199L20.1861 15.8634H7.06464L5.55244 7.4289Z" fill="#032E72"/>
                                    </svg> Krepšelis</a>
                                <a href="#">
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 0.5C9.62663 0.5 7.30655 1.20379 5.33316 2.52236C3.35977 3.84094 1.8217 5.71509 0.913451 7.9078C0.00519937 10.1005 -0.232441 12.5133 0.230582 14.8411C0.693605 17.1689 1.83649 19.3071 3.51472 20.9853C5.19295 22.6635 7.33115 23.8064 9.65892 24.2694C11.9867 24.7324 14.3995 24.4948 16.5922 23.5866C18.7849 22.6783 20.6591 21.1402 21.9776 19.1668C23.2962 17.1935 24 14.8734 24 12.5C24 9.3174 22.7357 6.26516 20.4853 4.01472C18.2349 1.76428 15.1826 0.5 12 0.5ZM12 23C10.5311 22.9967 9.07931 22.6853 7.73832 22.0859C6.39734 21.4864 5.19704 20.6123 4.21501 19.52C4.84643 18.7175 5.75677 18.182 6.76501 18.02C7.41665 17.9126 8.06247 17.7724 8.70001 17.6C9.20148 17.5345 9.68265 17.3604 10.11 17.09C10.0939 16.705 9.95161 16.3361 9.70501 16.04C9.07024 15.5194 8.56214 14.8614 8.21912 14.1156C7.87609 13.3698 7.70713 12.5557 7.72501 11.735C7.62445 10.4906 8.01582 9.25628 8.8151 8.29716C9.61437 7.33803 10.7578 6.73051 12 6.605C13.2449 6.72684 14.3921 7.33279 15.1945 8.29233C15.9969 9.25186 16.3904 10.4882 16.29 11.735C16.3113 12.5584 16.1439 13.3757 15.8008 14.1245C15.4576 14.8733 14.9476 15.5336 14.31 16.055C14.0625 16.3447 13.9198 16.7093 13.905 17.09C14.3375 17.3295 14.8104 17.4871 15.3 17.555C15.9325 17.7084 16.5737 17.8236 17.22 17.9C17.7426 17.9594 18.248 18.1227 18.7065 18.3803C19.165 18.6379 19.5674 18.9846 19.89 19.4C18.9071 20.5274 17.6948 21.4318 16.334 22.0526C14.9733 22.6735 13.4957 22.9965 12 23Z" fill="#032E72"/>
                                    </svg>
                                    Paskyra
                                </a>
                            </div>
                            <div class="gv-mobile-card-info">
                                <a href="#">
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.2917 18.8466H7.74707L7.48147 17.7606H21.6975L24 7.72953L5.21809 5.47808L4.35763 0.455566H0V2.35304H2.75759L5.80386 18.8883C5.22685 18.9831 4.69303 19.2533 4.27495 19.6622C3.85688 20.071 3.57484 20.5987 3.46718 21.1734C3.35952 21.7482 3.43145 22.3421 3.6732 22.8746C3.91495 23.407 4.31479 23.8521 4.81837 24.1493C5.32195 24.4465 5.90483 24.5815 6.4878 24.5358C7.07076 24.4901 7.62551 24.266 8.07665 23.894C8.52779 23.522 8.85343 23.02 9.0093 22.4565C9.16517 21.8929 9.14371 21.2949 8.94784 20.744H17.615C17.4154 21.3122 17.4017 21.9292 17.5759 22.5057C17.7502 23.0822 18.1033 23.5883 18.5842 23.9509C19.0651 24.3134 19.6489 24.5136 20.2511 24.5224C20.8533 24.5313 21.4427 24.3483 21.934 24C22.4253 23.6517 22.7931 23.1561 22.9842 22.585C23.1752 22.0138 23.1796 21.3967 22.9968 20.8229C22.8139 20.2491 22.4532 19.7483 21.9669 19.393C21.4806 19.0377 20.8939 18.8464 20.2916 18.8466H20.2917ZM5.55244 7.4289L21.6783 9.36199L20.1861 15.8634H7.06464L5.55244 7.4289Z" fill="#032E72"/>
                                    </svg>
                                </a>
                                <a href="#">
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 0.5C9.62663 0.5 7.30655 1.20379 5.33316 2.52236C3.35977 3.84094 1.8217 5.71509 0.913451 7.9078C0.00519937 10.1005 -0.232441 12.5133 0.230582 14.8411C0.693605 17.1689 1.83649 19.3071 3.51472 20.9853C5.19295 22.6635 7.33115 23.8064 9.65892 24.2694C11.9867 24.7324 14.3995 24.4948 16.5922 23.5866C18.7849 22.6783 20.6591 21.1402 21.9776 19.1668C23.2962 17.1935 24 14.8734 24 12.5C24 9.3174 22.7357 6.26516 20.4853 4.01472C18.2349 1.76428 15.1826 0.5 12 0.5ZM12 23C10.5311 22.9967 9.07931 22.6853 7.73832 22.0859C6.39734 21.4864 5.19704 20.6123 4.21501 19.52C4.84643 18.7175 5.75677 18.182 6.76501 18.02C7.41665 17.9126 8.06247 17.7724 8.70001 17.6C9.20148 17.5345 9.68265 17.3604 10.11 17.09C10.0939 16.705 9.95161 16.3361 9.70501 16.04C9.07024 15.5194 8.56214 14.8614 8.21912 14.1156C7.87609 13.3698 7.70713 12.5557 7.72501 11.735C7.62445 10.4906 8.01582 9.25628 8.8151 8.29716C9.61437 7.33803 10.7578 6.73051 12 6.605C13.2449 6.72684 14.3921 7.33279 15.1945 8.29233C15.9969 9.25186 16.3904 10.4882 16.29 11.735C16.3113 12.5584 16.1439 13.3757 15.8008 14.1245C15.4576 14.8733 14.9476 15.5336 14.31 16.055C14.0625 16.3447 13.9198 16.7093 13.905 17.09C14.3375 17.3295 14.8104 17.4871 15.3 17.555C15.9325 17.7084 16.5737 17.8236 17.22 17.9C17.7426 17.9594 18.248 18.1227 18.7065 18.3803C19.165 18.6379 19.5674 18.9846 19.89 19.4C18.9071 20.5274 17.6948 21.4318 16.334 22.0526C14.9733 22.6735 13.4957 22.9965 12 23Z" fill="#032E72"/>
                                    </svg>
                                </a>
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
                                        <li>
                                            <a href="#">Naujausi produktai <i class="fa-solid fa-angle-down"></i></a>
                                            <div class="mega-menu mega-menu-item">
                                                <ul>
                                                    <li><a href="#">Visos prekės</a></li>
                                                    <li><a href="#">Akcijos</a></li>
                                                    <li><a href="#">Top prekės</a></li>
                                                    <li><a href="#">Burnos skalavimo skysčiai</a></li>
                                                    <li><a href="#">Dantų pastos</a></li>
                                                    <li><a href="#">Priemonės vaikams</a></li>
                                                    <li><a href="#">Kosmetika</a></li>
                                                    <li><a href="#">DOVANŲ RINKINIAI</a></li>
                                                </ul>
                                                <ul>
                                                    <li><a href="#">Pagal tikslą</a></li>
                                                    <li><a href="#">Dantų balinimui</a></li>
                                                    <li><a href="#">Kraujuojančioms</a></li>
                                                    <li><a href="#">Tarpdančių</a></li>
                                                    <li><a href="#">dantenoms</a></li>
                                                    <li><a href="#">Jautriems dantims</a></li>
                                                    <li><a href="#">Burnos irigatoriai</a></li>
                                                    <li><a href="#">Tarpdančių siūlai</a></li>
                                                    <li><a href="#">šepetėliai</a></li>
                                                </ul>
                                                <ul>
                                                    <li><a href="#">Visos prekės</a></li>
                                                    <li><a href="#">Akcijos</a></li>
                                                    <li><a href="#">Top prekės</a></li>
                                                    <li><a href="#">Burnos skalavimo skysčiai</a></li>
                                                    <li><a href="#">Dantų pastos</a></li>
                                                    <li><a href="#">Priemonės vaikams</a></li>
                                                    <li><a href="#">Kosmetika</a></li>
                                                    <li><a href="#">DOVANŲ RINKINIAI</a></li>
                                                </ul>
                                                <ul>
                                                    <li><a href="#">Visos prekės</a></li>
                                                    <li><a href="#">Akcijos</a></li>
                                                    <li><a href="#">Top prekės</a></li>
                                                    <li><a href="#">Burnos skalavimo skysčiai</a></li>
                                                    <li><a href="#">Dantų pastos</a></li>
                                                    <li><a href="#">Priemonės vaikams</a></li>
                                                    <li><a href="#">Kosmetika</a></li>
                                                    <li><a href="#">DOVANŲ RINKINIAI</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#">Parduotuvė <i class="fa-solid fa-angle-down"></i></a>
                                            <div class="mega-menu mega-menu-item">
                                                <ul>
                                                    <li><a href="#">Visos prekės</a></li>
                                                    <li><a href="#">Akcijos</a></li>
                                                    <li><a href="#">Top prekės</a></li>
                                                    <li><a href="#">Burnos skalavimo skysčiai</a></li>
                                                    <li><a href="#">Dantų pastos</a></li>
                                                    <li><a href="#">Priemonės vaikams</a></li>
                                                    <li><a href="#">Kosmetika</a></li>
                                                    <li><a href="#">DOVANŲ RINKINIAI</a></li>
                                                </ul>
                                                <ul>
                                                    <li><a href="#">Pagal tikslą</a></li>
                                                    <li><a href="#">Dantų balinimui</a></li>
                                                    <li><a href="#">Kraujuojančioms</a></li>
                                                    <li><a href="#">Tarpdančių</a></li>
                                                    <li><a href="#">dantenoms</a></li>
                                                    <li><a href="#">Jautriems dantims</a></li>
                                                    <li><a href="#">Burnos irigatoriai</a></li>
                                                    <li><a href="#">Tarpdančių siūlai</a></li>
                                                    <li><a href="#">šepetėliai</a></li>
                                                </ul>
                                                <ul>
                                                    <li><a href="#">Visos prekės</a></li>
                                                    <li><a href="#">Akcijos</a></li>
                                                    <li><a href="#">Top prekės</a></li>
                                                    <li><a href="#">Burnos skalavimo skysčiai</a></li>
                                                    <li><a href="#">Dantų pastos</a></li>
                                                    <li><a href="#">Priemonės vaikams</a></li>
                                                    <li><a href="#">Kosmetika</a></li>
                                                    <li><a href="#">DOVANŲ RINKINIAI</a></li>
                                                </ul>
                                                <ul>
                                                    <li><a href="#">Visos prekės</a></li>
                                                    <li><a href="#">Akcijos</a></li>
                                                    <li><a href="#">Top prekės</a></li>
                                                    <li><a href="#">Burnos skalavimo skysčiai</a></li>
                                                    <li><a href="#">Dantų pastos</a></li>
                                                    <li><a href="#">Priemonės vaikams</a></li>
                                                    <li><a href="#">Kosmetika</a></li>
                                                    <li><a href="#">DOVANŲ RINKINIAI</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#">iŠPARDAVIMAS <i class="fa-solid fa-angle-down"></i></a>
                                            <div class="mega-menu mega-menu-item">
                                                <ul>
                                                    <li><a href="#">Visos prekės</a></li>
                                                    <li><a href="#">Akcijos</a></li>
                                                    <li><a href="#">Top prekės</a></li>
                                                    <li><a href="#">Burnos skalavimo skysčiai</a></li>
                                                    <li><a href="#">Dantų pastos</a></li>
                                                    <li><a href="#">Priemonės vaikams</a></li>
                                                    <li><a href="#">Kosmetika</a></li>
                                                    <li><a href="#">DOVANŲ RINKINIAI</a></li>
                                                </ul>
                                                <ul>
                                                    <li><a href="#">Pagal tikslą</a></li>
                                                    <li><a href="#">Dantų balinimui</a></li>
                                                    <li><a href="#">Kraujuojančioms</a></li>
                                                    <li><a href="#">Tarpdančių</a></li>
                                                    <li><a href="#">dantenoms</a></li>
                                                    <li><a href="#">Jautriems dantims</a></li>
                                                    <li><a href="#">Burnos irigatoriai</a></li>
                                                    <li><a href="#">Tarpdančių siūlai</a></li>
                                                    <li><a href="#">šepetėliai</a></li>
                                                </ul>
                                                <ul>
                                                    <li><a href="#">Visos prekės</a></li>
                                                    <li><a href="#">Akcijos</a></li>
                                                    <li><a href="#">Top prekės</a></li>
                                                    <li><a href="#">Burnos skalavimo skysčiai</a></li>
                                                    <li><a href="#">Dantų pastos</a></li>
                                                    <li><a href="#">Priemonės vaikams</a></li>
                                                    <li><a href="#">Kosmetika</a></li>
                                                    <li><a href="#">DOVANŲ RINKINIAI</a></li>
                                                </ul>
                                                <ul>
                                                    <li><a href="#">Visos prekės</a></li>
                                                    <li><a href="#">Akcijos</a></li>
                                                    <li><a href="#">Top prekės</a></li>
                                                    <li><a href="#">Burnos skalavimo skysčiai</a></li>
                                                    <li><a href="#">Dantų pastos</a></li>
                                                    <li><a href="#">Priemonės vaikams</a></li>
                                                    <li><a href="#">Kosmetika</a></li>
                                                    <li><a href="#">DOVANŲ RINKINIAI</a></li>
                                                </ul>
                                            </div>
                                        </li>                                            
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="gv-hb-right">
                            <div class="gv-choose-item">
                                <div class="gv-dropdown-container">
                                    <div class="gv-dropdown-toggle click-dropdown">Informacija <i class="fa-solid fa-angle-down"></i></div>
                                    <div class="gv-dropdown-menu">
                                        <ul>
                                            <li><a href="#">Straipsniai</a></li>
                                            <li><a href="#">Pristatymas</a></li>
                                            <li><a href="#">Atsiliepimai</a></li>
                                            <li><a href="#"> DUK</a></li>
                                            <li><a href="#">Apie mus</a></li>
                                            <li><a href="#">Kontaktai</a></li>
                                        </ul>
                                    </div>
                                </div>
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
        <button type="button" class="text-reset ms-auto" data-bs-dismiss="offcanvas" aria-label="Close">
            <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 26L4.57143 22.4286L8.14286 18.8571L11.7143 15.2857L15.2857 11.7143L18.8571 8.14286L22.4286 4.57143L26 1M1 1L4.57143 4.57143L8.14286 8.14286L11.7143 11.7143L15.2857 15.2857L18.8571 18.8571L22.4286 22.4286L26 26" stroke="#E3D9D9" stroke-width="2" stroke-linecap="round"/>
            </svg>
        </button>
    </div>
    <div class="offcanvas-body">
        <nav class="navbar navbar-expand-lg">
            <div class="main-menu">
                <ul class="navbar-nav me-auto">
                    <li>
                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Naujausi produktai <i class="fa-solid fa-angle-down"></i></a>
                        <div class="dropdown-menu sub-menu">
                            <ul>
                                <li><a href="#">Visos prekės</a></li>
                                <li><a href="#">Akcijos</a></li>
                                <li><a href="#">Top prekės</a></li>
                                <li><a href="#">Burnos skalavimo skysčiai</a></li>
                                <li><a href="#">Dantų pastos</a></li>
                                <li><a href="#">Priemonės vaikams</a></li>
                                <li><a href="#">Kosmetika</a></li>
                                <li><a href="#">DOVANŲ RINKINIAI</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Pagal tikslą</a></li>
                                <li><a href="#">Dantų balinimui</a></li>
                                <li><a href="#">Kraujuojančioms</a></li>
                                <li><a href="#">Tarpdančių</a></li>
                                <li><a href="#">dantenoms</a></li>
                                <li><a href="#">Jautriems dantims</a></li>
                                <li><a href="#">Burnos irigatoriai</a></li>
                                <li><a href="#">Tarpdančių siūlai</a></li>
                                <li><a href="#">šepetėliai</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Visos prekės</a></li>
                                <li><a href="#">Akcijos</a></li>
                                <li><a href="#">Top prekės</a></li>
                                <li><a href="#">Burnos skalavimo skysčiai</a></li>
                                <li><a href="#">Dantų pastos</a></li>
                                <li><a href="#">Priemonės vaikams</a></li>
                                <li><a href="#">Kosmetika</a></li>
                                <li><a href="#">DOVANŲ RINKINIAI</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Visos prekės</a></li>
                                <li><a href="#">Akcijos</a></li>
                                <li><a href="#">Top prekės</a></li>
                                <li><a href="#">Burnos skalavimo skysčiai</a></li>
                                <li><a href="#">Dantų pastos</a></li>
                                <li><a href="#">Priemonės vaikams</a></li>
                                <li><a href="#">Kosmetika</a></li>
                                <li><a href="#">DOVANŲ RINKINIAI</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">Parduotuvė <i class="fa-solid fa-angle-down"></i></a>
                        <div class="dropdown-menu sub-menu">
                            <ul>
                                <li><a href="#">Visos prekės</a></li>
                                <li><a href="#">Akcijos</a></li>
                                <li><a href="#">Top prekės</a></li>
                                <li><a href="#">Burnos skalavimo skysčiai</a></li>
                                <li><a href="#">Dantų pastos</a></li>
                                <li><a href="#">Priemonės vaikams</a></li>
                                <li><a href="#">Kosmetika</a></li>
                                <li><a href="#">DOVANŲ RINKINIAI</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Pagal tikslą</a></li>
                                <li><a href="#">Dantų balinimui</a></li>
                                <li><a href="#">Kraujuojančioms</a></li>
                                <li><a href="#">Tarpdančių</a></li>
                                <li><a href="#">dantenoms</a></li>
                                <li><a href="#">Jautriems dantims</a></li>
                                <li><a href="#">Burnos irigatoriai</a></li>
                                <li><a href="#">Tarpdančių siūlai</a></li>
                                <li><a href="#">šepetėliai</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Visos prekės</a></li>
                                <li><a href="#">Akcijos</a></li>
                                <li><a href="#">Top prekės</a></li>
                                <li><a href="#">Burnos skalavimo skysčiai</a></li>
                                <li><a href="#">Dantų pastos</a></li>
                                <li><a href="#">Priemonės vaikams</a></li>
                                <li><a href="#">Kosmetika</a></li>
                                <li><a href="#">DOVANŲ RINKINIAI</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Visos prekės</a></li>
                                <li><a href="#">Akcijos</a></li>
                                <li><a href="#">Top prekės</a></li>
                                <li><a href="#">Burnos skalavimo skysčiai</a></li>
                                <li><a href="#">Dantų pastos</a></li>
                                <li><a href="#">Priemonės vaikams</a></li>
                                <li><a href="#">Kosmetika</a></li>
                                <li><a href="#">DOVANŲ RINKINIAI</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Naujausi produktai <i class="fa-solid fa-angle-down"></i></a>
                        <div class="dropdown-menu sub-menu">
                            <ul>
                                <li><a href="#">Visos prekės</a></li>
                                <li><a href="#">Akcijos</a></li>
                                <li><a href="#">Top prekės</a></li>
                                <li><a href="#">Burnos skalavimo skysčiai</a></li>
                                <li><a href="#">Dantų pastos</a></li>
                                <li><a href="#">Priemonės vaikams</a></li>
                                <li><a href="#">Kosmetika</a></li>
                                <li><a href="#">DOVANŲ RINKINIAI</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Pagal tikslą</a></li>
                                <li><a href="#">Dantų balinimui</a></li>
                                <li><a href="#">Kraujuojančioms</a></li>
                                <li><a href="#">Tarpdančių</a></li>
                                <li><a href="#">dantenoms</a></li>
                                <li><a href="#">Jautriems dantims</a></li>
                                <li><a href="#">Burnos irigatoriai</a></li>
                                <li><a href="#">Tarpdančių siūlai</a></li>
                                <li><a href="#">šepetėliai</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Visos prekės</a></li>
                                <li><a href="#">Akcijos</a></li>
                                <li><a href="#">Top prekės</a></li>
                                <li><a href="#">Burnos skalavimo skysčiai</a></li>
                                <li><a href="#">Dantų pastos</a></li>
                                <li><a href="#">Priemonės vaikams</a></li>
                                <li><a href="#">Kosmetika</a></li>
                                <li><a href="#">DOVANŲ RINKINIAI</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Visos prekės</a></li>
                                <li><a href="#">Akcijos</a></li>
                                <li><a href="#">Top prekės</a></li>
                                <li><a href="#">Burnos skalavimo skysčiai</a></li>
                                <li><a href="#">Dantų pastos</a></li>
                                <li><a href="#">Priemonės vaikams</a></li>
                                <li><a href="#">Kosmetika</a></li>
                                <li><a href="#">DOVANŲ RINKINIAI</a></li>
                            </ul>
                        </div>
                    </li>                                            
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