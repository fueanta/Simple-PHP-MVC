<?php require APPROOT . '/views/inc/header.php'; ?>

  <h3 class="mb-3">Account Information</h3>

  <ul>
    <?php 
      foreach ($data_array as $key => $value) {
        echo '<li>' . $key . ': ' . $value . '</li>';
      }
    ?>
  </ul>

<?php require APPROOT . '/views/inc/footer.php'; ?>