4to6-Shortcode-Plugin
===
4to6-Shortcode-Plugin は、  
WordPress 用の  
 Shortcode example です。

## Description
このShortcodeで新着記事を表示できます。 

```html
[numberpospin page_att='5' order_att='DESC' orderby_att='date']
```

パラメータを変更 (値を渡す)など  
詳しい設定は、  
WordPress管理ダッシュボードの  
[**設定**] > [**FOUR 4to6 Plugin**]を  
参照してください。

##### note :  [ウィジェット内でのショートコード](wpdocs.osdn.jp/ショートコード#.E3.82.A6.E3.82.A3.E3.82.B8.E3.82.A7.E3.83.83.E3.83.88.E5.86.85.E3.81.A7.E3.81.AE.E3.82.B7.E3.83.A7.E3.83.BC.E3.83.88.E3.82.B3.E3.83.BC.E3.83.89)

 デフォルトでは、  
WordPress は[サイドバーのウィジェット](http://wpdocs.osdn.jp/WordPress_Widgets)内で  
ショートコードをサポートしません。  
投稿、固定ページ、カスタム投稿タイプの本文の中でのみショートコードを展開します。  
サイドバーのウィジェットにもショートコードをサポートさせるには、  
以下のコードを使用します。

```php
add_filter( 'widget_text', 'shortcode_unautop' );
add_filter( 'widget_text', 'do_shortcode' );
```
 **N.B.** 上記の行は、この順序で追加することが重要です。  
1行目は WordPress が改行を段落タグへ変換するのを止めさせます。  
そうすることでショートコードは正しく働きます。  
2行目は実際にショートコードを動作させます。

##  Usage

WordPress plug-inとしてインストールしてください。  
dashboardからのインストールか、ファイルをuploadして  
インストールして頂く事で、ショートコードとしてお使い頂けます。

## Install
4to6-Block-Examples-master.zip をdownloadしたら  
以下に従いplug-inとしてインストールして下さい。

1. WordPress管理ダッシュボードの [ **プラグイン** ] > [ **新規追加** ] から  
[ **プラグインを追加** ] に移動します。
1. ページ上部の [ **プラグインのアップロード** ] をクリックします。
1. [ **参照...** ] をクリックし、ダウンロードしたzipファイルを見つけてアップロードします。
1. プラグインのインストールが完了したら、[ **有効にする** ] をクリックします。
1. You’re done!

## Licence
License : GPL2

License URI : [https://www.gnu.org/licenses/gpl-2.0.txt](https://www.gnu.org/licenses/gpl-2.0.txt)   

GNU Public License : [https://wordpress.org/about/license/](https://wordpress.org/about/license/) 

## Author

Customized it : [FOUR 4to6](https://github.com/four4to6)

## References
- **プラグインの作成**
  - [https://wpdocs.osdn.jp/プラグインの作成](https://wpdocs.osdn.jp/プラグインの作成)
  - [https://www.nxworld.net/wordpress/wp-create-plugins.html](https://www.nxworld.net/wordpress/wp-create-plugins.html)
- **管理メニューの追加**
  - [http://wpdocs.osdn.jp/管理メニューの追加](http://wpdocs.osdn.jp/管理メニューの追加)
- **ダッシュボードウィジェット API**
  - [http://wpdocs.osdn.jp/ダッシュボードウィジェット_API](http://wpdocs.osdn.jp/ダッシュボードウィジェット_API)
- **ショートコード API**
  - [https://wpdocs.osdn.jp/ショートコード_API](https://wpdocs.osdn.jp/ショートコード_API)
- **関数リファレンス/add menu page**
  - [http://wpdocs.osdn.jp/関数リファレンス/add_menu_page](http://wpdocs.osdn.jp/関数リファレンス/add_menu_page)
- **関数リファレンス/wp enqueue style**
  - [https://wpdocs.osdn.jp/関数リファレンス/wp_enqueue_style](https://wpdocs.osdn.jp/関数リファレンス/wp_enqueue_style)
  - [elementa.net/technopolis/wordpress/post-869/](elementa.net/technopolis/wordpress/post-869/)
- **関数リファレンス/add shortcode**
  - [http://wpdocs.osdn.jp/関数リファレンス/add_shortcode](http://wpdocs.osdn.jp/関数リファレンス/add_shortcode)
- **関数リファレンス/shortcode atts**
  - [http://wpdocs.osdn.jp/関数リファレンス/shortcode_atts](http://wpdocs.osdn.jp/関数リファレンス/shortcode_atts)
- **関数リファレンス/WP Query**
  - [https://wpdocs.osdn.jp/関数リファレンス/WP_Query](https://wpdocs.osdn.jp/関数リファレンス/WP_Query)
- **テンプレートタグ/get posts**
  - [https://wpdocs.osdn.jp/テンプレートタグ/get_posts](https://wpdocs.osdn.jp/テンプレートタグ/get_posts)
- **README.md**
  - [https://deeeet.com/writing/2014/07/31/readme/](https://deeeet.com/writing/2014/07/31/readme/)
- **GitHub Flavored Markdown**
  - [https://guides.github.com/features/mastering-markdown/](https://guides.github.com/features/mastering-markdown/)
  - [https://help.github.com/articles/basic-writing-and-formatting-syntax/](https://help.github.com/articles/basic-writing-and-formatting-syntax/)

