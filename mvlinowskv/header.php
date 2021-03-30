<?php 
/*
 * @package WordPress
 * @subpackage mvlinowskv
 * @since mvlinowskv


 */
?>


<html>
<head>
<title>Tutorial theme</title>
<!-- <script type="text/javascript" src="<?php //echo get_stylesheet_directory_uri().'/js/jquery.js'; ?>">
</script>
<script type="text/javascript" src="<?php //echo get_stylesheet_directory_uri().'/js/jquery-ui.min.js'; ?>">
</script> -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-1.6.min.js"></script>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-te/1.4.0/jquery-te.css">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<?php wp_head(); ?>
</head>

<body>

<div id="main-header" class="site-header">
<h1 class="h1-main"><?php the_title(); ?></h1>
</div>
<div class="container">