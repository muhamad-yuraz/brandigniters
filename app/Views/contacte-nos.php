<!DOCTYPE html>

<html lang="en">
<head>

	<!-- BASIC META DATA-->
    <meta charset="UTF-8">
    <title><?php echo $header_title; ?></title>
    <meta name="description" content="<?php echo $header_desciption; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- INCLUDE COMMON HEADER LINKS-->
    <?php echo view('_common/header_links'); ?>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#exampleModal").modal('show');
        });
    </script>
    
    <!-- STYLES -->
</head>

<body>

    <div id="coverAll">
        <div class="coverContent">
            <img src="<?php echo base_url(); ?>public/assets/_imagens/loading/brandigniters-loading-animation.gif"/>
        </div>
    </div>

<!-- INCLUDE HEADER -->
<?php echo view('_common/header_menu'); ?>

<!-- MAIN PAGE CONTENT -->
<section>
    <!-- HERO -->
    <?php echo view('_front-pages/_contacte-nos/hero'); ?>

    <!-- FORM / SOCIAL MEDIA ADDRESS / OTHER -->
    <?php echo view('_front-pages/_contacte-nos/form'); ?>

</section>

<!-- FOOTER:INFO + COPYRIGHTS -->
<div class="bg-bi-black footer-border-radius">
    <?php echo view('_common/footer_menu'); ?>
</div>

<!-- INCLUDE COMMON FOOTER SCRIPTS-->
    <?php echo view('_common/footer_scripts'); ?>
</body>
</html>











