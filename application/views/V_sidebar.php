<?php require'template/header.php' ?>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Sidebar Page
        <small>Subheading</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">About</li>
      </ol>

      <!-- Content Row -->
      <div class="row">
        <!-- Sidebar Column -->
        <div class="col-lg-3 mb-4">
          <div class="list-group">
            <a href="index.php" class="list-group-item">Home</a>
            <a href="V_about.php" class="list-group-item">About</a>
            <a href="V_services.php" class="list-group-item">Services</a>
            <a href="V_contact.php" class="list-group-item">Contact</a>
            <a href="V_portfolio-1-col.php" class="list-group-item">1 Column Portfolio</a>
            <a href="V_portfolio-2-col.php" class="list-group-item">2 Column Portfolio</a>
            <a href="V_portfolio-3-col.php" class="list-group-item">3 Column Portfolio</a>
            <a href="V_portfolio-4-col.php" class="list-group-item">4 Column Portfolio</a>
            <a href="V_portfolio-item.php" class="list-group-item">Single Portfolio Item</a>
            <a href="V_blog-home-1.php" class="list-group-item">Blog Home 1</a>
            <a href="V_blog-home-2.php" class="list-group-item">Blog Home 2</a>
            <a href="V_blog-post.php" class="list-group-item">Blog Post</a>
            <a href="V_full-width.php" class="list-group-item">Full Width Page</a>
            <a href="V_sidebar.php" class="list-group-item active">Sidebar Page</a>
            <a href="V_faq.php" class="list-group-item">FAQ</a>
            <a href="V_404.php" class="list-group-item">404</a>
            <a href="V_pricing.php" class="list-group-item">Pricing Table</a>
          </div>
        </div>
        <!-- Content Column -->
        <div class="col-lg-9 mb-4">
          <h2>Section Heading</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, et temporibus, facere perferendis veniam beatae non debitis, numquam blanditiis necessitatibus vel mollitia dolorum laudantium, voluptate dolores iure maxime ducimus fugit.</p>
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
