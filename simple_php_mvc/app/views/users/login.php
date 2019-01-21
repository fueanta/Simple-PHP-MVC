<?php require APPROOT . '/views/inc/header.php'; ?>

  <div class="row">
    <div class="col-md-5 mx-auto">

      <div class="card card-body bg-light mt-4">
        
        <!-- flash messages -->
        <?php flash('register_success'); ?>
        <?php flash('invalid_credentials'); ?>

        <h2 class="card-title">Log In</h2>
        <p class="lead">Please fill in your credentials to log in.</p>

        <div class="mt-3"></div>
        
        <form method="post" action="<?php echo URLROOT; ?>/users/login">
          
          <div class="row">
            <div class="col">
              <div class="form-group">
                <input type="email" name="email" value="<?php echo $data_array['email'] ?>" placeholder="Enter your email" class="form-control form-control-lg <?php echo empty($data_array['email_err']) ? '' : 'is-invalid'; ?> ">
                <span class="invalid-feedback"><?php echo $data_array['email_err'] ?></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group">
                <input type="password" name="password" value="<?php echo $data_array['password'] ?>" placeholder="Enter your password" class="form-control form-control-lg <?php echo empty($data_array['password_err']) ? '' : 'is-invalid'; ?> ">
                <span class="invalid-feedback"><?php echo $data_array['password_err'] ?></span>
              </div>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col">
              <div class="form-group">
                <input type="submit" value="Log In" class="btn btn-success btn-block">
              </div>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col text-center">
              <div class="form-group">
                <label for="">Forgot your password?</label>
                <a href="<?php echo URLROOT;?>/users/reset" class="">Reset</a>
              </div>
            </div>
          </div>

        </form>

      </div>
    </div>
  </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>