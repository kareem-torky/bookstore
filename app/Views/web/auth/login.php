<?php require_once VIEWS . "web/inc/header.php"; ?>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="contact-wrap w-100 p-md-5 p-4">
                    <h3 class="mb-4">Login</h3>
                    <?php require VIEWS . "web/inc/errors.php"; ?>
                    <form method="POST" action="<?= url("do-login"); ?>" id="loginForm" name="loginForm" class="contactForm">
                        <div class="row">
                            
                            <div class="col-md-6"> 
                                <div class="form-group">
                                    <label class="label" for="email">Email Address</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="label" for="name">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="password">
                                </div>
                            </div>
                           
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" value="Login" class="btn btn-primary">
                                    <div class="submitting"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>


<?php require_once VIEWS . "web/inc/footer.php"; ?>