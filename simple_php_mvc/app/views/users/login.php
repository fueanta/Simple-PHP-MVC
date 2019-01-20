<?php require APPROOT . '/views/inc/header.php'; ?>

  <div class="row">
    <div class="col-md-5 mx-auto">
      <div class="card card-body bg-light mt-5">
        
        <?php flash('register_success'); ?>

        <h2>Log In</h2>
        <p class="lead">Please fill in your credentials to log in.</p>
        
        <form method="post" action="<?php echo URLROOT; ?>/users/login">
          
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="email">Email: <sup class="text-danger">*</sup></label>
                <input type="email" name="email" value="<?php echo $data_array['email'] ?>" class="form-control form-control-lg <?php echo empty($data_array['email_err']) ? '' : 'is-invalid'; ?> ">
                <span class="invalid-feedback"><?php echo $data_array['email_err'] ?></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="password">Password: <sup class="text-danger">*</sup></label>
                <input type="password" name="password" value="<?php echo $data_array['password'] ?>" class="form-control form-control-lg <?php echo empty($data_array['password_err']) ? '' : 'is-invalid'; ?> ">
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