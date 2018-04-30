<?php
  if($this->session->userdata('logged_in') == true)
  {
    require'template/headerUserAccount.php';
    //echo 'connecter';
  }else{
   require'template/header.php';
   // echo 'not connecter';
  }
?>

    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('<?php echo base_url(); ?>images/chantier4.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h1>LES METIERS DE L'ARTISANAT</h1>
              <h4 style="color:#f5f6fa;">Domaine de la construction et de tous les metiers et services qu'y sont rattachés.</h4>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('<?php echo base_url(); ?>images/chantier4.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h1>LES METIERS DE L'ARTISANAT</h1>
              <h4 style="color:#f5f6fa;">Domaine de la construction et de tous les metiers et services qu'y sont rattachés.</h4>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below http://placehold.it/1900x1080-->
          <div class="carousel-item" style="background-image: url('<?php echo base_url(); ?>images/chantier6.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h1>LES METIERS DE L'ARTISANAT</h1>
              <h4 style="color:#f5f6fa;">Domaine de la construction et de tous les metiers et services qu'y sont rattachés.</h4>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

<style type="text/css">
  .cont{
    
  }
  .macpl{
    opacity: 1;
    display: block;
    width: 100%;
    height: auto;
    transition: .6s ease;
    backface-visibility: hidden;
  }
  .centrer{
  transition: .6s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
  }
  .cont:hover .macpl {
  opacity: 0.6;
  border:2px solid #2c3e50;
}

.cont:hover .centrer {
  opacity: 1;
}

.text {
  background-color: #ecf0f1;
  color: gray;
  font-size: 16px;
  padding: 16px 32px;
}
</style>

    <!-- Page Content -->
    <div class="container">

      <h1 class="my-4">Plateforme de recrutement des metiers de l'Artisanat.</h1>

      <!-- Portfolio Section -->
      <h2>Quelques ouvriers...</h2>

      <div class="row">
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100 cont">
            <a href="#"><img class="card-img-top macpl" src="<?php echo base_url(); ?>images/macon_plombier.jpg" alt="maçon_plombier" title="maçon_plombier" style=""></a>
            <div class="centrer">
                <div class="text">
                  <a href="#" style=""><h1>Maçon plombier</h1></a>
                  <p class="card-text"><h2>Toute la Maçonnerie!</h2></p>
                </div>
            </div>

          </div>
        </div>
          <div class="col-lg-4 col-sm-6 portfolio-item">
              <div class="card h-100 cont">
                  <a href="#"><img class="card-img-top" src="<?php echo base_url(); ?>images/macon-enigme.jpg" alt="maçon-enigme" title="maçon-enigme"></a>
                  <div class="centrer">
                      <div class="text">
                          <a href="#" style=""><h1>Maçon plombier</h1></a>
                          <p class="card-text"><h2>Toute la Maçonnerie!</h2></p>
                      </div>
                  </div>

              </div>
          </div>
          <div class="col-lg-4 col-sm-6 portfolio-item">
              <div class="card h-100 cont">
                  <a href="#"><img class="card-img-top" src="<?php echo base_url(); ?>images/coffreur-bancheur.jpg" alt="coffreur-bancheur" title="coffreur-bancheur"></a>
                  <div class="centrer">
                      <div class="text">
                          <a href="#" style=""><h1>coffreur-bancheur</h1></a>
                          <p class="card-text"><h2>COFFREUR!</h2></p>
                      </div>
                  </div>

              </div>
          </div>
          <div class="col-lg-4 col-sm-6 portfolio-item">
              <div class="card h-100 cont">
                  <a href="#"><img class="card-img-top" src="<?php echo base_url(); ?>images/electricien-batiment.jpg" alt="electricien-batiment" title="electricien-batiment"></a>
                  <div class="centrer">
                      <div class="text">
                          <a href="#" style=""><h1>electricien-batiment</h1></a>
                          <p class="card-text"><h2>ELECTRICIEN!</h2></p>
                      </div>
                  </div>

              </div>
          </div>
          <div class="col-lg-4 col-sm-6 portfolio-item">
              <div class="card h-100 cont">
                  <a href="#"><img class="card-img-top" src="<?php echo base_url(); ?>images/menuisier.jpg" alt="menuisier" title="menuisier"></a>
                  <div class="centrer">
                      <div class="text">
                          <a href="#" style=""><h1>menuisier</h1></a>
                          <p class="card-text"><h2>Toute la menuisier!</h2></p>
                      </div>
                  </div>

              </div>
          </div>
          <div class="col-lg-4 col-sm-6 portfolio-item">
              <div class="card h-100 cont">
                  <a href="#"><img class="card-img-top" src="<?php echo base_url(); ?>images/mecaniqueengins.jpg" alt="mecaniqueengins" title="mecaniqueengins"></a>
                  <div class="centrer">
                      <div class="text">
                          <a href="#" style=""><h1>mecaniqueengins</h1></a>
                          <p class="card-text"><h2>Toute la mecaniqueengins!</h2></p>
                      </div>
                  </div>

              </div>
          </div>
      </div>
      <!-- /.row -->


      <!-- Marketing Icons Section -->
      <div class="row">

        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header" style="text-align: center;">Client</h4>
            <div class="card-body">
              <p class="card-text">
              Inscrivez-vous c'est gratuit par <a href="<?php echo base_url(); ?>C_pages/Inscrip">ici</a> et disposez d'un compte qui vous permettra de  faire des requetes de recherche selon vos besoins sur la liste de tous les ouvriers.
              <br> Et ce n'est pas tout, vous pourrez egalement beneficier de tous les services de cette plateforme.
              </p>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url(); ?>C_pages/Inscrip" class="btn btn-primary">En savoir plus</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header" style="text-align: center;">RECRUTEMENT</h4>
            <div class="card-body">
              <p class="card-text">Connectez-vous, selectionnez un domaine puis lister selon vos besoins...</p>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url(); ?>C_pages/Inscrip" class="btn btn-primary">En savoir plus</a>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header" style="text-align: center;">Candidat</h4>
            <div class="card-body">
              <p class="card-text">Vous etes candidat, contactez nous au : ...</p>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url(); ?>C_pages/Inscrip" class="btn btn-primary">En savoir plus</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->

          

      <!-- Features Section -->
      <div class="row">
        <div class="col-lg-6">
          <h2>Mais aussi le Domaine de l'automobile</h2>
          <p>Ainsi que bien d'autre domaine comme:</p>
          <ul>
            <li>
              <strong>Les Secteurs</strong>
            </li>
            <li>Secteur primaire</li>
            <li>Secteur secondaire</li>
            <li>Secteur tertiare</li>
            <li>Nouveau Secteur</li>
          </ul>
          <p>Et divers...</p>
        </div>
        <div class="col-lg-6">
          <img class="img-fluid rounded" src="<?php echo base_url(); ?>images/chantier1.0.jpg" alt="">
        </div>
      </div>
      <!-- /.row -->

      <hr>

      <!-- Call to Action Section -->
      <div class="row mb-4">
        <div class="col-md-8">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
        </div>
        <div class="col-md-4">
          <a class="btn btn-lg btn-secondary btn-block" href="<?php echo base_url(); ?>C_pages/Conn">Call to Action</a>
        </div>
      </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>
    <!-- src="http://placehold.it/700x450"-->
    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
    $("").hover(function(){
        $("").css("display", "block");
        }, function(){
        $("").css("display", "none");
    });
});
    </script>

  </body>

</html>
