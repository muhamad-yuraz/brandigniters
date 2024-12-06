<!-- BOOTSTRAP 5.3v -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

<!-- PERSONAL JS - ON MENU SCROLL SHOW SHADOW + COLOR BACKGROUD -->
<script type="text/javascript">
	const navEl = document.querySelector('.navbar');
	window.addEventListener('scroll', () =>{
		if(window.scrollY >= 56){
			navEl.classList.add('navbar-scrolled');
		}else{
			navEl.classList.remove('navbar-scrolled');
		}
	});

	window.addEventListener("load", function() {
    	if(window.scrollY >= 56){
			navEl.classList.add('navbar-scrolled');
		}else{
			navEl.classList.remove('navbar-scrolled');
		}
	});
</script>

<!-- JS SLIDER -->
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js"></script>
<script>
	const splide = new Splide('#splide-hero', {
	   type   : 'loop',
	   drag   : 'free',
	   focus  : 'center',
	   padding: { left: '2rem', right: '3rem' },
	   perPage: 4,
	   breakpoints: {
		767: {
			perPage: 2,
		}
  	   },
	   arrows : false,
	   pagination : false,
	   pauseOnHover: false,
	   autoScroll: {
	      speed: -1.5,
	   }
	});

splide.mount(window.splide.Extensions);
</script>

<script type="text/javascript">
	const splide_clientes = new Splide('#splide-clientes', {
	   type   : 'loop',
	   padding: { left: '6rem', right: '4.8rem' },
	   perPage: 4,
	   perMove: 1,
	   gap : "5rem",
	   autoplay: true,
	   breakpoints: {
	   	320: {
			perPage: 1,
			gap : "8rem",
			padding: { left: '5rem', right: '5rem' },
		},
	   	425: {
			perPage: 1,
			gap : "10rem",
			padding: { left: '6rem', right: '4rem' },
		},
		767: {
			perPage: 1,
			gap : "6rem",
			padding: { left: '10rem', right: '0rem' },
		},
		991: {
			perPage: 2,
			gap : "1rem",
			padding: { left: '7rem', right: '0rem' },
		},
		1440: {
			perPage: 3,
			gap : "6rem",
			padding: { left: '5rem', right: '0rem' },
		}
  	   },
	   pagination : false,
	   pauseOnHover: false,
	});

splide_clientes.mount();
</script>