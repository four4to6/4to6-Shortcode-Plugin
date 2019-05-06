<?php
function my_shortcode_pin( $atts ) {
    $att = shortcode_atts( array(
        'page_att' => '5',
        'order_att' => 'DESC',
        'orderby_att' => 'date',
    ), $atts,'numberpospin');
ob_start();
?>
<?php
$id = get_the_ID();
?>
<?php
$args = array( 'exclude' => $id, 'posts_per_page' => $att['page_att'], 'order'=> $att['order_att'], 'post_type' => 'post', 'orderby' => $att['orderby_att'], );
$postslist = get_posts( $args );
?>
<?php if( $postslist ): ?>
<?php
foreach ($postslist as $post) : setup_postdata($post);
?>
<dl class="dl_style">
    <dt class="dt_thumbnail"><?php echo get_the_post_thumbnail( $post, array( 50, 50 )); ?></dt>
    <dt class="dt_style"><?php echo date( 'Y-m-d', strtotime($post->post_date) ); ?> 
          | <a class="dt_a_style" href="<?php the_permalink($post);?>">
            <?php echo wp_trim_words( get_the_title($post), 20, '...' ); ?></a>
    </dt>
    <dd class="dd_style"><?php echo mb_substr(get_the_excerpt(), 17, 35); ?>
        …<a href="<?php the_permalink($post);?>">続きを読む</a>
    </dd>
</dl>
<?php endforeach; 
wp_reset_postdata(); ?>
<?php else: ?>
<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<?php
	return ob_get_clean();
}
add_shortcode('numberpospin', 'my_shortcode_pin');
?>
<?php
/* 
'numberposts' または 'posts_per_page' のいずれかが利用できます。

order (文字列 | 配列) - 'orderby' パラメータについて昇順か降順かを指定します。

'DESC' - 最高から最低へ降順 (3, 2, 1; c, b, a).

post_type (文字列 / 配列) - 投稿を[投稿タイプ]によって取得する。

'post' - 投稿。
'page' - 固定ページ。
'revision' - 履歴 (リビジョン) 。
'attachment' - 添付ファイル。
nav_menu_item' - ナビゲーションメニュー項目。
'any' - リビジョンと 'exclude_from_search' が true にセットされたものを除き、すべてのタイプを含める。
カスタム投稿タイプ (例えば movies)

'orderby'
（文字列） （オプション） 取得した投稿をソートする。
 2つ以上のオプションを含めることもできます。
 デフォルトは 'date' (post_date) です。 

'comment_count' - コメント数で並び替える（バージョン 2.9 以降で使用可能）。

get_posts() は 'sort_order' の代わりに 'order' パラメータを使います。

mb_substr(対象の文字列, 取り出し開始位置, 取り出す文字数);

wp_reset_postdata(); ページ送り関数

strtotime() - 指定した日時のUNIX TIMESTAMPを取得するための関数

wp trim words -vWordPress内にて長い文字列を省略して表示するための関数

exclude - 取得したくない投稿情報ID（複数指定する場合は,で区切る）

get_the_post_thumbnail - アイキャッチ画像(サムネイル)を取得する。

ob_start - 出力のバッファリングを有効にする。

add shortcode - ショートコードタグ用のフックを追加します。

shortcode_atts - ショートコードの無効な属性値を除外する。
*/
?>
