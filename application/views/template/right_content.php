<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container" id="div_container">
        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-info"><i class="ion-checkmark-round"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php echo $autoriser[0]->nbr;?></span>
                                        Etablissements Autorisés
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Pourcentage <span class="pull-right"><?php echo $autoriser_pc ?>%</span></h5>
                                            <div class="progress progress-sm m-0">
                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?php echo $autoriser_pc ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $autoriser_pc ?>%">
                                                    <span class="sr-only"><?php echo $autoriser_pc ?>% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-purple"><i class="ion-close-round"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php echo $non_autoriser[0]->nbr;?></span>
                                        Etablissements Non Autorisés
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Pourcentage <span class="pull-right"><?php echo $non_autoriser_pc ?>%</span></h5>
                                            <div class="progress progress-sm m-0">
                                                <div class="progress-bar progress-bar-purple" role="progressbar" aria-valuenow="<?php echo $non_autoriser_pc ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $non_autoriser_pc ?>%">
                                                    <span class="sr-only"><?php echo $non_autoriser_pc ?>% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-success"><i class="ion-android-contacts"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php echo $reconnu[0]->nbr;?></span>
                                        Etablissements Reconnus
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Pourcentage <span class="pull-right"><?php echo $reconnu_pc ?>%</span></h5>
                                            <div class="progress progress-sm m-0">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $reconnu_pc ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $reconnu_pc ?>%">
                                                    <span class="sr-only"><?php echo $reconnu_pc ?>% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="mini-stat clearfix bx-shadow bg-white">
                                    <span class="mini-stat-icon bg-primary"><i class="ion-eye"></i></span>
                                    <div class="mini-stat-info text-right text-dark">
                                        <span class="counter text-dark"><?php echo $instance[0]->nbr;?></span>
                                        Etablissements en Instances
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="m-t-20">
                                            <h5 class="text-uppercase">Pourcentage <span class="pull-right"><?php echo $instance_pc ?>%</span></h5>
                                            <div class="progress progress-sm m-0">
                                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="<?php echo $instance_pc ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $instance_pc ?>%">
                                                    <span class="sr-only"><?php echo $instance_pc ?>% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>
        <!-- container -->
    </div>
    <!-- content -->

    <footer class="footer text-right">
        2017 © SIMEN.
    </footer>
</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->