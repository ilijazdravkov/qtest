<section class="ftco-section ftco-section-2 section-signup page-header img">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                <?php
                if(isset($unSuccessLoginMsg)){
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $unSuccessLoginMsg; ?>
                    </div>
                    <?php
                }
                ?>
                <div class="card card-login py-4">
                    <form class="form-login" method="POST" action="login">
                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title">Login</h4>
                            <div class="social-line">
                                <a href="#" class="btn-icon d-flex align-items-center justify-content-center">
                                    <i class="ion-logo-facebook"></i>
                                </a>
                                <a href="#" class="btn-icon d-flex align-items-center justify-content-center">
                                    <i class="ion-logo-twitter"></i>
                                </a>
                                <a href="#" class="btn-icon d-flex align-items-center justify-content-center">
                                    <i class="ion-logo-googleplus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <?php
                            if(isset($errors) && $errors->first('email')){
                                ?>
                                <div class="invalid-feedback" style="display: block">
                                    <?php echo $errors->first('email'); ?>
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
                                <input type="email" class="form-control" name="email" placeholder="Email..." required>
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
                                <input type="password" class="form-control" placeholder="Password..." name="password" required>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <input id="submit" type="submit" value="Log In" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
