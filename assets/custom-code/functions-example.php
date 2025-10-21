<?php
add_action('woocommerce_after_shop_loop_item_title', 'pawdo_show_dog_meta', 12);
function pawdo_show_dog_meta() {
  if (!function_exists('get_field')) return; // ACF not active
  global $product;
  $id = $product->get_id();

  $age      = get_field('age', $id);
  $breed    = get_field('breed', $id);
  $location = get_field('location', $id);
  $status   = get_field('status', $id); // Available / Fostered / Adopted
  $name_o   = get_field('name_override', $id);

  $name = $name_o ? $name_o : get_the_title($id);

  echo '<div class="dog-card-meta">';
    echo '<div class="dog-name"><strong>' . esc_html($name) . '</strong></div>';
    if ($age)      echo '<div class="dog-field">Age: '      . esc_html($age)      . '</div>';
    if ($breed)    echo '<div class="dog-field">Breed: '    . esc_html($breed)    . '</div>';
    if ($location) echo '<div class="dog-field">Location: ' . esc_html($location) . '</div>';
    if ($status)   echo '<div class="dog-status status-'. sanitize_title($status) .'">' . esc_html($status) . '</div>';
  echo '</div>';
}
