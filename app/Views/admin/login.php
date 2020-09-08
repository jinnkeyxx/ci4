<?= view('admin/templates/header'); ?>


<div class="account-pages pt-3 mt-3 authentication-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="account-card-box">
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

                            <form action="admin" class="mt-2" method="post" id="login">

                                <div class="form-group mb-3">
                                    <input class="form-control" id="email" type="email" required="" name="email"
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
                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">
                                        Log In </button>
                                </div>
                        </div>
                        <a href="" class="text-muted text-center mb-2"><i class="mdi mdi-lock mr-1"></i>
                            Forgot your password?</a>
                        </form>
                        <div class="col-md-10 ml-auto mr-auto " role="alert" id='error'>
                        </div>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>


            <!-- end row -->

        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div>
<!-- end container -->
</div>
<?= view('admin/templates/footer'); ?>