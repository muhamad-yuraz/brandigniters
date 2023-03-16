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
	<?php echo view('_front-pages/_index/hero'); ?>

	<!-- SERVICOS -->
	<?php echo view('_front-pages/_index/servicos'); ?>

    <!-- CLIENTES -->
    <?php echo view('_front-pages/_index/clientes'); ?>

    <!-- VANTAGENS -->
    <?php echo view('_front-pages/_index/vantagens'); ?>

    <div style="height: 2000px;"></div>
</section>

<!-- FOOTER:INFO + COPYRIGHTS -->
<footer>
</footer>

<!-- INCLUDE COMMON HEADER SCRIPTS-->
    <?php echo view('_common/footer_scripts'); ?>
</body>
</html>