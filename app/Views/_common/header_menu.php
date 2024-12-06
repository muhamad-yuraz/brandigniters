<!-- GOOD PRACTICE TO WEB ENGINES -->
<header>
	<nav class="navbar navbar-expand-lg fixed-top">
	  <div class="container mt-3 mb-3">
	    <a class="navbar-brand" href="<?php echo base_url(); ?>">
	      <img src="<?php echo base_url(); ?>public/assets/_imagens/main_logo/brandigniters_all_colored.svg" height="37">
	    </a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarExample-expand-lg" aria-controls="offcanvasNavbarExample-expand-lg">
	      <span class="navbar-toggler-icon" data-bs-target="#offcanvasNavbarExample-expand-lg"></span>
	    </button>
	    <div class="offcanvas offcanvas-end" style="background-color: #282828;" data-bs-hideresize="true" tabindex="-1" id="offcanvasNavbarExample-expand-lg" aria-labelledby="offcanvasNavbarExample-expand-lg">
	    	<div class="offcanvas-header">
                <!-- <h5 class="offcanvas-title" id="offcanvasLabel" style="color:white;">Menu</h5> -->
                <img src="<?php echo base_url(); ?>public/assets/_imagens/main_logo/brandigniters_all-white.svg" height="30">
                <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body d-flex align-items-center text-center">
		        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
		        	<li class="nav-item pb-4 pb-lg-0">
		         		<a class="nav-link t20-px text-uppercase menu-item-color <?php if(current_url() == base_url().'index.php/sobre'){ echo 'bolden-menu-item'; }  ?>" aria-current="page" href="<?php echo base_url('sobre'); ?>">Sobre</a>
		        	</li>
		        	<li class="nav-item pb-4 pb-lg-0">
		          		<a class="nav-link t20-px text-uppercase menu-item-color <?php if(current_url() == base_url().'index.php/servicos'){ echo 'bolden-menu-item'; }  ?>" href="<?php echo base_url('servicos'); ?>">Serviços</a>
		        	</li>
		        	<li class="nav-item">
		          		<a class="nav-link t20-px text-uppercase menu-item-color" href="#">Produtos</a>
		        	</li>
		      	</ul>
		      	<div class="d-flex d-none d-lg-block">
		      		<a href="<?php echo base_url('contactos') ?>" class="btn btn-bi-red text-uppercase t15-px">Contacte-nos</a>
		      	</div>
	      	</div>
	      	<div style="max-height: 100px; min-height: 100px; border-top: 1px solid rgba(255, 255, 255, .3);" class="d-flex justify-content-center order-2 w-100 d-lg-none">
                <div class="align-self-center w-75 mt-3 mb-3">
                    <a href="<?php echo base_url('contactos') ?>?" class="btn form-control btn-bi-red-outlined-alt text-uppercase t15-px hnd-b"><i class="fa-solid fa-phone-volume pe-2"></i> Contacte-nos</a>
                </div>
            </div>
	    </div>
	  </div>
	</nav>
</header>