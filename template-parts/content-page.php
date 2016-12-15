<article class="page" itemscope itemtype="http://schema.org/CreativeWork">

  <?php
    $thumbPost = has_post_thumbnail();
    $thumbLargeDefault = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "large");
  ?>

  <header class="page__header<?php if ($thumbPost): ?> page__header--image<?php endif; ?>">
    
    <div class="page__header-content">

      <div class="page__header-content-title">
        <h2 itemprop="headline"><?php the_title(); ?></h2>
      </div>
      
      <?php if ($thumbPost): ?>
        <div class="page__header-content-image">
          <img src="<?php echo $thumbLargeDefault[0]; ?>" alt="<?php echo $thumbLargeDefault['alt'] ?>" />
        </div>
      <?php endif; ?>

    </div>
  
  </header>
  
  <?php if(have_rows('page_columns')): ?>

    <div class="page__columns" itemprop="articleBody">

      <?php while (have_rows('page_columns')) : the_row(); ?>
        <?php if (get_sub_field('page_column')): ?>
          <div class="page__column">
            <?php the_sub_field('page_column'); ?>
          </div>
        <?php endif; ?>
      <?php endwhile; ?>

    </div>

  <?php endif; ?>
	
</article>
