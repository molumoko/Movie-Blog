<!DOCTYPE html>
<html <?php language_attributes(); //html要素のlang属性を出力 ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); //文字エンコーディング情報を出力 ?>">
  <title><?php wp_title( '|', true, 'right' ); //ページタイトルを出力 ?><?php bloginfo('name'); //サイト名を表示 ?></title>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); //使用中テーマディレクトリのURLを出力 ?>/css/normalize.css">
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); //使用中テーマのスタイルシートURLを出力 ?>">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); //ピングバックURLを出力 ?>">
  <?php wp_head(); //wp_headはテーマの</head>タグ直前に必ず挿入します ?>
</head>
<body>
    <header>
      <h2 >映画好きが集まるサークル</H2>
      <h1>CINEMA BLOG</h1>
        <nav>
            <ul>
                <li><a href="#">TOP</a></li>
                <li><a href="#">ABOUT</a></li>
                <li><a href="#">MAP</a></li>
                <li><a href="#">BLOG</a></li>
                <li><a href="#">CONTACT</a></li>
                <li><a href="#">LOGIN</a></li>
            </ul>
        </nav>
    </header>
    <div id="cover">
        <div id="slide">
            <img src="images/slide-1.png" alt="Welcome to our website!">
        </div>
    </div><!-- div#cover-->
