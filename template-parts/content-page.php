<article class="content-page">

  <div class="title">
    <h1><?php the_title(); ?></h1>
  </div>
  
  <div class="content">
    <?php the_content(); ?>
  </div>

  <div class="pagination">
    <?php wp_link_pages(); ?>
  </div>
	
</article>
