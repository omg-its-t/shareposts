<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bglight mt-5">
            <h2>Create an Account</h2>
            <p>Fill out the form to create an account to start Trappin.</p>
            <form action="<?php echo URLROOT;?>/users/register" method="POST">
                <div class="form-group">
                    <label for="name">Name: <sup>*</sup></label>
                    <!-- checks to see if there is an error and if there is we apply the is-invalid class to the div otherwise do nothing -->
                    <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_error'])) ? 'is-invalid' : '';?>" value="<?php echo $data['name'];?>">
                    <span class="invalid-feedback"><?php echo ['name_error'];?></span>
                </div>
                <div class="form-group">
                    <label for="name">Email: <sup>*</sup></label>
                    <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_error'])) ? 'is-invalid' : '';?>" value="<?php echo $data['email'];?>">
                    <span class="invalid-feedback"><?php echo ['email_error'];?></span>
                </div>
                <div class="form-group">
                    <label for="name">Password: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_error'])) ? 'is-invalid' : '';?>" value="<?php echo $data['password'];?>">
                    <span class="invalid-feedback"><?php echo ['password_error'];?></span>
                </div>
                <div class="form-group">
                    <label for="name">Confirm Password: <sup>*</sup></label>
                    <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_error'])) ? 'is-invalid' : '';?>" value="<?php echo $data['confirm_password'];?>">
                    <span class="invalid-feedback"><?php echo ['confirm_password_error'];?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Register" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT;?>/users/login" class="btn btn-light btn-block">Have an accout/Login.</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>