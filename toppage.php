<?php
/*
Template Name: トップページ
*/
?>
<?php get_header(); //header.phpを取得 ?>
  <div id="content" class="clearfix">
    <aside>
      <?php get_sidebar(); //sidebar.phpを取得 ?>
    </aside>
    <article>
    
    <?php if (have_posts() ): //条件分岐：投稿があるなら?>
      <?php while (have_posts()) : the_post(); //繰り返し処理開始?>
      
        <section <?php post_class(); //投稿の種類に応じたクラスを付加  ?>> 
          <h1><?php the_title(); //投稿（固定ページ）のタイトルを表示 ?></h1>
          <?php the_content(); ///投稿（固定ページ）の本文を表示 ?>
        </section>
        
      <?php endwhile; //繰り返し終了 ?>
      
<?php else: //条件分岐：投稿が無い場合は ?>

      <h2>投稿がみつかりません。</h2>
      <p><a href="<?php echo home_url(); ?>">トップページに戻る</a></p>

    <?php endif; //条件分岐終了 ?>

 <?php
      //　--------- 新着情報を3件表示　---------
      $args = array(
        'category_name'  => 'news',  // カテゴリー「news」を読み込む
        'posts_per_page' => 3        // 表示数　3件
      );
      $the_query = new WP_Query( $args );// 新規WP query を作成　変数args で定義したパラメータを参照
      if ( $the_query->have_posts() ) :
      // ここから表示する内容を記入
      ?>

      <section>
        <h2 class="section-title">NEWS</h2>
        <ul class="news-list">

        <?php while ( $the_query->have_posts() ) : $the_query->the_post();
        // -------- ここから繰り返し---------- ?>

          <li>
            <span class="date"><?php the_time('Y.m.j'); ?></span>
            <span class="label-info">お知らせ</span>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </li>

        <?php // -------- 繰り返しここまで-----------
        endwhile; ?>

        </ul>
        <div class="center">
            <a href="<?php echo home_url(); ?>/category/news/" class="btn btn-default">お知らせ</a>
        </div>
      </section>

      <?php
      // -------- 新着情報WP_query終了-----------
      wp_reset_postdata();
      endif;
      ?>

 <?php
      //　--------- 最新映画レビューを3件表示　---------
      $args = array(
        'category_name'  => 'movie-review',  // カテゴリー「movie-review」を読み込む
        'posts_per_page' => 3        // 表示数　3件
      );
      $the_query = new WP_Query( $args );// 新規WP query を作成　変数args で定義したパラメータを参照
      if ( $the_query->have_posts() ) :
      // ここから表示する内容を記入
      ?>

      <section>
        <h2 class="section-title">最新映画レビュー</h2>
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

      <?php
      // -------- 最新映画レビューWP_query終了-----------
      wp_reset_postdata();
      endif;
      ?>


    </article>
  </div>
<?php get_footer(); //footer.phpを取得　PHPで終了するので閉じタグは不要です
