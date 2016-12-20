<article class="error-page error-404" itemscope itemtype="http://schema.org/CreativeWork">

  <div class="error-page__content">

    <?php if (get_field('options_404_title', option)): ?>
      <h2><?php the_field('options_404_title', option); ?></h2>
    <?php endif; ?>

    <p><a rel="home" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Homepage', 'horoman'); ?></a></p>

  </div>

  <?php

    $image = get_field('options_404_image', option);
    $size = 'large';
    $thumbLarge = $image['sizes'][ $size ];

  ?>

  <?php if ($image): ?>
    <div class="error-page__image">
      <img src="<?php echo $thumbLarge ?>" alt="<?php echo $thumbLarge['alt'] ?>" />
    </div>
  <?php endif; ?>

</article>
