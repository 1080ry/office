<? php
/**
 Template Name:固定ページ用
**/
?>
<?php get_header(); ?>

<div id="main">
<div class="box-wrap">
 <?php get_sidebar(); ?>
 <div id="contents">
  <div class="main-section">
   <?php if(have_posts()): while(have_posts()): the_post(); ?>
   <article id="page">
    <div class="box-title">
     <h1>
      <?php the_title(); ?>
     </h1>
    </div>
    <div class="box-post">
     <?php the_content(); ?>
    </div>
   </article>
   <?php endwhile; endif; ?>
  </div>
 </div>
</div>
<div id="pagetop"></div>
<?php get_footer(); ?>
<?php wp_footer(); ?>
</body>
</html>
