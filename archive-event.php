<?php get_header(); //header.phpを取得 ?>
 <div id="content" class="clearfix">
    <aside>
      <?php get_sidebar(); //sidebar.phpを取得?>
    </aside>
    <article>
    <?php if ( have_posts() ) : //条件分岐：投稿があるなら ?>

      <section>
        <h1 class="blog-title-category"><?php echo get_the_archive_title(); //アーカイブページのタイトルを表示 ?></h1>
      </section>

      <?php while ( have_posts() ) : the_post();//繰り返し処理開始 ?>

        <section <?php post_class(); //投稿の種類に応じたクラスを付加 ?>>
          <h2 class="blog-title-article"><a href="<?php the_permalink(); //投稿（固定ページ）のリンクを取得 ?>"><?php the_title(); //投稿（固定ページ）のタイトルを表示 ?></a></h2>
          <div class="blog-wrap">
            <div class="blog-header">
              <div class="date"><?php the_time('Y.m.j');//投稿日時を表示 パラメータで書式を指定 ?></div>
            </div>
            <div class="blog-body">
              <?php the_excerpt(); //投稿（固定ページ）の要約を表示 ?>
              <div class="blog-footer">
                <a href="<?php the_permalink(); ?>">続きを見る</a>
              </div>
            </div>
          </div>
        </section>

      <?php endwhile; // 繰り返し終了 ?>

      <section class="clearfix">
        <?php wp_pagenavi(); ?>
      </section>

    <?php else : //条件分岐：投稿が無い場合は ?>

      <h2>投稿がみつかりません。</h2>
      <p><a href="<?php echo home_url(); ?>">トップページに戻る</a></p>

    <?php endif; //条件分岐終了 ?>

    </article>
  </div>
<?php get_footer(); //footer.phpを取得　PHPで終了するので閉じタグは不要です
