<?php if (get_field('options_mailchimp_id', option)): ?>

  <div class="newsletter">

    <form class="newsletter__form" action="<?php the_field('options_mailchimp_id', option) ?>">

      <div class="newsletter__email">
        <input id="email" type="email" placeholder="<?php esc_html_e('Email Address', 'horoman'); ?>">
      </div>
      
      <div class="newsletter__label">
        <label for="email"></label>
      </div>

      <div class="newsletter__submit">
        <button type="submit">
          <span><?php esc_html_e('Subscribe', 'horoman'); ?></span>
          <span> &rarr;</span>
        </button>
      </div>

    </form>

  </div>

<?php endif; ?>
