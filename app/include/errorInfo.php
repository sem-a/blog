<?php if (count($err_arr) > 0) : ?>

  <ul class="error__items">
    <?php
    foreach ($err_arr as $value) {
      echo "<li class='error-item'>$value</li>";
    }
    ?>
  </ul>

<?php endif; ?>