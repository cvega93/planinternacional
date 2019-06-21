		<div class="clearfix"></div>
		<section class="texto-pie" style="background-color: <?php echo $campania['color_fondo_cuarto_contenido']; ?>;">
			<div class="container">
				<div class="col-md-12 reset-total hidden-xs">
					<h1><img src="<?php echo base_url(); ?>uploads/<?php echo $campania['fondo_cuarto_contenido']; ?>"></h1>
				</div>
				<div class="col-xs-12 reset-total hidden-sm hidden-md hidden-lg">
					<h1 class="texto-pie2"><img src="<?php echo base_url(); ?>uploads/<?php echo $campania['fondo_cuarto_contenido_responsive']; ?>"></h1>
				</div>
			</div>
		</section>

		<footer id="foooter">
			<div class="container">
				<div class="col-sm-6 col-md-offset-1 col-md-5 datos-footer">
					<h5><?php echo $campania['titulo']; ?></h5>
					<ul>
						<li><i class="fas fa-envelope"></i> <a href="mailto:<?php echo $campania['email_contacto']; ?>"><?php echo $campania['email_contacto']; ?></a></li>
						<li><i class="fas fa-phone"></i> <?php echo $campania['telefono']; ?></li>
						<li><i class="fas fa-map-marker-alt"></i> <?php echo $campania['direccion']; ?></li>
					</ul>
					<h5><a<?php if($campania['destino_enlace'] != ''): ?> href="<?php echo $campania['destino_enlace']; ?>" target="_blank"<?php else: ?> href="javascript:;"<?php endif; ?> class="link-foot2"><?php echo $campania['titulo_enlace']; ?> <i class="fas fa-arrow-circle-right"></i></a></h5>
					<div class="col-md-12 copyright reset-total">
						<h5 class="link-foot2">Síguenos en:</h5>
						<ul class="social-footer">
							<?php foreach($this->redes_sociales as $key => $value): ?>
							<?php if($campania[$value] != ''): ?>
							<li><a href="<?php echo $campania[$value] ?>" target="_blank" class=""><i class="fab fa-<?php echo $key; ?>"></i></a></li>
							<?php endif; ?>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-md-5 datos-footer">
					<h5><?php echo $campania['titulo_programas']; ?></h5>
					<ul>
						<?php foreach($programas as $key => $value): ?>
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
						<?php foreach($aliados as $key => $value): ?>
							<li><img src="<?php echo base_url(); ?>uploads/<?php echo $value['imagen']; ?>" title="<?php echo $value['titulo']; ?>" alt="<?php echo $value['titulo']; ?>" class="aliados"></li>
						<?php endforeach; ?>
					</ul>
				</div>				
			</div>
		</footer>

		<!--SCRIPT IMPORTANTE-->
		<script src="<?php echo backend_view(); ?>js/jquery-1.7.2.min.js"></script>
		<script src="<?php echo backend_view(); ?>assets/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
		<script src="<?php echo backend_view(); ?>js/bootstrap.min.js"></script>
		<!--SCRIPT IMPORTANTE-->
		<link href="<?php echo backend_view(); ?>css/validationEngine.jquery.css" rel="stylesheet">
		<script src="<?php echo backend_view(); ?>js/jquery.validationEngine.js"></script>
		<script src="<?php echo backend_view(); ?>js/jquery.validationEngine-es.js"></script>

		<script type="text/javascript">
			$('form').validationEngine();
		</script>

		<!--CAMERA-MASTER-->
		<script type="text/javascript" src="<?php echo base_view();?>resources/camera_master/scripts/jquery.mobile.customized.min.js"></script>
		<script type="text/javascript" src="<?php echo base_view();?>resources/camera_master/scripts/jquery.easing.1.3.js"></script> 
		<script type="text/javascript" src="<?php echo base_view();?>resources/camera_master/scripts/camera.min.js"></script> 

		<script type="text/javascript">
			$('#myCarousel').carousel({
			  autoplay: false,
			  interval: 1000 * 11
			});

			$('#myCarousel4').carousel({
			  autoplay: false,
			  interval: 1000 * 5
			});
		</script>

		<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script>
			$(function() {
			  $("#slider-range").slider({
			  	orientation: "vertical",
			  	disabled: true,
			    range: true,
			    min: 0,
			    max: 5,
			    values: [0, <?php echo $campania['meta']; ?>],
			    slide: function(event, ui) {
			      $("#amount_min").val(ui.values[0]);
			      $("#amount_max").val(ui.values[1]);
			    }
			  });
			});
		</script>

		<script type="text/javascript">
		    $(document).on("scroll", function() {

		    if($(document).scrollTop()>100) {
		        $("header").removeClass("large").addClass("small");
		    } else {
		        $("header").removeClass("small").addClass("large");
		    }
		    
		});
		</script>

		<script>
			jQuery(function(){
				jQuery('#camera_wrap_4').camera({
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

		<!--menu script-->
		<script type="text/javascript">
			$(function() {
			  function slideMenu() {
			    var activeState = $("#menu-container .menu-list").hasClass("active");
			    $("#menu-container .menu-list").animate({right: activeState ? "0%" : "-100%"}, 400);
			  }
			  $("#menu-wrapper").click(function(event) {
			    event.stopPropagation();
			    $("#hamburger-menu").toggleClass("open");
			    $("#menu-container .menu-list").toggleClass("active");
			    slideMenu();

			    $("body").toggleClass("overflow-hidden");
			  });

			  $(".menu-list").find(".accordion-toggle").click(function() {
			    $(this).next().toggleClass("open").slideToggle("fast");
			    $(this).toggleClass("active-tab").find(".menu-link").toggleClass("active");

			    $(".menu-list .accordion-content").not($(this).next()).slideUp("fast").removeClass("open");
			    $(".menu-list .accordion-toggle").not(jQuery(this)).removeClass("active-tab").find(".menu-link").removeClass("active");
			  });
			});
		</script>

		<script type="text/javascript">
			$(document).ready(function(){
			    $( "a.scrollLink" ).click(function( event ) {
			        event.preventDefault();
			        $("html, body").animate({ scrollTop: $($(this).attr("href")).offset().top }, 500);
			    });
			});
		</script>

		<!--CULQI -->
		<script src="https://checkout.culqi.com/v2"></script>

		<script>
			Culqi.publicKey = '<?php echo $this->comercio; ?>';
		</script>

		<script>
			var tipo_pago = 1; var _description = ''; var _moneda = 'PEN'; var _monto = 0; var _formulario = '';

			function validar_documento(elemento, id)
			{
				var value = $(elemento).val();

				if(id == undefined)
				{
					if(value == 3)
					{
						$('#otro_tipo_documento').parent().parent().removeClass('hidden');
						$('#otro_tipo_documento').addClass('validate[required]');
					}
					else
					{
						$('#otro_tipo_documento').parent().parent().addClass('hidden');
						$('#otro_tipo_documento').removeClass('validate[required]');
					}
				}
				else
				{
					if(value == 3)
					{
						$('#otro_tipo_documento_' + id).parent().parent().removeClass('hidden');

						$('#otro_tipo_documento_' + id).addClass('validate[required]');
					}
					else
					{
						$('#otro_tipo_documento_' + id).parent().parent().addClass('hidden');
						$('#otro_tipo_documento_' + id).removeClass('validate[required]');
					}
				}
			}

			function validar_otro_monto(elemento, id)
			{
				var cantidad_apoyo = $(elemento).find('option:selected').attr('data-apoyo');

				console.log(cantidad_apoyo);

				setTimeout(function(){
					$('#cantidad_apoyo_' + id).val(cantidad_apoyo); $('#cantidad_apoyo_' + id).attr('value', cantidad_apoyo);
				}, 100);
				

				if($(elemento).val() == 1)
				{
					$('#demo3_' + id).addClass('in'); $('#otro_monto_' + id).addClass('validate[required, custom[number]<?php if($campania['monto_minimo'] > 0): ?>, min[<?php echo $campania['monto_minimo']; ?>]<?php endif; ?>]');
				}
				else
				{
					$('#demo3_' + id).removeClass('in'); $('#otro_monto_' + id).removeClass('validate[required, custom[number]<?php if($campania['monto_minimo'] > 0): ?>, min[<?php echo $campania['monto_minimo']; ?>]<?php endif; ?>]');

					configurar_monto(elemento);
				}
			}

			function configurar_descripcion(description)
			{
				_description = description;
			}

			function configurar_moneda(moneda)
			{
				_moneda = moneda;
			}

			function configurar_monto(elemento)
			{
				_monto = $(elemento).val();
			}

			function pagar(elemento)
			{
				_formulario = $(elemento).parent().parent().parent('form');

				Culqi.settings({
					title: '<?php echo $campania['titulo']; ?>',
					currency: _moneda,
					description: _description,
					amount: _monto * 100
				});

				if(_formulario != '' && $(_formulario).validationEngine('validate') == true)
		        {
		        	Culqi.open();
		        }
		        else
		        {
		        	return false;
		        }
			}
		</script>

		<script>  
			// Ejemplo: Tratando respuesta con AJAX (jQuery)
			function culqi()
			{
				if(Culqi.error)
				{
					// Mostramos JSON de objeto error en consola
					console.log(Culqi.error);
					alert(Culqi.error.mensaje);
				}
				else
				{
					var token = Culqi.token.id;

					$('.token').val(token); $('.token').attr('value', token);

					setTimeout(function() {
						$(_formulario).submit();
					}, 150);
				}
			};
		</script>	

		<?php if($campania['google_analytics'] != ''): ?>
			<?php echo $campania['google_analytics']; ?>
		<?php endif; ?>
	</body>
</html>