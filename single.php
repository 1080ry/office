<?php get_header(); ?>

<div id="main">
<div class="box-wrap">
 <?php get_sidebar(); ?>
 <div id="contents">
  <?php if(have_posts()): while(have_posts()): the_post(); ?>
  <article id="single">
  <div class="box-entry">
   <header class="article-header">
    <?php
 $cat = get_the_category();
 $cat = $cat[0];
 $category= $cat->cat_name;
 $catslug = $cat->slug;
 ?>
    <div class="<?php echo $catslug; ?> box-cat">
     <p><?php echo $category ?></p>
     <span class="cat-arrow"></span> </div>
    <div class="box-data">
       <p><?php echo get_post_time('Y.m.d D'); ?></p>
    </div>
    <div class="box-tag">
     <?php the_tags('<ul><li>','</li><li>','</li></ul>');?>
    </div>
    <div class="box-sns">
     <?php
if(function_exists('display_social4i'))
echo display_social4i("large","float-left");
?>
    </div>
    <div class="box-title">
     <h1>
      <?php the_title(); ?>
     </h1>
    </div>
   </header>
   <div class="box-post">
    <?php the_content(''); ?>
   </div>
   <div class="box-sns">
    <?php
if(function_exists('display_social4i'))
echo display_social4i("large","float-right");
?>
   </div>
       </div>
   </article>
   <?php
$prevpost = get_adjacent_post(true, '', true); //前の記事
$nextpost = get_adjacent_post(true, '', false); //次の記事
if( $prevpost or $nextpost ){ //前の記事、次の記事いずれか存在しているとき
?>
   <div id="box_paging">
    <?php
 if ( $prevpost ) { //前の記事が存在しているとき
  echo '<div class="entry prev"><a href="' . get_permalink($prevpost->ID) . '"><div class="img_arrow"><img src="http://1080ry.com/wp-content/themes/DKR/img/single_prev.png" width="22" height="37" alt="前へ"></div><div><figure class="figure">' . get_the_post_thumbnail($prevpost->ID, array(60,60)) . '</figure><h1>' . get_the_title($prevpost->ID) . '</h1></div></a></div>';
 } else { //前の記事が存在しないとき
  echo '<div class="no-prev-post"><p>これより前の記事はありません</p></div>';
 }
 if ( $nextpost ) { //次の記事が存在しているとき
  echo '<div class="entry next"><a href="' . get_permalink($nextpost->ID) . '"><h1>' . get_the_title($nextpost->ID) . '</h1><div><figure class="figure">' . get_the_post_thumbnail($nextpost->ID, array(60,60)) . '</figure></div><div class="img_arrow"><img src="http://1080ry.com/wp-content/themes/DKR/img/single_next.png" width="22" height="37" alt="次へ"></div></a></div>';
 } else { //次の記事が存在しないとき
  echo '<div class="no-next-post"><p>最新の記事です</p></div>';
 }
?>
   </div>
   <?php } ?>
   <?php endwhile; endif; ?>
  </div>
  
 </div>
</div>
<div id="pagetop"></div>
<?php get_footer(); ?>
<?php wp_footer(); ?>
</body>
</html>
