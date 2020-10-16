<?php require_once VIEWS . "web/inc/header.php"; ?>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrapper px-md-4">
                    
                    <div class="row no-gutters">
                        <div class="col-md-7">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4">Cart <a href="<?php url("cart/empty"); ?>">empty cart</a></h3>
                                <?php require VIEWS . "web/inc/errors.php"; ?>
                                <form method="POST" action="<?= url("cart/store"); ?>" id="cartForm" name="cartForm" class="contactForm">
                                    <div class="row">

                                        <?php foreach($books as $book): ?>                                        
                                            <div class="col-md-6">
                                                <p><?= $book['name']; ?></p>
                                                <input type="hidden" name="ids[]" value="<?= $book['id']; ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <strong><?= $book['price']; ?></strong>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" name="quantities[]" value="1">
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="submit" value="Submit order" class="btn btn-primary">
                                                <div class="submitting"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php require_once VIEWS . "web/inc/footer.php"; ?>