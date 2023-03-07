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

<!-- CONTENT -->
<section>
    <div style="height: 2000px; background-color: #FDFDFD;"></div>
</section>

<!-- FOOTER:INFO + COPYRIGHTS -->
<footer>
</footer>

<!-- INCLUDE COMMON HEADER SCRIPTS-->
    <?php echo view('_common/footer_scripts'); ?>
</body>
</html>