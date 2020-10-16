<?php require_once VIEWS . "web/inc/header.php"; ?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_5.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate mb-0 text-center">
          	<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Books <i class="fa fa-chevron-right"></i></span></p>
            <h1 class="mb-0 bread">Books</h1>
          </div>
        </div>
      </div>
    </section>
		
	<section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 ftco-animate">
					<div class="row">
                        <?php foreach($books as $book): ?>
                            <div class="col-md-4 d-flex">
                                <div class="book-wrap">
                                    <div class="img d-flex justify-content-end w-100" style="background-image: url(<?php uploads("books/" . $book['book_img']); ?>);">
                                        <div class="in-text">
                                            <a href="#" class="icon d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="left" title="Add to cart">
                                                <span class="flaticon-shopping-cart"></span>
                                            </a>
                                            <a href="#" class="icon d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="left" title="Add to Wishlist">
                                                <span class="flaticon-heart-1"></span>
                                            </a>
                                            <a href="#" class="icon d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="left" title="Quick View">
                                                <span class="flaticon-search"></span>
                                            </a>
                                            <a href="#" class="icon d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="left" title="Compare">
                                                <span class="flaticon-visibility"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="text px-4 py-3 w-100">
                                        <p class="mb-2"><span class="price">$<?php echo $book['book_price']; ?></span></p>
                                        <h2><a href="#"><?php echo $book['book_name']; ?></a></h2>
                                        <span class="position">By <?php echo $book['author_name']; ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
		    		</div>
		    		<div class="row mt-5">
		          <div class="col">
		            <div class="block-27">
		              <ul>
		                <li><a href="<?php url("books/page/". ($page-1)); ?>" <?php if($page == 1) echo 'class="link-disabled"'; ?> >&lt;</a></li>
                            page <?= $page ?> of <?= $pages_total_num; ?>
		                <li><a href="<?php url("books/page/". ($page+1)); ?>" <?php if($page == $pages_total_num) echo 'class="link-disabled"'; ?>>&gt;</a></li>
		              </ul>
		            </div>
		          </div>
		        </div>
          </div> <!-- .col-md-8 -->

          <div class="col-lg-3 sidebar pl-lg-3 ftco-animate">
            <div class="sidebar-box">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="fa fa-search"></span>
                  <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div>
            <div class="sidebar-box ftco-animate">
              <div class="categories">
                <h3>Categories</h3>
                <ul>
	                <li><a href="#">Fantasy <span class="fa fa-chevron-right"></span></a></li>
	                <li><a href="#">Adventure <span class="fa fa-chevron-right"></span></a></li>
	                <li><a href="#">Romance <span class="fa fa-chevron-right"></span></a></li>
	                <li><a href="#">Contemporary <span class="fa fa-chevron-right"></span></a></li>
	                <li><a href="#">Dystopian <span class="fa fa-chevron-right"></span></a></li>
	                <li><a href="#">Mystery <span class="fa fa-chevron-right"></span></a></li>
	                <li><a href="#">Horror <span class="fa fa-chevron-right"></span></a></li>
	                <li><a href="#">Thriller <span class="fa fa-chevron-right"></span></a></li>
	              </ul>
              </div>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Top Authors</h3>
              <ul class="top">
              	<li><a href="#">John Nathan Muller</a></li>
              	<li><a href="#">Sandra Park</a></li>
              	<li><a href="#">Laura Preston</a></li>
              	<li><a href="#">John Doe</a></li>
              	<li><a href="#">Mc Gregor Douglas</a></li>
              	<li><a href="#">Atom Night</a></li>
              	<li><a href="#">Danny Green</a></li>
              	<li><a href="#">Sonya Lopez</a></li>
              	<li><a href="#">Archie Bochs</a></li>
              	<li><a href="#">Jelian Coward</a></li>
              	<li><a href="#">Mark Hatton</a></li>
              	<li><a href="#">Madison Mc Collen</a></li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </section> <!-- .section -->

<?php require_once VIEWS . "web/inc/footer.php"; ?>