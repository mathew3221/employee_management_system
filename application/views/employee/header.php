<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>EMS</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="<?php echo base_url()?>assets/img/mjlogo.png"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="<?php echo base_url()?>assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["<?php echo base_url()?>assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/plugins.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/demo.css" />


    <!--   Core JS Files   -->
    <script src="<?php echo base_url()?>assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/core/popper.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="<?php echo base_url()?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url()?>assets/js/plugin/datatables/datatables.min.js"></script>
    <!-- Kaiadmin JS -->
    <script src="<?php echo base_url()?>assets/js/kaiadmin.min.js"></script>
    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="<?php echo base_url()?>assets/js/setting-demo2.js"></script>    

  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      