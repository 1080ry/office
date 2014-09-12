<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>
<?php if ( is_home() || is_front_page() ) : ?>
<?php bloginfo('name'); ?>
<?php else : ?>
<?php the_title(); ?> | <?php bloginfo('name'); ?>
<?php endif; ?>
</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--CSS-->
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet">
<!--googlefont-->

<!-- font awesome -->
<link href="<?php bloginfo('template_url'); ?>/css/font-awesome.min.css" rel="stylesheet" >

<!-- favicon -->
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico">
<!--[if lt IE 9]>
<script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Jquery -->
<script src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
<?php wp_head()?>
</head>
<body>
<div id="wrapper">
<header>
 <nav>

 </nav>
</header>

<?php if ( !is_home() && !is_front_page() ) : ?>
<!--TOPページ以外でパンくずリストを表示する-->
<div class="breadcrumbs">
<ol>
 <?php
  if(function_exists('bcn_display'))
  { bcn_display();  }?>
</ol>
</div>
<?php endif; ?>
