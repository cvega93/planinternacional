<div class="clearfix"></div>
<section class="texto-pie" style="background-color: <?php echo $campania['color_fondo_cuarto_contenido']; ?>;">
	<div class="container">
		<div class="col-md-12 text-center register-unete">
		<h2>ÚNETE</h2>
		<!--[if lte IE 8]>
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
<![endif]-->
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
<!--[if lte IE 8]>
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
<![endif]-->
<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
<script>
  hbspt.forms.create({
    portalId: "4390725",
    formId: "2fca63a8-8e9d-4e2a-be9e-a66fc2894ba5"
});
</script>

		</div>
	</div>
	<div class="container">
		<div class="col-md-12 reset-total hidden-xs">
			<h1><img src="<?php echo base_url(); ?>uploads/<?php echo $campania['fondo_cuarto_contenido']; ?>"></h1>
		</div>
		<div class="col-xs-12 reset-total hidden-sm hidden-md hidden-lg">
			<h1 class="texto-pie2"><img
					src="<?php echo base_url(); ?>uploads/<?php echo $campania['fondo_cuarto_contenido_responsive']; ?>">
			</h1>
		</div>
	</div>
</section>

<footer id="foooter">
	<div class="container">
		<div class="col-sm-6 col-md-offset-1 col-md-5 datos-footer">
			<h5><?php echo $campania['titulo']; ?></h5>
			<ul>
				<li><i class="fas fa-envelope"></i> <a href="mailto:<?php echo $campania['email_contacto']; ?>"><?php echo $campania['email_contacto']; ?></a>
				</li>
				<li><i class="fas fa-phone"></i> <?php echo $campania['telefono']; ?></li>
				<li><i class="fas fa-map-marker-alt"></i> <?php echo $campania['direccion']; ?></li>
			</ul>
			<h5>
				<a<?php if ($campania['destino_enlace'] != ''): ?> href="<?php echo $campania['destino_enlace']; ?>" target="_blank"<?php else: ?> href="javascript:;"<?php endif; ?>
					class="link-foot2"><?php echo $campania['titulo_enlace']; ?> <i
						class="fas fa-arrow-circle-right"></i></a></h5>
			<div class="col-md-12 copyright reset-total">
				<h5 class="link-foot2">Síguenos en:</h5>
				<ul class="social-footer">
					<?php foreach ($this->redes_sociales as $key => $value): ?>
						<?php if ($campania[$value] != ''): ?>
							<li><a href="<?php echo $campania[$value] ?>" target="_blank" class=""><i
										class="fab fa-<?php echo $key; ?>"></i></a></li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
		<div class="col-sm-6 col-md-5 datos-footer">
			<h5><?php echo $campania['titulo_programas']; ?></h5>
			<ul>
				<?php foreach ($programas as $key => $value): ?>
					<li><strong><?php echo $value['titulo']; ?>:</strong> <?php echo $value['direccion']; ?></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
	<div class="container">
		<hr>
		<div class="col-md-12">
			<ul class="aliados-cont">
				<li><h5 style="color: #58cae7"><?php echo $campania['titulo_aliados']; ?></h5></li>
				<?php foreach ($aliados as $key => $value): ?>
					<li><img src="<?php echo base_url(); ?>uploads/<?php echo $value['imagen']; ?>"
							 title="<?php echo $value['titulo']; ?>" alt="<?php echo $value['titulo']; ?>"
							 class="aliados"></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</footer>

<!--SCRIPT IMPORTANTE-->
<script src="<?php echo backend_view(); ?>js/jquery-1.7.2.min.js"></script>
<script src="<?php echo backend_view(); ?>js/bootstrap.min.js"></script>
<!--CULQI -->
<script src="https://checkout.culqi.com/js/v3"></script>

<!--SCRIPT IMPORTANTE-->
<!--<link href="--><?php //echo backend_view(); ?><!--css/validationEngine.jquery.css" rel="stylesheet">-->
<!--<script src="--><?php //echo backend_view(); ?><!--js/jquery.validationEngine.js"></script>-->
<!--<script src="--><?php //echo backend_view(); ?><!--js/jquery.validationEngine-es.js"></script>-->
<!---->


<!--CAMERA-MASTER-->
<!--<script type="text/javascript"-->
<!--		src="--><?php //echo base_view(); ?><!--resources/camera_master/scripts/jquery.mobile.customized.min.js"></script>-->
<!--<script type="text/javascript"-->
<!--		src="--><?php //echo base_view(); ?><!--resources/camera_master/scripts/jquery.easing.1.3.js"></script>-->
<script src="<?php echo backend_view(); ?>assets/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_view(); ?>resources/camera_master/scripts/camera.min.js"></script>

<!--slick-->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!--<script type="text/javascript">-->
<!--	// $('form').validationEngine();-->
<!--</script>-->



<!--menu script-->
<script type="text/javascript">
	$(function () {
  $('[data-toggle="tooltip"]').tooltip({
	tooltipClass: "message",
  })
})
	$(function () {

		$("a.scrollLink").click(function (event) {
			event.preventDefault();
			$("html, body").animate({scrollTop: $($(this).attr("href")).offset().top}, 500);
		});

		$('#myCarousel').carousel({
			autoplay: false,
			interval: 1000 * 11
		});

		$("#slider-range").slider({
			orientation: "vertical",
			disabled: true,
			range: true,
			min: 0,
			max: 5,
			values: [0, 1],
			slide: function (event, ui) {
				$("#amount_min").val(ui.values[0]);
				console.log(ui.values[0])
				$("#amount_max").val(ui.values[1]);
			}
		});

		$('.slider-mensual').slick({
  			dots: false,
			arrows:false,
  			infinite: false,
  			speed: 300,
  			slidesToShow: 4,
  			slidesToScroll: 4,
  			responsive: [
    			{
      			breakpoint: 1024,
     			settings: {
        		slidesToShow: 3,
        		slidesToScroll: 3,
        		infinite: true,
        		dots: true
      			}
    			},
    			{
      			breakpoint: 600,
      			settings: {
        		slidesToShow: 2,
        		slidesToScroll: 2,
				infinite: true,
				arrows: true,
            	prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
            	nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
      			}
   				 },
    			{
      			breakpoint: 480,
      			settings: {
        		slidesToShow: 1,
        		slidesToScroll: 1,
				infinite: true,
				arrows: true,
            	prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
            	nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
      			}
    			}
    			// You can unslick at a given breakpoint now by adding:
    			// settings: "unslick"
    			// instead of a settings object
  				]
				});
				$('.slider-mensual-2').slick({
  			dots: false,
			arrows:false,
  			infinite: false,
  			speed: 300,
  			slidesToShow: 4,
  			slidesToScroll: 4,
  			responsive: [
    			{
      			breakpoint: 1024,
     			settings: {
        		slidesToShow: 3,
        		slidesToScroll: 3,
        		infinite: true,
        		dots: true
      			}
    			},
    			{
      			breakpoint: 600,
      			settings: {
        		slidesToShow: 2,
        		slidesToScroll: 2,
				infinite: true,
				arrows: true,
            	prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
            	nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
      			}
      			},
    			{
      			breakpoint: 480,
      			settings: {
        		slidesToShow: 1,
        		slidesToScroll: 1,
				infinite: true,
				arrows: true,
            	prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
            	nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
      			}
    			}
    			// You can unslick at a given breakpoint now by adding:
    			// settings: "unslick"
    			// instead of a settings object
  				]
				});

		$('#myCarousel4').carousel({
			autoplay: false,
			interval: 1000 * 5
		});

		$(document).on("scroll", function () {
			if ($(document).scrollTop() > 100) {
				$("header").removeClass("large").addClass("small");
			} else {
				$("header").removeClass("small").addClass("large");
			}
		});

		function slideMenu() {
			var activeState = $("#menu-container .menu-list").hasClass("active");
			$("#menu-container .menu-list").animate({right: activeState ? "0%" : "-100%"}, 400);
		}

		$("#menu-wrapper").click(function (event) {
			event.stopPropagation();
			$("#hamburger-menu").toggleClass("open");
			$("#menu-container .menu-list").toggleClass("active");
			slideMenu();

			$("body").toggleClass("overflow-hidden");
		});

		$(".menu-list").find(".accordion-toggle").click(function () {
			$(this).next().toggleClass("open").slideToggle("fast");
			$(this).toggleClass("active-tab").find(".menu-link").toggleClass("active");

			$(".menu-list .accordion-content").not($(this).next()).slideUp("fast").removeClass("open");
			$(".menu-list .accordion-toggle").not(jQuery(this)).removeClass("active-tab").find(".menu-link").removeClass("active");
		});
	});
</script>

<script type="text/javascript">
	var tipo_pago = 1;
	var _description = '';
	var _moneda = 'PEN';
	var _monto = 0;
	var _formulario = '';
	//Culqi.publicKey = '<?php //echo $this->comercio; ?>//';
	Culqi.publicKey = 'pk_test_CoIGsODjHdYb2fIX';

	$(document).ready(function () {
		$('#formularioPago').on('submit', function (e) {
			// pagar(e, false);
		});

	});

	function validar_documento(elemento, id){
		var value = $(elemento).val();

		if (id == undefined) {
			if (value == 3) {
				$('#otro_tipo_documento').parent().parent().removeClass('hidden');
				$('#otro_tipo_documento').addClass('validate[required]');
			} else {
				$('#otro_tipo_documento').parent().parent().addClass('hidden');
				$('#otro_tipo_documento').removeClass('validate[required]');
			}
		} else {
			if (value == 3) {
				$('#otro_tipo_documento_' + id).parent().parent().removeClass('hidden');

				$('#otro_tipo_documento_' + id).addClass('validate[required]');
			} else {
				$('#otro_tipo_documento_' + id).parent().parent().addClass('hidden');
				$('#otro_tipo_documento_' + id).removeClass('validate[required]');
			}
		}
	}
	function validar_otro_monto(elemento, id) {
		var monto_minimo_1 = <?php echo $campania['monto_minimo_1']; ?>;
		var monto_minimo_2 = <?php echo $campania['monto_minimo_2']; ?>;

		var cantidad_apoyo = $(elemento).find('option:selected').attr('data-apoyo');

		$('.monto_minimo').addClass('hidden');

		setTimeout(function () {
			$('#cantidad_apoyo_' + id).val(cantidad_apoyo);
			$('#cantidad_apoyo_' + id).attr('value', cantidad_apoyo);

		}, 10);

		var _class = 'validate[required, custom[number]';

		if (_moneda == 'PEN') {
			if (monto_minimo_1 > 0) {
				_class += ', min[' + monto_minimo_1 + ']';

				setTimeout(function () {
					$('.monto_minimo_PEN').removeClass('hidden');
				}, 10);
			}
		} else {
			if (monto_minimo_2 > 0) {
				_class += ', min[' + monto_minimo_2 + ']';
				setTimeout(function () {
					$('.monto_minimo_USD').removeClass('hidden');
				}, 10);
			}
		}

		if ($(elemento).val() == 1) {
			$('#demo3_' + id).addClass('in');
			$('#otro_monto_' + id).addClass(_class);
		} else {
			$('#demo3_' + id).removeClass('in');
			$('#otro_monto_' + id).removeAttr('class').addClass('form-control');

			configurar_monto(elemento);
		}
	}
	function configurar_descripcion(description) {
		_description = description;
	}
	function configurar_moneda(moneda) {
		$('.monto_minimo').addClass('hidden');
		_moneda = moneda;

		setTimeout(function () {
			$('.monto_minimo_' + moneda).removeClass('hidden');
			$('#monto_total_1, #monto_total_2').val('');

			$('#demo3_1, #demo3_2').removeClass('in');
			$('#otro_monto_1, #otro_monto_2').removeAttr('class').addClass('form-control');
		}, 10);
	}
	function configurar_monto(elemento) {
		_monto = $(elemento).val();
	}

	/**TODO: Enviar formulario antes de mostrar form de culqi*/
	function pagar() {
		// alert('stamos');;
		// _formulario = $(elemento).parent().parent().parent('form');
		// var id = $(_formulario).attr('data-id');
		// let moneda = $("input[name='tipo_moneda']:checked").val();
		let moneda = $("input[name='tipo_moneda']:checked").val();
		let tipo_donacion = String($("input[name='tipo_pago']:checked").val());
		let monto = $('#monto_pagar').val();
		let email = $('#email').val();
		let description = tipo_donacion === 1 ? "DONACIÓN ÚNICA" : "DONACIÓN MENSUAL";
		console.log(tipo_donacion)
		let settings = {
			title: '<?php echo $campania['titulo']; ?>',
			currency: moneda,
			description: description,
			culqiEmail: email,
			amount: monto * 100
		};

		console.log(settings);
		Culqi.settings(settings);
		// send_form(false, true);
		Culqi.open();

		// culqi();
	}

	function culqi() {
		console.log(Culqi);
		if (Culqi.error) {
			// Mostramos JSON de objeto error en consola
			console.log(Culqi.error);
			alert(Culqi.error.mensaje);
		} else {
			// alert('aca tamos crj');
			var token = Culqi.token.id;
			$('.token').val(token);
			$('.token').attr('value', token);
			console.log(token);
			setTimeout(function () {
				send_form();
			}, 150);
		}
	}
	function send_form(event, post) {
		// if (!post) event.preventDefault()
		$("#formularioPago").submit();
	}
</script>


<script>
	$(function () {
		$('#camera_wrap_4').camera({
			time: 8000,
			height: 'auto',
			loader: false,
			pagination: true,
			thumbnails: false,
			navigation: false,
			hover: false,
			autoplay: false,
			opacityOnGrid: false,
			imagePath: '../images/'
		});

	});
</script>
<?php if ($campania['google_analytics'] != ''): ?>
	<?php echo $campania['google_analytics']; ?>
<?php endif; ?>
</body>
</html>
