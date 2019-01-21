<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-3">
  
  <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
    
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="nav-tool">
    
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" id="nav-home" href="<?php echo URLROOT; ?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a>
      </li>
    </ul>
    
    <?php if (isset($_SESSION['user_id'])) : ?>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $_SESSION['user_name']; ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo URLROOT; ?>/users/information">Account Information</a>
          </div>
        </li>
        <li class="nav-item ml-2">
          <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Log Out</a>
        </li>
      </ul>
    <?php else : ?>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Log In</a>
        </li>
      </ul>
    <?php endif; ?>

  </div>

</nav>