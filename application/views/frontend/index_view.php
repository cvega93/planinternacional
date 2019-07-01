<?php $this->load->view("frontend/templates/head_view"); ?>
	<body>
<?php $message = $this->session->flashdata('message'); ?>

<?php $this->load->view("frontend/templates/header_view"); ?>
	<style type="text/css">
		@media only screen and (max-width: 991px) {
			.cont-video {
				background-image: url(<?php echo base_url(); ?>uploads/<?php echo $campania['fondo_video_responsive']; ?>) !important;
			}

			.ctn-estad {
				background-image: url(<?php echo base_url(); ?>uploads/<?php echo $campania['fondo_estadisticas_responsive']; ?>) !important;
			}
		}

		<?php if(@$message['type'] == 'success'): ?>
		@media screen and (max-width: 1920px) {
			.img-ninas3 {
				padding-bottom: 590px;
			}
		}

		<?php endif; ?>

	</style>

<?php if (isset($banners) AND count($banners) > 0): ?>
	<div class="fluid_container clearfix" id="acercade">
		<div class="banner-img" id="">
			<div class="banner-img" style="background:url('<?php echo base_url(); ?>uploads/<?php echo $banners[1]['imagen_fondo']; ?>')center center no-repeat;"
				 data-src="<?php echo base_url(); ?>uploads/<?php echo $banners[1]['imagen_fondo']; ?>">
				<div class="container cont-rsp">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 reset-total">
							<div class="contenedor-texto">
								<div class="col-xs-12 col-sm-12 col-md-12 img_banner1 reset-total">
									<img src="<?php echo base_url(); ?>uploads/<?php echo $banners[1]['logo']; ?>"
										 title="<?php echo $campania['titulo']; ?>"
										 alt="<?php echo $campania['titulo']; ?>"/>
								</div>
								<div
									class="col-xs-12 col-sm-12 col-md-<?php echo ($banners[1]['imagen_derecha'] != '') ? '6' : '4'; ?> reset-total texto_banner1">
									<img
										src="<?php echo base_url(); ?>uploads/<?php echo $banners[1]['imagen_izquierda']; ?>"
										title="" alt=""/>
									<?php if ($banners[1]['enlace'] != ''): ?>
										<a href="<?php echo $banners[1]['enlace']; ?>" class="btn-banner scrollLink"><img
												src="<?php echo base_url(); ?>uploads/15531909711.png"></a>
									<?php endif; ?>
								</div>

								<?php if ($banners[1]['imagen_derecha'] != ''): ?>
									<div class="col-xs-12 col-sm-6 col-md-6 nina-banner2 reset-total">
										<img
											src="<?php echo base_url(); ?>uploads/<?php echo $banners[1]['imagen_derecha']; ?>"
											title="" alt=""/>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

	<section class="cont-back1" id="tipodedonaciones"
			 style="background-image: url(<?php echo base_url(); ?>uploads/<?php echo $campania['fondo_primer_contenido']; ?>); background-color:<?php echo $campania['color_fondo_primer_contenido']; ?>;">
		<div class="container">
			<div class="col-xs-12 col-sm-12 col-md-5 reset-total-rsp">
				<div class="col-xs-12 col-sm-12 col-md-12 reset-total-rsp">
					<img src="<?php echo base_url(); ?>uploads/<?php echo $campania['primera_imagen'] ?>">
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 reset-total">
					<!-- div class="col-xs-12 col-sm-12 col-md-4 ctn-llave visible-lg">
						<img src="<?php echo base_url(); ?>uploads/<?php echo $campania['fondo_video']; ?>" />
					</div -->
					<div class="col-xs-12 col-sm-12 col-md-9 bg-info-b">
						<img src="<?php echo base_url(); ?>uploads/<?php echo $campania['segunda_imagen']; ?>"/>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-7 reset-total-rsp">
				<div class="col-xs-12 col-sm-12 col-md-12 cont-video"
					 style="background-image:url(<?php echo base_url(); ?>uploads/<?php echo $campania['fondo_video']; ?>);">
					<iframe width="100%" height="" src="//www.youtube.com/embed/<?php echo $campania['video']; ?>"
							frameborder="0"
							allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
							allowfullscreen></iframe>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="cont-test">
						<h2>Testimonios</h2>

						<div id="myCarousel" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<?php foreach ($testimonios as $key => $value): ?>
									<li data-target="#myCarousel"
										data-slide-to="<?php echo $key; ?>"<?php echo ($key == 0) ? ' class="active"' : ''; ?>></li>
								<?php endforeach; ?>
							</ol>

							<div class="carousel-inner bg-testimonios"
								 style="background-image: url(<?php echo base_url(); ?>uploads/<?php echo $campania['fondo_testimonios']; ?>);">
								<?php foreach ($testimonios as $key => $value): ?>
									<div class="item <?php echo ($key == 0) ? 'active' : ''; ?>">
										<div class="carousel-caption">
											<p><?php echo nl2br($value['comentario']); ?></p>
											<div class="detail-test">
												<span class="name-nina"><?php echo $value['titulo']; ?></span>
												<span
													class="age-nina"><?php echo $value['edad']; ?> años, <?php echo $value['ubicacion']; ?></span>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>

	<div class="medio-info-1"
		 style="background-image: url(<?php echo base_url(); ?>uploads/<?php echo $campania['primer_separador_contenido']; ?>);"></div>

	<section class="cont-back2" id="donaryserparte"	 style="">
		<div class="container">
		  <div class="row">
			<div class="col-xs-12 text-center title-section-2">
			  <h2>¿Cómo abrir las <strong> puertas </strong> de su futuro?</h2>
			</div>
		  </div>
		  <div class="row amount">
		  	<div class="col-xs-12 col-md-offset-2 col-md-10 d-flex">
			  <div class="col-25 d-flex"><h5>S/.35</h5></div>
			  <div class="col-25 d-flex"><h5>S/.50</h5></div>
			  <div class="col-25 d-flex"><h5>S/.100</h5></div>
			  <div class="col-25 d-flex"><h5>S/.200</h5></div>
			</div>
		  </div>
		  <div class="row d-flex">
		  	<div class="col-xs-12 col-md-2 text-center text-donacion d-flex">
			  <h3>DONACIÓN <br> ÚNICA</h3>
			</div>
			<div class="col-xs-12 col-md-10 text-center">
			 <div class="row slider-mensual">
			  <div class="">
			  	<div class="d-flex">
				 <img src="<?php echo base_url(); ?>uploads/nina-mouse.png"/>
				 <div class="text-line-2">
				 	<p>Capacitación en <br><strong>habilidades digitales</strong></p>
				 </div>
				 <div class="text-line-num">
					<h5>S/.35</h5>
				 </div>
			    </div>	
			  </div>
			  <div>
			  	<div class="d-flex">
				  <img src="<?php echo base_url(); ?>uploads/nina-sube.png"/>
				  <div class="text-line-2">
				 	<p>Capacitación en <br><strong>educación financiera</strong></p>
				 </div>
				 <div class="text-line-num">
					<h5>S/.50</h5>
				 </div>
				</div>
			  </div>
			  <div>
			   <div class="d-flex">
				<img src="<?php echo base_url(); ?>uploads/nina-habilidades.png"/>
				<div class="text-line-2">
				 	<p>Capacitación en <strong>habilidades</strong> <br><strong>sociales y plan de vida</strong></p>
				 </div>
				 <div class="text-line-num">
					<h5>S/.100</h5>
				 </div>
			   </div>
			  </div>
			  <div>
			   <div class="d-flex">
				<img src="<?php echo base_url(); ?>uploads/nina-liderazgo.png"/>
				<div class="text-line-2">
				 	<p>Capacitación en liderazgo <br><strong>sociales y plan de vida</strong></p>
				 </div>
				 <div class="text-line-num">
					<h5>S/.200</h5>
				 </div>
			   </div>
			  </div> 
			</div>
			</div>
		  </div>
		  <div class="row text-center">
			<div class="col-xs-12 col-md-offset-2 col-md-7 text-line text-left">
			  <p>*FORMACIÓN EN LIDERAZGO, EDUCACIÓN FINANCIERA, USO DE 
			     HERRAMIENTAS DIGITALES Y DESARROLLO DE PROYECTO DE VIDA</p>
			</div>
		  </div>
		  <div class="row d-flex">
		  	<div class="col-xs-12 col-md-2 text-center text-donacion d-flex">
			  <h3>DONACIÓN <br>MENSUAL</h3>
			</div>
			<div class="col-xs-12 col-md-10 text-center">
			 <div class="row slider-mensual-2">
			  <div>
			  	<div class="d-flex">
				 <img src="<?php echo base_url(); ?>uploads/1-nina.png"/>
				 <div class="text-line-2">
				 	<p>Formación <span>POR 1 AÑO </span>para:<br><strong>1 NIÑA</strong></p> 
				 </div>
				 <div class="text-line-num">
					<h5>S/.35</h5>
				 </div>
				</div>	 
			  </div>
			  <div>
			   <div class="d-flex">
				  <img src="<?php echo base_url(); ?>uploads/2-ninas.png"/>
				  <div class="text-line-2">
				 	<p>Formación <span>POR 1 AÑO </span> para: <br><strong>2 NIÑAS</strong></p>
				 </div>
				 <div class="text-line-num">
					<h5>S/.50</h5>
				 </div> 
			   </div>
			  </div>
			  <div>
			  <div class="d-flex">
			   <img src="<?php echo base_url(); ?>uploads/4-ninas.png"/>
			   <div class="text-line-2">
				 	<p>Formación <span>POR 1 AÑO </span> para: <br><strong>4 NIÑAS</strong></p>
				</div>
				<div class="text-line-num">
					<h5>S/.100</h5>
				 </div>  
			  </div>
			  </div>
			  <div>
			  	<div class="d-flex">
					<img src="<?php echo base_url(); ?>uploads/6-ninas.png"/>
					<div class="text-line-2">
				 		<p>Formación <span>POR 1 AÑO </span> para: <br><strong>6 NIÑAS</strong></p>
					 </div>
					<div class="text-line-num">
					<h5>S/.200</h5>
				 	</div> 
			    </div> 
			  </div>
			</div>
		  </div>
		</div>
	</section>

	<!--div class="medio-info-2"></div-->

	<section class="cont-back3" id="contactanos"
			 style="background-image: url(<?php echo base_url(); ?>uploads/<?php echo $campania['fondo_tercer_contenido']; ?>);">
		<div class="img-ninas3">
			<div class="container">
				<div class="col-xs-12 col-sm-12 col-md-12 cont-rsp-padd">
					<div class="col-xs-12 col-sm-12 col-md-10 ctn-formulario">
						<div class="col-md-12 reset-total cont-form-don">
							<h3><?php echo $campania['dona']; ?></h3>
							<span style="font-size: 18px;"><?php echo $campania['subtitulo_dona']; ?>
							</span>
						</div>
						<div class="clearfix"></div>
						<div class="tab-content bg-formulario">
							<div id="unete" class="tab-pane fade in active">
								<form method="POST" action="<?php echo base_url(); ?>checkout" id="formularioPago">

									<input type="hidden" name="descripcion" id="" value=""/>
									<input type="hidden" name="cantidad_apoyo" id=""/>
									<input type="hidden" name="token" class="token"/>
									<div class="col-md-4 ctn-doc">
										<div class="col-xs-12 col-sm-12 col-md-12 reset-total">
											<h5>Tipo de donación :</h5>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<label class="container-check">
													Mensual
													<input type="radio" name="tipo_pago" id="d1" value="2" />
													<span class="checkmark"></span>
												</label>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<label class="container-check">
													Única
													<input type="radio" name="tipo_pago" id="d2" value="1"/>
													<span class="checkmark"></span>
												</label>
											</div>
										</div>
										<hr><br><br><br>
										<div class="col-xs-12 col-sm-12 col-md-12 reset-total">
											<h5>Tipo de moneda:</h5>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<label class="container-check">
													Soles
													<input type="radio"
														   name="tipo_moneda"
														   id="soles"
														   value="PEN"
														   />
													<span class="checkmark"></span>
												</label>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<label class="container-check">
													Dólares
													<input type="radio"
														   name="tipo_moneda"
														   id="dolares"
														   value="USD" />
													<span class="checkmark"></span>
												</label>
											</div>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-12 reset-total">
											<div class="cont-select">
												<select name="monto_total" class="validate[required]"
														id="monto_pagar">
													<option value="" disabled="disabled" selected="selected">
														Monto a donar
													</option>
													<option data-apoyo="" value="30" class="color-2">30.00</option>
													<option data-apoyo="" value="50" class="color-2">50.00</option>
													<option data-apoyo="" value="100" class="color-2">100.00</option>
													<option value="1" data-apoyo="0" class="color-2">Otro Monto</option>
												</select>
											</div>
											<div id="demo3_<?php echo $key; ?>" class="collapse">
												<div class="col-md-12 ctn-doc reset-total">
													<div class="col-md-12 reset-total">
														<p>Otro Monto</p>
													</div>
													<div class="form-group camp-obli">
														<input type="number" class="form-control"
															   onchange="javascript:configurar_monto(this);"
															   name="otro_monto" placeholder="Monto"
															   id="otro_monto_<?php echo $key; ?>"/>
														<?php if ($campania['monto_minimo'] > 0): ?>
															<p>Monto mínimo <?php echo $campania['monto_minimo']; ?></p>
														<?php endif; ?>
													</div>
												</div>
											</div>
										</div>
										<hr class="hr-1">
									</div>
									<div class="col-md-4 personal-info">
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group reset-total">
											<label>*</label>
											<input type="text"
												   class="form-control validate[required]"
												   placeholder="Nombre(s)" id="nombres_<?php echo $key; ?>"
												   name="nombres"/>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group reset-total">
											<label>*</label>
											<input type="text"
												   class="form-control validate[required, custom[onlyLetterSp]]"
												   placeholder="Apellido(s)" id="apellido_paterno_<?php echo $key; ?>"
												   name="apellido_paterno"/>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group reset-total">
											<label>*</label>
											<input type="text" class="form-control validate[required, custom[email]]"
												   placeholder="Email" id="email" name="email"/>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group reset-total">
											<label>*</label>
											<input type="number" class="form-control validate[required, custom[phone]]"
												   placeholder="Celular/Teléfono" id="celular_<?php echo $key; ?>"
												   name="celular"/>
										</div>
										<hr class="hr-1">
									</div>
									<div class="col-xs-12 col-sm-12 col-md-4 ctn-doc">
										<div class="col-xs-12 col-sm-12 col-md-12 reset-total">
											<div class="cont-select">
												<select name="tipo_documento"
														class="validate[required]"
														id="documento">
													<option value="" disabled="disabled" selected="selected">
														Tipo de documento
													</option>
													<option data-apoyo="" value="dni" class="color-2">DNI</option>
													<option data-apoyo="" value="pasaporte" class="color-2">Pasaporte</option>
													<option data-apoyo="" value="ce" class="color-2">CE</option>
													<option value="otro" data-apoyo="0" class="color-2">Otro</option>
												</select>
											</div>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-12 reset-total">
											<div class="form-group">
												<input type="text"
													   class="form-control validate[required]"
													   name="numero_documento" id="numero_documento_<?php echo $key; ?>"
													   placeholder="Número de documento">
											</div>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-12 reset-total">
											<div class="cont-select" style="overflow:visible;">
												<select name="pais" class="validate[required]"
														id="pais_<?php echo $key; ?>">
													<option value="" disabled="disabled" selected="selected">País
													</option>
													<?php foreach ($paises as $k => $v): ?>
														<option
															value="<?php echo $v['id']; ?>"><?php echo $v['titulo']; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-12 reset-total genero">
											<div class="col-xs-4 col-sm-4 col-md-4 reset-total">
												<p>Género</p>
											</div>
											<div class="col-xs-8 col-sm-8 col-md-8 reset-total">
												<div class="col-xs-4 col-sm-4 col-md-4 reset-total">
													<label class="container-check">
														M
														<input type="radio" class="" onclick="" name="genero" id=""
															   value="1"/>
														<span class="checkmark"></span>
													</label>
												</div>
												<div class="col-xs-4 col-sm-4 col-md-4 reset-total">
													<label class="container-check">
														F
														<input type="radio" class="" onclick="" name="genero" id=""
															   value="2"/>
														<span class="checkmark"></span>
													</label>
												</div>
												<div class="col-xs-4 col-sm-4 col-md-4 reset-total">
													<label class="container-check">
														Otro
														<input type="radio" class="" onclick="" name="genero" id=""
															   value="2"/>
														<span class="checkmark"></span>
													</label>
												</div>
											</div>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-12 reset-total">
											<div class="form-group">
												<h5>Fecha de nacimiento</h5>
												<input type="date" name="cumpleanios" value="">
											</div>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-12 reset-total genero">
											<div class="col-xs-12 col-sm-12 col-md-12 reset-total">
												<p>Para nosotros la niñez es muy importante, es por eso que nos gustaría
													saber si tienes hijos</p>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-12 reset-total">
												<div class="col-xs-4 col-sm-4 col-md-4 reset-total">
													<label class="container-check">
														Si
														<input type="radio" class="" onclick="" name="tienes_hijos" id=""
															   value="si"/>
														<span class="checkmark"></span>
													</label>
												</div>
												<div class="col-xs-4 col-sm-4 col-md-4 reset-total">
													<label class="container-check">
														No
														<input type="radio" class="" onclick="" name="tienes_hijos" id=""
															   value="no"/>
														<span class="checkmark"></span>
													</label>
												</div>
											</div>
										</div>

									</div>
									<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 form-group cont-camp reset-total">
										<hr class="hr-2">
										<div class="col-xs-6 col-sm-6 col-md-4 camp-obli">
											<button type="button" onclick="pagar()" class="btn-primary">
												Donar
											</button>
											<p>*Campos obligatorios</p>
										</div>
										<div class="col-xs-6 col-sm-6 col-md-8 term-cond">
											<label class="container-check">
												Acepto los
												<input type="checkbox" name="terminos" value="1"
													   id="terminos_<?php echo $key; ?>" class="validate[required]">
												<span class="checkmark"></span>
											</label>
											<a href="#" data-toggle="modal" data-target="#myModalLogin">Términos y
												Condiciones</a>
										</div>
									</div>
								</form>
							</div>
						</div>

						<?php if ($message['type'] == 'success'): ?>
							<div id="message" class="thanks-message">
								<!-- div class="logo-plan"><img src="<?php echo base_url(); ?>uploads/<?php echo $campania['logo_gracias']; ?>" alt="<?php echo $this->configuracion['titulo']; ?>" /></div -->
								<div class="flex-box">
									<div class="message">
										<div class="title"><?php echo $campania['titulo_gracias']; ?></div>
										<p><?php echo nl2br($campania['contenido_gracias']); ?></p>
									</div>

									<div class="share-message">
										<p><?php echo nl2br($campania['subtitulo_derecha']); ?></p>
										<div class="slogan"><?php echo $campania['slogan']; ?></div>
										<div class="rrss">
											<a href="javascript:;"
											   onclick="window.open('//www.facebook.com/sharer/sharer.php?u=<?php echo base_url(); ?>', '_blank', 'width=500,height=300');"><i
													class="mdi mdi-facebook"></i></a>
											<a href="javascript:;"
											   onclick="window.open('//twitter.com/?status=<?php echo $campania['titulo_seo']; ?> <?php echo base_url(); ?>', '_blank', 'width=500,height=300');"><i
													class="mdi mdi-twitter"></i></a>
											<a href="mailto:?subject=<?php echo $campania['titulo_seo']; ?>&body=<?php echo $campania['descripcion_seo']; ?>: <?php echo base_url(); ?>"
											   target="_blank"><i class="mdi mdi-email"></i></a>
										</div>
									</div>
								</div>
							</div>
						<?php endif; ?>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-2">
						<div class="img-dona-mensaje">
							<img src="<?php echo base_url(); ?>uploads/<?php echo $campania['imagen_metas']; ?>">
						</div>
						<div class="cont-slider-range">
							<div id="slider-range">
								<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default  left"></span>
							</div>
						</div>
						<?php $rangos = array('uno', 'dos', 'tres', 'cuatro', 'cinco'); ?>
						<div class="ctn-cant-nin">
							<?php foreach ($rangos as $key => $value): ?>
								<button class="cant-nin<?php echo ($key == 4) ? ' active' : ''; ?>">
									<p><?php echo $campania['titulo_rango_' . $value]; ?></p>
								</button>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php $this->load->view("frontend/templates/footer_view"); ?>
