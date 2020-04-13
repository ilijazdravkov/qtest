<section class="ftco-section ftco-section-2 section-signup page-header img"">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                <?php
                if(isset($emailExists)){
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $emailExists; ?>
                    </div>
                    <?php
                }
                ?>
                <div class="card card-login py-4">
                    <form class="form-register" method="POST" action="register">
                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title">Register</h4>
                        </div>
                        <!-- <p class="description text-center">Or Be Classical</p> -->
                        <div class="card-body p-4">
                            <?php
                            if(isset($errors) && $errors->first('name')){
                                ?>
                                <div class="invalid-feedback" style="display: block">
                                    <?php echo $errors->first('password'); ?>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="ion-ios-contact"></i>
                                  </span>
                                </div>
                                <input type="text" id="registerName" name="name" class="form-control" placeholder="Name..." required>
                            </div>
                            <?php
                            if(isset($errors) && $errors->first('email')){
                                ?>
                                <div class="invalid-feedback" style="display: block">
                                    <?php echo $errors->first('password'); ?>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="ion-ios-paper-plane"></i>
                                  </span>
                                </div>
                                <input type="email" id="registerEmail" name="email" class="form-control" placeholder="Email..." required>
                            </div>
                            <?php
                            if(isset($errors) && $errors->first('password')){
                                ?>
                                <div class="invalid-feedback" style="display: block">
                                    <?php echo $errors->first('password'); ?>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="ion-ios-lock"></i>
                                  </span>
                                </div>
                                <input type="password" id="registerPassword" name="password" class="form-control" placeholder="Enter Password" required>
                            </div>
                            <?php
                            if(isset($errors) && $errors->first('confirm_password')){
                                ?>
                                <div class="invalid-feedback" style="display: block">
                                    <?php echo $errors->first('confirm_password'); ?>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="ion-ios-lock"></i>
                                  </span>
                                </div>
                                <input type="password" id="confirmPassword" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <input id="submit" name="submit" type="submit" value="Log In" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>