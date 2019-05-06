<?php
/*
Plugin Name: My Shortcode Plugin Ver.1.0
Plugin URI: https://neco913.kirara.st/post-3382/
Description: このShortcodeで新着記事を表示できます。
Version: 1.0
Author: FOUR 4to6
Author URI: http://four4to6.sblo.jp/
License: GPL2
*/

/*  Copyright 2019 FOUR 4to6 (email : four4to6@yahoo.co.jp)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*
 * PHPファイルを読み込む
 */
$hack_dir = trailingslashit(dirname(__FILE__)) . 'my_shortcode_file/';
opendir($hack_dir);
while(($ent = readdir()) !== false) {
  if(!is_dir($ent) && strtolower(substr($ent,-4)) == ".php") {
    include_once($hack_dir.$ent);
  }
}
closedir();

/*
 * スタイルを適切にエンキューする方法
 */
function short_php_scripts() {
	wp_enqueue_style( 'short_php_style', plugins_url('css/short_php_style.css', __FILE__ ),
	array(),
	filemtime( plugin_dir_path( __FILE__ ) . 'css/short_php_style.css' ) );
}
add_action( 'wp_enqueue_scripts', 'short_php_scripts' );

/**
 ** 管理画面に特定のスタイルを読み込む
 **/
function hoge_load_custom_wp_admin_style($hook) {
        // Load only on ?page=mypluginname
        if($hook != 'settings_page_my-unique-identifier') {
                return;
        }
        wp_enqueue_style( 'short_php_style', plugins_url('css/my_admin_style.css', __FILE__ ),
	array(),
	filemtime( plugin_dir_path( __FILE__ ) . 'css/my_admin_style.css' ) );
}
add_action( 'admin_enqueue_scripts', 'hoge_load_custom_wp_admin_style' );

/**
 * ダッシュボードにウィジェットを追加する。
 *
 * この関数は以下の 'wp_dashboard_setup' アクションにフックされています。
 */
function example_add_dashboard_widgets() {
	wp_add_dashboard_widget(
                 'example_dashboard_widget',         // Widget slug.
                 '4to6 Dashboard Widget',         // Title.
                 'example_dashboard_widget_function' // Display function.
        );	
}
add_action( 'wp_dashboard_setup', 'example_add_dashboard_widgets' );
/**
 * ダッシュボードウィジェットのコンテンツを出力する関数を作成する。
 */
function example_dashboard_widget_function() {
	// 表示したいものを出力する。
	echo "<div>【 新着記事表示 】</div>";
	echo "[numberpospin page_att='' order_att='' orderby_att='']";
}

/** 管理メニューの追加 ステップ2 */
add_action( 'admin_menu', 'my_plugin_menu' );

/** ステップ1 */
function my_plugin_menu() {
	add_options_page( 'My Plugin Options', 'FOUR 4to6 Plugin', 'manage_options', 'my-unique-identifier', 'my_plugin_options' );
}

/** ステップ3 */
function my_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	?>
<div class="my_admin_style">
<h2>パラメータを変更 (値を渡す)</h2>

<h3>投稿数 (page_att)</h3>
<h4>デフォルト値 5</h4>
<p>-1を使用するとすべての投稿を含めます。</p>
<h5>(このとき 'offset' パラメータは無視されます。)</h5>
<hr>

<h3>投稿の並び (order_att)</h3>
<p>昇順か降順かを指定します。</p>
<h4>デフォルトは 'DESC'(降順)です。</h4>
<ol>
<li>'ASC' - 最低から最高へ昇順 (1, 2, 3; a, b, c).</li>
<li>'DESC' - 最高から最低へ降順  (3, 2, 1; c, b, a).</li>
</ol>
<hr>

<h3>項目の値 (orderby_att)</h3>
<h4>デフォルト値  'date' - 日付で並び替える。('post_date' でも良い。)</h4>
<ol>
<li>'none' - 順序をつけない（<a aria-label=" (opens in a new tab)" href="https://wpdocs.osdn.jp/Version_2.8" target="_blank" rel="noreferrer noopener">バージョン 2.8</a> 以降で使用可能）。</li>
<li> 'ID' - 投稿 ID で並び替える。大文字に注意。</li>
<li> 'author' - 著者で並び替える。('post_author' でも良い。)</li>
<li> 'title' - タイトルで並び替える。('post_title' でも良い。)</li>
<li> 'name' - スラッグで並び替える。('post_name' でも良い。)</li>
<li> 'type' - 投稿タイプで並び替える。('post_type' でも良い。)</li>
<li> 'modified' - 更新日で並び替える。('post_modified' でも良い。)</li>
<li> 'parent' - 投稿/固定ページの親 ID 順。('post_parent' でも良い。)</li>
<li> 'rand' - ランダムで並び替える。'RAND(x)' も使えます（'x' はシードになる整数）。</li>
<li> 'comment_count' - コメント数で並び替える（<a aria-label=" (opens in a new tab)" href="https://wpdocs.osdn.jp/Version_2.9" target="_blank" rel="noreferrer noopener">バージョン 2.9</a> 以降で使用可能）。</li>
</ol>
<h5>get_posts() は <a href="https://wpdocs.osdn.jp/Class_Reference/WP_Query">WP_Query</a> クラスを利用して投稿を取得します。<br>
 この関数で使えるパラメータについては、<br>
 WP_Query ドキュメンテーションの<a href="https://wpdocs.osdn.jp/Class_Reference/WP_Query#Parameters">the parameters section</a> をごらんください。</h5>
<hr>

<h2>Example</h2>
<h4>デフォルトの書き方。</h4>
<pre class="my_admin_code">
<code>[numberpospin]</code>
</pre>
<h4>例えば、アルファベット順に昇順で8件を表示する。</h4>
<pre class="my_admin_code">
<code>[numberpospin page_att="8" order_att="ASC" orderby_att="title"]</code>
</pre>
</div>
        <?php
}
?>
