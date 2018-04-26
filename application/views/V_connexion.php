<?php require'template/header.php' ?>

    <!-- Page Content -->
    <div class="container">
        <?php
         if (!empty($statut_no)):
           echo '<div class="alert alert-danger" style="margin-top:1%;">
            <p>Impossible de se connecter</p>
            <li>Verifier votre email ou mot de passe</li>
            <li>Si vous n\'avez pas de compte, Vous pouvez-vous inscrire <a href="Inscrip">ici</a></li>
            </div>';
        endif; ?>
        <?php
          if (!empty($msg_no_no)):
           echo '<div class="alert alert-danger" data-dismiss="alert" style="margin-top:1%;"><li>'.$msg_no_no.'</li></div>';
        endif;
        ?>
      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Se Connecter</h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url() ?>C_pages/Index">Home</a>
        </li>
        <li class="breadcrumb-item active">Se connecter</li>
      </ol>


      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row">
        <div class="col-md-4 mb-4" style="border: 1px solid white;">
         <!-- <h3>M'inscrire</h3-->
          <form name="connexion" id="conxForm" method="POST" action="<?php echo base_url() ?>C_connexion/verifConn">
            <div class="control-group form-group">
              <div class="controls">
                <label id="email">Email :</label>
                <input type="email" class="form-control col-md-8" id="email" name="email" required="" value="<?php if (!empty($errs_mail) || !empty($errs_phone)):
                   echo $this->input->post('email');
                  endif; ?>">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label id="pwd">Mot de Passe:</label>
                <input type="password" class="form-control col-md-8" name="pwd" id="pwd" required="" value="<?php if (!empty($errs_mail) || !empty($errs_phone)):
                   echo $this->input->post('pwd');
                 endif; ?>">
              </div>
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <input type="submit" class="btn btn-primary" id="submit" name="save" value="Connection">
              <!--a href="<?php echo base_url(); ?>C_connexion/verifConn" class="btn btn-info"> M'inscrire</a-->
          </form>
        </div>
        <div class="col-md mb-4" style="border: 1px solid white;">
        <img src="<?php echo base_url(); ?>images/image-connection.jpg" alt="Mise en relation" title="Mise en relation" class="col-md-6">
      </div>
      </div>

      <!-- /.row -->

    </div>
    <!-- /.container -->
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
    
    <!-- Contact form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <!--<script src="<?php //echo base_url(); ?>assets/js/jqBootstrapValidation.js"></script> -->
    <!--<script src="<?php //echo base_url(); ?>assets/js/contact_me.js"></script> -->

  </body>

</html>

  </body>

</html>
