<div id="sidebar">
 <?php if(is_category()): ?>
 <div id="side-cat">
 <h2 class="sidebar-title"><?php single_cat_title(); ?></h2>
 <ul>
  <?php
  $cat = get_the_category();
  $cat = $cat[0];
  $cat_id = $cat->cat_ID;
   $tags = get_terms('post_tag', 'hide_empty=1','child_of=$cat_id');
    foreach($tags as $value):
  ?>
  <li> <a href="<?php echo get_tag_link($value->term_taxonomy_id); ?>"> <?php echo $value->name; ?> <span class="post-count"><?php echo $value->count; ?></span> </a> </li>
  <?php endforeach; ?>
 </ul>
</div>
<?php else : ?>
<div id="side-cat">
 <?php dynamic_sidebar(); ?>
</div>
<?php endif; ?>
<div id="box-wrap">
 <div class="box-ad"><img src="http://placehold.it/300x250" width="300" height="250" alt="広告"></div>
 <div class="box-ad"><img src="http://placehold.it/300x250" width="300" height="250" alt="広告"></div>
 <div class="box-ad"><img src="http://placehold.it/300x250" width="300" height="250" alt="広告"></div>
 <div class="box-ad"><img src="http://placehold.it/300x250" width="300" height="250" alt="広告"></div>
</div>
</div>
<!--sidebar-->