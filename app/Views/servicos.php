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
    
    <!-- STYLES -->
</head>

<body>

<!-- INCLUDE HEADER -->
<?php echo view('_common/header_menu'); ?>

<!-- MAIN PAGE CONTENT -->
<section>
    
    <!-- HERO -->
    <?php echo view('_front-pages/_servicos/hero'); ?>

    <!-- CARDS -->
    <?php echo view('_front-pages/_servicos/cards'); ?>

</section>

<!-- FOOTER:INFO + COPYRIGHTS -->
<div class="bg-bi-black footer-border-radius">
    <?php echo view('_common/footer_menu'); ?>
</div>

<!-- INCLUDE COMMON HEADER SCRIPTS-->
    <?php echo view('_common/footer_scripts'); ?>
</body>
</html>