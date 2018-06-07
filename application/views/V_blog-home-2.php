<?php require 'template/headerUserAccount.php'; ?>


<!-- Page Content -->
<div class="container">

  <!-- Page Heading/Breadcrumbs -->
  <h1 class="mt-4 mb-3">Recherchez:
    <small>un Metier dans une Région</small>
  </h1>
  <hr>
  <form action="<?php echo base_url() ?>C_recrutement/rechCandid" method="post">
    <div class="col-md-12 form-inline" style="">

      <div class="col-md-3 form-group">
        <label>Métier:</label>
        <select name="metier" class="form-control">
          <?php echo $select_metier; ?>
        </select>
      </div>


      <div class="col-md-3 form-group" style="">
        <label>Région:</label>
        <select  name="region" class="form-control">
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
            <h2 class="card-title">
              <?php echo $cc->metier1." à ".$cc->region." departement ".$cc->departement; ?>
            </h2>
            <p class="card-text">
              <?php echo $cc->nom."  ".$cc->prenom; ?>
            </p>
            <a href="<?php echo base_url()." C_recrutement/datacShow/ ".$cc->id_Cpersos ?>" class="btn btn-outline-primary link" data-id="<?php echo $cc->id_Cpersos; ?>"
              data-toggle="" data-target="#myModal">Voir plus &rarr;</a>
            <!-- a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#myModal">Voir plus &rarr;</a -->
            <?php //echo $cc->id_Cpersos ?>
          </div>
        </div>
      </div>
      <div class="card-footer text-muted">
        Posted on January 1, 2017 by
        <a href="#">Start Bootstrap</a>
      </div>
    </div>



    <?php endforeach; ?>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">
            <span id="prenom"></span> <span id="nom"></span>
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!--h5>Popover in a modal</h5>
            <p>This <a href="#" role="button" class="btn btn-secondary popover-test" title="Popover title" data-content="Popover body content is set in this attribute.">button</a> triggers a popover on click.</p-->
            Region: <span id="region"></span> <******> Departement: <span id="departement"></span>
            <br>
            <span id="disponibilite"></span><br>
            Metier principal: <span id="metier1"></span><br>
            Metier secondaire: <span id="metier2"></span><br>
            Autre metier: <span id="metier3"></span>
            <!--p>This <a href="#" role="button" class="btn btn-secondary popover-test" id="element" title="Popover title" data-content="Popover body content is set in this attribute.">button</a> triggers a popover on click.</p-->
            <!--h5>Tooltips in a modal</h5>
            <p><a href="#" class="tooltip-test" title="Tooltip">This link</a> and <a href="#" class="tooltip-test" title="Tooltip">that link</a> have tooltips on hover.</p-->
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!--button type="button" class="btn btn-primary">Save changes</button-->
          </div>
        </div>
      </div>
    </div>
    <!-- Button trigger modal >
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
    </button -->




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
<!-- /.container -->

<!-- Footer -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<footer class="py-5 bg-dark">

  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
  </div>
  <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script>
  $('body').on('click', '.link', function () {
    href = '<?php echo base_url()."C_recrutement/dataCandid/"?>' + $(this).attr('data-id')
    $.ajax({
      url: href,
      type: 'GET',
      dataType: 'text',
      success: function (data) {
        var result = JSON.parse(data);
        $('#nom').text(result.nom);
        $('#prenom').text(result.prenom);
        $('#region').text(result.region);
        $('#departement').text(result.departement);
        $('#metier1').text(result.metier1);
        $('#metier2').text(result.metier2);
        $('#metier3').text(result.metier3);
        
        $('#myModal').modal('show');
        $('#element').popover('toggle');
      }
    })
    
    return false;
  });
  
</script>


</script>
<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>