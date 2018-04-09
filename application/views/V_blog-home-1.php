<?php require 'template/headerUserAccount.php'; ?>
   <style type="text/css">
     .close{
      color: blue;
     }
     .close:hover{
      color: red;
     }
     .close:active{
      display: none;
     }
   </style>


<?php
/*var_dump($_SESSION);
var_dump($this->session->userdata('mess')['statut_ok']);
exit();*/
?>
    <!-- Page Content -->
    <div class="container">
      <br><br>
      <?php if (!empty($this->session->userdata('mess')['statut_ok'])):
          //echo "<div class="alert alert-success">
               //   <button type="button" class="close" data-dismiss="alert"><i class="ace-icon fa fa-times"></i></button>
               //   <strong><i class="ace-icon fa fa-check"></i>BIENVENUE dans votre compte !</strong>
              //  </div>";
           
           echo '<div class="alert alert-success etat" data-dismiss="alert" style="margin-top:1%;"><li>BIENVENUE dans votre compte !<span class="close" style="float:right;">&times;</span></li></div>';
        endif; ?>
      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Domaine Personnel :
        <small><?php  echo $this->session->userdata('prenom')." ".$this->session->userdata('nom');?></small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url() ?>C_connexion/Index">Home</a>
        </li>
        <li class="breadcrumb-item active">Domaine personnel</li>
      </ol>

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <!-- Blog Post -->
          <div class="card mb-4">
          <!--  <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap"--> 
            <div class="card-body">
              <h2 class="card-title"></h2>
              <p class="card-text"></p>
              <a href="<?php echo base_url() ?>C_connexion/Dconst" class="btn btn-primary">Domaine Construction</a>
              <a href="#" class="btn btn-primary">Domaine Automobile</a>
              <a href="#" class="btn btn-primary">Domaine Divers</a>
            </div>
            <div class="card-footer text-muted">
              <br><br><br><br><br><br><br>
              <a href="#"></a>
            </div>
          </div>

          <!-- Blog Post 
          <div class="card mb-4">
            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">Post Title</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
              <a href="#" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on January 1, 2017 by
              <a href="#">Start Bootstrap</a>
            </div>
          </div>-->

          <!-- Blog Post 
          <div class="card mb-4">
            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">Post Title</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
              <a href="#" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on January 1, 2017 by
              <a href="#">Start Bootstrap</a>
            </div>
          </div>-->

          <!-- Pagination 
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>-->

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          
          <div class="card mb-4">
            <h5 class="card-header">Completer votre Inscription avec une photo de profil</h5>
            <div class="card-body">
              <div class="input-group">
                <form enctype="multipart/form-data" action="<?php echo base_url() ?>C_connexion/getImage" method="POST">
                  <input type="file" name="pic" id="pic" accept=".png,.jpg" onclick='getfile()'>
                  <span id="outputfile"></span>
                  <span id="extension"></span>
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit" >Go!</button>
                  </span>
                </form>
              </div>
            </div>
          </div>

          <!-- Categories Widget 
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">Web Design</a>
                    </li>
                    <li>
                      <a href="#">HTML</a>
                    </li>
                    <li>
                      <a href="#">Freebies</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">JavaScript</a>
                    </li>
                    <li>
                      <a href="#">CSS</a>
                    </li>
                    <li>
                      <a href="#">Tutorials</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>-->

          <!-- Side Widget 
          <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>-->

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->

    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
      function getfile(){
        outputfile.value=inputfile.value.split('.')[0];
        extension.value=inputfile.value.split('.')[1];
      }
    </script>
  </body>

</html>
