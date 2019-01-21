<?php require APPROOT . '/views/inc/header.php'; ?>

  <div class="row">
    <div class="col-md-7 mx-auto">
      <div class="card card-body bg-light mt-2">
        
        <h2 class="card-title">Create an Account</h2>
        <p class="lead">Please fill out this form to register.</p>

        <div class="mt-3"></div>
        
        <form method="post" action="<?php echo URLROOT; ?>/users/register">
          
          <div class="row">
            <div class="col">
              <div class="form-group">
                <input type="text" name="name" value="<?php echo $data_array['name'] ?>" placeholder="Enter your name" class="form-control form-control-lg <?php echo empty($data_array['name_err']) ? '' : 'is-invalid'; ?>">
                <span class="invalid-feedback"><?php echo $data_array['name_err'] ?></span>
              </div>
            </div>
          </div>

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

          <div class="row">
            <div class="col">
              <div class="form-group">
                <input type="password" name="confirm_password" value="<?php echo $data_array['confirm_password'] ?>" placeholder="Re-enter your password" class="form-control form-control-lg <?php echo empty($data_array['confirm_password_err']) ? '' : 'is-invalid'; ?> ">
                <span class="invalid-feedback"><?php echo $data_array['confirm_password_err'] ?></span>
              </div>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col">
              <div class="form-group">
                <input type="submit" value="Register" class="btn btn-success btn-block">
              </div>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col text-center">
              <div class="form-group">
                <label for="">Already have an account?</label>
                <a href="<?php echo URLROOT;?>/users/login" class="">Log In</a>
              </div>
            </div>
          </div>

        </form>

      </div>
    </div>
  </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>