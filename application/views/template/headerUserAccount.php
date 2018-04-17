<?php
$suite_req = base_url();
if ($this->session->userdata('mess')['statut_ok'] == null) {
    header("Location:".$suite_req."C_pages/Conn");
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Modern Business - Start Bootstrap Template</title>
      <!--link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"-->

      <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/modern-business.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?php echo base_url() ?>C_connexion/Index">CI LAA BOKK</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() ?>C_connexion/About">A Propos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() ?>C_connexion/Service">Services</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() ?>C_connexion/Contact">Contact</a>
            </li>
          <!--  <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url() ?>C_connexion/BlogUser">Compte</a>
            </li--> 
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <img src="<?php if($photo == null){echo base_url().'image/img1.png';}else{echo base_url().'image/'.$photo;} ?>" style="width:40px;height:40px;margin-top:0;padding-top:0;border-radius:50%;vertical-align:middle;" alt="Mon profil" title="Mon profil">
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="<?php echo base_url() ?>C_connexion/BlogUser">Mon Compte</a>
                <a class="dropdown-item" href="<?php echo base_url() ?>se_deconnecter">Deconnection</a>
                 
           <!--    <a class="dropdown-item" href="<?php //echo base_url() ?>C_pages/page/V_portfolio-2-col">2 Column Portfolio</a>
                <a class="dropdown-item" href="<?php //echo base_url() ?>C_pages/page/V_portfolio-3-col">3 Column Portfolio</a>
                <a class="dropdown-item" href="<?php //echo base_url() ?>C_pages/page/V_portfolio-4-col">4 Column Portfolio</a>
                <a class="dropdown-item" href="<?php //echo base_url() ?>C_pages/page/V_portfolio-item">Single Portfolio Item</a-->
              </div>
            </li>

           <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Blog
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                <a class="dropdown-item" href="<?php //echo base_url() ?>C_pages/page/V_blog-home-1">Blog Home 1</a>
                <a class="dropdown-item" href="<?php //echo base_url() ?>C_pages/page/V_blog-home-2">Blog Home 2</a>
                <a class="dropdown-item" href="<?php //echo base_url() ?>C_pages/page/V_blog-post">Blog Post</a>
              </div>
            </li-->

           <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Other Pages
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                <a class="dropdown-item" href="<?php //echo base_url() ?>C_pages/page/V_full-width">Full Width Page</a>
                <a class="dropdown-item" href="<?php //echo base_url() ?>C_pages/page/V_sidebar">Sidebar Page</a>
                <a class="dropdown-item" href="<?php //echo base_url() ?>C_pages/page/V_faq">FAQ</a>
                <a class="dropdown-item" href="<?php //echo base_url() ?>C_pages/page/V_404">404</a>
                <a class="dropdown-item" href="<?php //echo base_url() ?>C_pages/page/V_pricing">Pricing Table</a>
              </div>
            </li-->
          <!--  <li class="nav-item">
              <a class="nav-link" href="<?php //echo base_url() ?>C_connexion/log_out">Deconnection</a>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>