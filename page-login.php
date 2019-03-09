<?php get_header(); //header.phpを取得 ?>
  <div id="content" class="clearfix">
    <aside>
        <?php get_sidebar(); //sidebar.phpを取得　?>
    </aside>
    <article>
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <?php the_content(); ?>
        <?php endwhile; endif; ?>
    </article>
 </div>
<?php get_footer(); //footer.phpを取得　PHPで終了するので閉じタグは不要です
