<body class="authentication-bg">

    <div class="account-pages pt-5 my-5">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-8 col-lg-6 col-xl-5">

                    <div class="account-card-box">
                        <?php if (session()->get('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->get('success') ?>
                        </div>
                        <?php endif; ?>
                        <div class="card mb-0">
                            <div class="card-body p-4">

                                <div class="text-center">
                                    <div class="my-3">
                                        <a href="index.html">
                                            <span><img src="assets\images\logo.png" alt="" height="28"></span>
                                        </a>
                                    </div>
                                    <h5 class="text-muted text-uppercase py-3 font-16">Sign In</h5>
                                </div>

                                <form action="/public/" class="mt-2" method="post">

                                    <div class="form-group mb-3">
                                        <input class="form-control" type="email" required="" name="email"
                                            placeholder="Enter your email" value="<?= set_value('email') ?>">
                                    </div>

                                    <div class="form-group mb-3">
                                        <input class="form-control" type="password" required="" id="password"
                                            placeholder="Enter your password" name="password"
                                            value="<?= set_value('password') ?>">
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin"
                                                checked="">
                                            <label class="custom-control-label" for="checkbox-signin">Remember
                                                me</label>
                                        </div>
                                    </div>

                                    <div class="form-group text-center">
                                        <button class="btn btn-success btn-block waves-effect waves-light"
                                            type="submit"> Log In </button>
                                    </div>
                                    <?php if (isset($validation)): ?>
                                    <div class="col-12">
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->listErrors() ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock mr-1"></i>
                                        Forgot your password?</a>

                                </form>

                                <div class="text-center mt-4">
                                    <h5 class="text-muted py-2"><b>Sign in with</b></h5>

                                    <div class="row">
                                        <div class="col-12">
                                            <button type="button"
                                                class="btn btn-facebook waves-effect font-14 waves-light mt-3">
                                                <i class="fab fa-facebook-f mr-1"></i> Facebook
                                            </button>

                                            <button type="button"
                                                class="btn btn-twitter waves-effect font-14 waves-light mt-3">
                                                <i class="fab fa-twitter mr-1"></i> Twitter
                                            </button>

                                            <button type="button"
                                                class="btn btn-googleplus waves-effect font-14 waves-light mt-3">
                                                <i class="fab fa-google-plus-g mr-1"></i> Google+
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-white-50">Don't have an account? <a href="pages-register.html"
                                    class="text-white ml-1"><b>Sign Up</b></a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>