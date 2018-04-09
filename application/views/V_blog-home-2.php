<?php require 'template/headerUserAccount.php'; ?>
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Recherchez: 
        <small>un Metier dans une Région</small>
      </h1>
      <hr>
        <form action="<?php echo base_url() ?>C_recrutement/rechCandid"" method="post">
      <div class="col-md-12 form-inline" style="">

        <div class="col-md-3 form-group">
          <label for="metier">Métier:</label>
          <select id="metier" name="metier" class="form-control">
              <?php echo $select_metier; ?>
          </select>
        </div>

 
        <div class="col-md-3 form-group" style="">
          <label for="region">Région:</label>
            <select id="region" name="region" class="form-control">
              <?php echo $select_region; ?>
            </select>
        </div>

        <div class="col-md-3 form-group">
          <button type="submit" class="btn btn-primary">Rechercher!</button>
        </div>
          </form>
      </div>
<hr>


      <!-- Blog Post -->
        <?php
            if (isset($consCandid))
                foreach ($consCandid as $cc):
        ?>
      <div class="card mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-4">
              <a href="#">
                <img class="img-fluid rounded" src="http://placehold.it/300x200" alt="">
              </a>
            </div> 
            <div class="col-lg-8">
              <h2 class="card-title"><?php echo $cc->metier1." à ".$cc->region." departement ".$cc->departement; ?></h2>
              <p class="card-text"><?php echo $cc->nom."  ".$cc->prenom; ?></p>
              <a href="#" class="btn btn-primary">Read More &rarr;</a>
            </div>
          </div>
        </div>
        <div class="card-footer text-muted">
          Posted on January 1, 2017 by
          <a href="#">Start Bootstrap</a>
        </div>
      </div>
        <?php endforeach; ?>

    <!--  <div class="card mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <a href="#">
                <img class="img-fluid rounded" src="http://placehold.it/750x300" alt="">
              </a>
            </div>
            <div class="col-lg-6">
              <h2 class="card-title">Post Title</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
              <a href="#" class="btn btn-primary">Read More &rarr;</a>
            </div>
          </div>
        </div>
        <div class="card-footer text-muted">
          Posted on January 1, 2017 by
          <a href="#">Start Bootstrap</a>
        </div>
      </div>-->

        
     <!-- <div class="card mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <a href="#">
                <img class="img-fluid rounded" src="http://placehold.it/750x300" alt="">
              </a>
            </div>
            <div class="col-lg-6">
              <h2 class="card-title">Post Title</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
              <a href="#" class="btn btn-primary">Read More &rarr;</a>
            </div>
          </div>
        </div>
        <div class="card-footer text-muted">
          Posted on January 1, 2017 by
          <a href="#">Start Bootstrap</a>
        </div>
      </div>-->

        
    <!--  <div class="card mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <a href="#">
                <img class="img-fluid rounded" src="http://placehold.it/750x300" alt="">
              </a>
            </div>
            <div class="col-lg-6">
              <h2 class="card-title">Post Title</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
              <a href="#" class="btn btn-primary">Read More &rarr;</a>
            </div>
          </div>
        </div>
        <div class="card-footer text-muted">
          Posted on January 1, 2017 by
          <a href="#">Start Bootstrap</a>
        </div>
      </div> -->

        
   <!--  Pagination <ul class="pagination justify-content-center mb-4">
        <li class="page-item">
          <a class="page-link" href="#">&larr; Older</a>
        </li>
        <li class="page-item disabled">
          <a class="page-link" href="#">Newer &rarr;</a>
        </li>
      </ul>-->

    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br>
  <footer class="py-5 bg-dark" >

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
