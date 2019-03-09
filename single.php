
<?php get_header(); //header.phpを取得 ?>
  <div id="content" class="clearfix">
    <aside>
        <?php get_sidebar(); //side_bar.phpを取得　?>
    </aside>
    <article>
      
    <?php if ( have_posts() ): //条件分岐：投稿があるなら ?>
      <?php while ( have_posts() ) : the_post();//繰り返し処理開始 ?>
      
        <section <?php post_class(); //投稿の種類に応じたクラスを付加 ?>>
          <h1 class="blog-title-article"><?php the_title(); //投稿（固定ページ）のタイトルを表示 ?></h1>
          <div class="blog-wrap">
            <div class="blog-header">
              <div class="date"><?php the_time('Y.m.j');//投稿日時を表示 パラメータで書式を指定 ?></div>
              <div class="category">カテゴリー：<?php the_category(','); //投稿の属するカテゴリー名を全て表示 パラメータで区切り文字を指定 ?></div>
            </div>
          <div class="blog-thumbnail"><?php the_post_thumbnail(); //サムネの表示 ?></div>
            <div class="blog-body">
              <?php the_content(); //投稿（固定ページ）の本文を表示 ?>
            </div>
          </div>
        </section>
        <section class="clearfix">
          <div class="leftcol"><?php next_post_link('%link', '&laquo; 新しい投稿へ' ); //新しい記事へのリンクを表示 ?></div>
          <div class="rightcol"><?php previous_post_link('%link', '古い投稿へ &raquo;' ); //古い記事へのリンクを表示 ?></div>
        </section>
        <div id="comment-container"><?php comments_template(); //コメントテンプレートを取得 ?></div>

      <?php endwhile; // 繰り返し終了 ?>
    <?php else : //条件分岐：投稿が無い場合は ?>

      <h2>投稿がみつかりません。</h2>
      <p><a href="<?php echo home_url(); ?>">トップページに戻る</a></p>

    <?php endif; //条件分岐終了 ?>
    
     <?php
      //　--------- 非公開記事を会員にのみ表示/ログイン画面へ移行しログインしたユーザーだけに非公開記事表示　---------
      $args = array(
        'category_name'  => 'private',  // カテゴリー「private」を読み込む
       
      );
      $the_query = new WP_Query( $args );// 新規WP query を作成　変数args で定義したパラメータを参照
    ?>
      <?php if (is_user_logged_in()): ?>
        <!--ログイン中に表示させたいコンテンツを入れる！-->
              <section>
        <h2 class="section-title">未公開</h2>
        <ul class="news-list">

        <?php while ( $the_query->have_posts() ) : $the_query->the_post();
        // -------- ここから繰り返し---------- ?>

          <li>
            <span class="date"><?php the_time('Y.m.j'); ?></span>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </li>

        <?php // -------- 繰り返しここまで-----------
        endwhile; ?>

        </ul>
      </section>
      <?php else: ?>
        <!-- ログインしていないときに表示されるコンテンツ -->
              <h2>会員限定の閲覧記事です。会員でない方は閲覧できません<(_ _)></h2>
      <a href="<?php echo wp_login_url('http://18.222.57.180/WordPress/login/'); ?>">ログイン</a>

      <?php 
      // -------- 未公開WP_query終了-----------
      wp_reset_postdata();
      endif;
      ?>

    </article>
  </div>
<?php get_footer(); //footer.phpを取得　PHPで終了するので閉じタグは不要です
