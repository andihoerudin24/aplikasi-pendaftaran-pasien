
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="description" content="Miminium Admin Template v.1">
        <meta name="author" content="Isna Nur Azis">
        <meta name="keyword" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Miminium</title>

        <!-- start: Css -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">

        <!-- plugins -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/plugins/font-awesome.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/plugins/simple-line-icons.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/plugins/animate.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/plugins/icheck/skins/flat/aero.css"/>
        <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
        <!-- end: Css -->

        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/logomi.png">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
    </head>

    <body id="mimin" class="dashboard form-signin-wrapper">
        <div class="container">

            <div class="row">
                <div class="col-md-6">

                    <?php echo form_open('Auth/Chek_login', 'class="form-signin"') ?>
                    <div class="panel periodic-login">
                        <span class="atomic-number">28</span>
                        <div class="panel-body text-center">
                            <h1 class="atomic-symbol">RS</h1>
                            <p class="atomic-mass"></p>
                            <p class="element-name">Silahkan Login</p>

                            <i class="icons icon-arrow-down"></i>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="text" name="username" class="form-text" required>
                                <span class="bar"></span>
                                <label>Username</label>
                            </div>
                            <div class="form-group form-animate-text" style="margin-top:40px !important;">
                                <input type="password" name="password" class="form-text" required>
                                <span class="bar"></span>
                                <label>Password</label>
                            </div>
                            <input type="submit" name="submit" class="btn col-md-12" value="SignIn"/>
                        </div>
                    </div>  
                </div>


                <div class="col-md-6">
                    <?php
                    if ($this->session->flashdata('gagal')) {
                        echo "<div class='panel-body'>
                    <div class='col-md-12'><div class='alert alert-danger alert-border alert-dismissible fade in bg-danger' role='alert'>";
                        echo "  <h3>GAGAL
      <button type='button' class='close pull-right' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
                         </h3>
                 <p>" . $this->session->flashdata('gagal') . "</p>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>

            <?php echo form_close(); ?>
        </div>

        <!-- end: Content -->
        <!-- start: Javascript -->
        <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery.ui.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

        <script src="<?php echo base_url() ?>assets/js/plugins/moment.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/icheck.min.js"></script>

        <!-- custom -->
        <script src="<?php echo base_url() ?>assets/js/main.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_flat-aero',
                    radioClass: 'iradio_flat-aero'
                });
            });
        </script>
        <!-- end: Javascript -->
    </body>
</html>