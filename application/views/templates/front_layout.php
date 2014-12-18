<html>

    <head>

        <!-- Title here -->

        <title>:: Restaurant ::</title>

        <link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>public/css/font-awesome.min.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>public/css/form.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/css/jquery-ui.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/css/jquery-ui.structure.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/css/jquery-ui.theme.min.css" rel="stylesheet">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>public/css/flexslider.css"/>

        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>public/css/jquery.fancybox.css"/>

        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>public/css/front.css"/>        

        <link type="text/css" media="screen" href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet">       
        <!--
                <link type="text/css" media="screen" href="<?php echo base_url(); ?>public/css/left_nav.css" rel="stylesheet">       -->

        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,800,700,300" />

        <script>

            var base_url = '<?php echo site_url(); ?>';

            var public_url = '<?php echo base_url() . '/public/'; ?>';

        </script>





    </head>



    <body>

        <div class="wrap-content">

            <?php echo $this->load->view("templates/header"); ?>

            <div class="main-content">

                <?php echo $body; ?>

            </div>

            <?php echo $this->load->view("templates/footer"); ?>

        </div>

        <div class="wrap-left-nav">

            <?php echo $this->load->view("templates/left_nav"); ?>

        </div>



        <script src="<?php echo base_url(); ?>public/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>public/js/tinymce/jquery.tinymce.min.js"></script>
        <script src="<?php echo base_url(); ?>public/js/tinymce/tinymce.min.js"></script>
        <script src="<?php echo base_url(); ?>public/js/jquery-2.1.1.min.js"></script>
        <script src="<?php echo base_url(); ?>public/js/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>public/js/bootstrap-multiselect.js"></script>
        <script src="<?php echo base_url(); ?>public/js/jquery.validate.js"></script>

        <script src="<?php echo base_url(); ?>public/js/jquery.dataTables.min.js"></script>

        <script src="<?php echo base_url(); ?>public/js/jquery.dataTables.bootstrap.js"></script>

        <script src="<?php echo base_url(); ?>public/js/front.js"></script>
        <script src="<?php echo base_url(); ?>public/js/update_order.js"></script>

    </body>	

</html>

