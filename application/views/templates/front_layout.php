<html>
    <head>
        <script>

            var base_url = '<?php echo site_url(); ?>';

            var public_url = '<?php echo base_url() . '/public/'; ?>';

        </script>
        <title><?php
            if (!empty($title))
                echo $title;
            else
                echo 'Cya fun';
            ?>
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link href="<?php echo base_url(); ?>public/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/mystyle.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/flexslider.css"/>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>public/js/jquery.validate.js"></script>

        <script src="<?php echo base_url(); ?>public/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>public/js/tinymce/tinymce.min.js"></script>
        <script src="<?php echo base_url(); ?>public/js/jquery.dataTables.bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>public/js/bootstrap-multiselect.js"></script>
        <script src="<?php echo base_url(); ?>public/js/mystyle.js"></script>
        <script src="<?php echo base_url(); ?>public/js/front.js"></script>
        <script src="<?php echo base_url(); ?>public/js/jquery.flexslider.js"></script>
        <script src="<?php echo base_url(); ?>public/js/modernizr.js"></script>

    </head>
    <body class="cya-body">
        <div class="cya-container">
                <?php echo $this->load->view("templates/header"); ?>

            <div class="body group">
            <?php echo $body; ?>
            </div>

<?php echo $this->load->view("templates/footer"); ?>

        </div>
    </body>
</html>
