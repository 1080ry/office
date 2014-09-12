<?php get_header(); ?>
<?php if ( is_home() || is_front_page() ) : ?>
<div id="special-main">
 <div class="box-special"> <a class="btn" href="#"></a></div>
<?php else : ?>
<div id="main">
<?php endif; ?>
<div class="box-wrap">
  <?php get_sidebar(); ?>
  <div id="contents">
   <div id="entry-list">
    <?php if(is_category()): ?>
    <div class="main-cat">
     <h1>
      <?php single_cat_title(); ?>
      の記事一覧</h1>
    </div>
    <?php endif; ?>
    <?php if(is_month()): ?>
    <div class="">
     <h1><?php echo $year . '年' .$monthnum . '月の記事一覧'; ?></h1>
    </div>
    <?php endif; ?>
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
    <article class="entry"> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
     <div class="box-thumbnail">
      <?php if ( has_post_thumbnail()) : ?>
      <figure>
       <?php the_post_thumbnail( array(210,140)); ?>
       <?php endif; ?>
      </figure>
     </div>
     <div class="entry-title">
      <div class="box-timedate">
       <p><?php echo get_post_time('Y.m.d D'); ?></p>
      </div>
        <?php
 $cat = get_the_category();
 $cat = $cat[0];
 $category= $cat->cat_name;
 $catslug = $cat->slug;
 ?>
<div class="<?php echo $catslug; ?> box-cat">
<p><?php echo $category ?></p><span class="cat-arrow"></span>
      </div>
      <h1>
       <?php the_title(); ?>
      </h1>
<ul class="sns-count">
<li id="socialarea_facebook_<?php echo $post->ID;?>"><i class="fa fa-facebook"></i><span class="count"></span></li>
<li id="socialarea_twitter_<?php echo $post->ID;?>"><i class="fa fa-twitter"></i><span class="count"></span></li>
<li id="socialarea_hatebu_<?php echo $post->ID;?>">Ｂ!<span class="count"></span></li>
<script type="text/javascript">
$(function(){
get_social_count_facebook("<?php the_permalink(); ?>", "socialarea_facebook_<?php echo $post->ID;?>");
get_social_count_twitter("<?php the_permalink(); ?>", "socialarea_twitter_<?php echo $post->ID;?>");
get_social_count_hatebu("<?php the_permalink(); ?>", "socialarea_hatebu_<?php echo $post->ID;?>");
});
</script>
</ul>
      <div class="entry-arrow"><img src="http://1080ry.com/wp-content/themes/DKR/img/icon_arrow_l.png" width="18" height="17" alt="icon"></div>
     </div>
     </a> </article>
    <?php endwhile; endif; ?>
    <?php if(is_home()):?>
    <div id="index-paging">
     <p class="previous">
      <?php next_posts_link('&laquo; これより前の記事へ')?>
     </p>
     <p class="next">
      <?php previous_posts_link('&raquo; 次の記事')?>
     </p>
    </div>
    <?php endif; ?>
    <?php if(is_archive()): ?>
    <ul class="pager">
     <li  class="previous">
      <?php next_posts_link('&laquo; 前の記事')?>
     </li>
     <li  class="next">
      <?php previous_posts_link('&raquo; 次の記事')?>
     </li>
    </ul>
    <?php endif; ?>
   </div>
  </div>
 </div>
</div>
<div id="pagetop"></div>
<?php get_footer(); ?>
<?php wp_footer(); ?>
</body></html>