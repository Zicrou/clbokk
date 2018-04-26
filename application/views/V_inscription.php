<?php require'template/header.php' ?>

    <!-- Page Content -->
    <div class="container">
        <?php if (!empty($errs_phone)):
           echo '<div class="alert alert-danger" style="margin-top:1%;"><li>Ce Numero existe deja, veuillez recommencer</li></div';
          
        endif;
         if (!empty($errs_mail)):
           echo '<div class="alert alert-danger" style="margin-top:1%;"><li>Cet Email existe deja, veuillez recommencer</li></div';
           //header("Refresh: 3; URL=http://localhost/clbokk/C_pages/page/V_inscription.php");
        endif; ?>
      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">S'inscrire
        <small>Gratuitement</small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">S'inscrire</li>
      </ol>


      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row">
        <div class="col-lg-8 mb-4">
         <!-- <h3>M'inscrire</h3-->
          <form name="inscription" id="inscripForm" method="POST" action="<?php echo base_url() ?>C_inscription/new_inscrit">
            <div class="control-group form-group pull-right">
              <div class="controls col-md-6">
                <label id="nom">Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom" required="" value="<?php if (!empty($errs_mail) || !empty($errs_phone)):
                  echo $this->input->post('nom');
                endif; ?>">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls col-md-6">
                <label id="prenom">Prenom:</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required="" value="<?php if (!empty($errs_mail) || !empty($errs_phone)):
                  echo $this->input->post('prenom');
                endif; ?>">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls col-md-6">
                <label id="phone">Phone Number:</label>
                <input type="tel" class="form-control" id="phone" name="phone" required="" value="<?php if (!empty($errs_mail) || !empty($errs_phone)):
                   echo $this->input->post('phone');
                 endif; ?>">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls col-md-6">
                <label id="email">Email :</label>
                <input type="email" class="form-control" id="email" name="email" required="" value="<?php if (!empty($errs_mail) || !empty($errs_phone)):
                   echo $this->input->post('email');
                  endif; ?>">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls col-md-6">
                <label id="pwd">Mot de Passe:</label>
                <input type="password" class="form-control" name="pwd" id="pwd" required="" value="<?php if (!empty($errs_mail) || !empty($errs_phone)):
                   echo $this->input->post('pwd');
                 endif; ?>">
              </div>
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary" id="submit" name="save">Je m'inscris</button>
              <span class="alert alert-info">J'ai deja un compte<a href="<?php echo base_url(); ?>C_pages/Conn" class=""> Me Connecter</a></span>
          </form>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
<br><br><br><br><br><br><br><br><br><br><br><br><br>
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- Contact form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <!--<script src="<?php //echo base_url(); ?>assets/js/jqBootstrapValidation.js"></script> -->
    <!--<script src="<?php //echo base_url(); ?>assets/js/contact_me.js"></script> -->

  </body>

</html>

  </body>

</html>
