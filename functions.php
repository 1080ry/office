<?php
//ウィジェット
//sidebarにclass名追加
register_sidebar(array(
  'name'=>'サイドバー',
  'before_widget'=>'<div class="sidebar-wrapper">',
  'after_widget'=>'</div>',
  'before_title' => '<h2 class="sidebar-title">',
  'after_title' => '</h2>'
));

//カテゴリーの投稿数をaタグの中に移動させる
add_filter( 'wp_list_categories', 'my_list_categories', 10, 2 );
function my_list_categories( $output, $args ) {
  $output = preg_replace('/<\/a>\s*\((\d+)\)/',' <span class="post-count">$1</span></a>',$output);
  return $output;
}

//受信したコメント
function mydesign($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>

<li class="compost">
<?php comment_text(); ?>
<p class="cominfo">
<?php comment_date(); ?> <?php comment_time(); ?>
 |
<?php comment_author_link(); ?>
</p>

<?php
}

//コメント欄のデフォルト文言削除
add_filter('comment_form_default_fields', 'mytheme_remove_url');
function mytheme_remove_url($arg) {
    $arg['url'] = '';
        $arg['email'] = '';
    return $arg;
}

add_filter( "comment_form_defaults", "my_comment_notes_before");
function my_comment_notes_before( $defaults){
    $defaults['comment_notes_before'] = '';
    return $defaults;
}

add_filter("comment_form_defaults","my_special_comment_after");
function my_special_comment_after($args){
    $args['comment_notes_after'] = '';
return $args;
}

//wp_head()不要タグ削除
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'feed_links_extra', 3);

//検索フォーム
function my_search_form( $form ) {

    $form = '
    <div class="search-box">
    <form role="search" method="get" id="searchform" action="'.home_url( '/' ).'" >
    <input type="text" value="' . get_search_query() . '" class="search-text" name="s" id="s" placeholder="キーワードを入力" >
    <div class="box-search-btn"> <span><i class="fa fa-search"></i></span>
   <input type="submit" id="searchbtn" value="検索" class="search-btn">
  </div></form></div>';
    return $form;
}
add_filter( 'get_search_form', 'my_search_form' );

//アイキャッチ
add_theme_support( 'post-thumbnails', array( 'post' ) );
set_post_thumbnail_size( 210, 140, true );
