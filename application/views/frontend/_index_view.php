<?php $this->load->view("frontend/templates/head_view"); ?>
<body>
<?php $message = $this->session->flashdata('message'); ?>

<?php $this->load->view("frontend/templates/header_view"); ?>
<style type="text/css">
	@media only screen and (max-width: 991px) {
		.cont-video {
			background-image:url(<?php echo base_url(); ?>uploads/<?php echo $campania['fondo_video_responsive']; ?>) !important;
		}

		.ctn-estad {
			background-image:url(<?php echo base_url(); ?>uploads/<?php echo $campania['fondo_estadisticas_responsive']; ?>) !important;
		}
	}

	<?php if(@$message['type'] == 'success'): ?>
	@media screen and (max-width: 1920px) {
		.img-ninas3 {
			padding-bottom:590px;
		}
	}
	<?php endif; ?>

</style>

<?php if(isset($banners) AND count($banners) > 0): ?>
	<div class="fluid_container clearfix" id="acercade">
		<div class="camera_wrap camera_emboss" id="camera_wrap_4">
			<?php foreach($banners as $key => $value): ?>
				<div data-thumb="<?php echo base_url(); ?>uploads/100x100/<?php echo $value['imagen_fondo']; ?>" data-src="<?php echo base_url();?>uploads/<?php echo $value['imagen_fondo']; ?>">
					<div class="container cont-rsp">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 reset-total">
								<div class="contenedor-texto">
									<div class="col-xs-12 col-sm-12 col-md-12 img_banner1 reset-total">
										<img src="<?php echo base_url(); ?>uploads/<?php echo $value['logo']; ?>" title="<?php echo $campania['titulo']; ?>" alt="<?php echo $campania['titulo']; ?>" />
									</div>
									<div class="col-xs-12 col-sm-12 col-md-<?php echo ($value['imagen_derecha'] != '') ? '6' : '4'; ?> reset-total texto_banner1">
										<img src="<?php echo base_url(); ?>uploads/<?php echo $value['imagen_izquierda']; ?>" title="" alt="" />
										<?php if($value['enlace'] != ''): ?>
											<a href="<?php echo $value['enlace']; ?>" class="btn-banner scrollLink"><img src="<?php echo base_url(); ?>uploads/<?php echo $value['imagen_enlace']; ?>"></a>
										<?php endif; ?>
									</div>

									<?php if($value['imagen_derecha'] != ''): ?>
										<div class="col-xs-12 col-sm-6 col-md-6 nina-banner2 reset-total">
											<img src="<?php echo base_url();?>uploads/<?php echo $value['imagen_derecha']; ?>" title="" alt="" />
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>

<section class="cont-back1" id="tipodedonaciones" style="background-image: url(<?php echo base_url(); ?>uploads/<?php echo $campania['fondo_primer_contenido']; ?>); background-color:<?php echo $campania['color_fondo_primer_contenido']; ?>;">
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
					<img src="<?php echo base_url(); ?>uploads/<?php echo $campania['segunda_imagen']; ?>" />
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-7 reset-total-rsp">
			<div class="col-xs-12 col-sm-12 col-md-12 cont-video" style="background-image:url(<?php echo base_url(); ?>uploads/<?php echo $campania['fondo_video']; ?>);">
				<iframe width="100%" height="" src="//www.youtube.com/embed/<?php echo $campania['video']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="cont-test">
					<h2>Testimonios</h2>

					<div id="myCarousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<?php foreach($testimonios as $key => $value): ?>
								<li data-target="#myCarousel" data-slide-to="<?php echo $key; ?>"<?php echo ($key == 0) ? ' class="active"' : ''; ?>></li>
							<?php endforeach; ?>
						</ol>

						<div class="carousel-inner bg-testimonios" style="background-image: url(<?php echo base_url(); ?>uploads/<?php echo $campania['fondo_testimonios']; ?>);">
							<?php foreach($testimonios as $key => $value): ?>
								<div class="item <?php echo ($key == 0) ? 'active' : ''; ?>">
									<div class="carousel-caption">
										<p><?php echo nl2br($value['comentario']); ?></p>
										<div class="detail-test">
											<span class="name-nina"><?php echo $value['titulo']; ?></span>
											<span class="age-nina"><?php echo $value['edad']; ?> años, <?php echo $value['ubicacion']; ?></span>
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

<div class="medio-info-1" style="background-image: url(<?php echo base_url(); ?>uploads/<?php echo $campania['primer_separador_contenido']; ?>);"></div>

<section class="cont-back2" id="donaryserparte" style="background-image: url(<?php echo base_url(); ?>uploads/<?php echo $campania['fondo_segundo_contenido']; ?>); background-color: <?php echo $campania['color_fondo_segundo_contenido']; ?>">
	<div class="container">
		<div class="col-md-3 ctn-aport-sig reset-total">
			<img src="<?php echo base_url(); ?>uploads/<?php echo $campania['tercera_imagen']; ?>">
		</div>
		<div class="col-md-5 ctn-estad" style="background-image: url(<?php echo base_url(); ?>uploads/<?php echo $campania['fondo_estadisticas']; ?>);">
			<div id="myCarousel4" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner bg-estad">
					<?php foreach($estadisticas as $key => $value): ?>
						<div class="item <?php echo ($key == 0) ? ' active' : ''; ?>">
							<div class="carousel-caption">
								<span class="don-price"><?php echo $value['titulo']; ?></span>
								<hr>
								<p><?php echo nl2br($value['contenido']); ?></p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<?php if(count($estadisticas) > 1): ?>
					<a class="left carousel-control" href="#myCarousel4" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel4" role="button" data-slide="next">
						<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				<?php endif; ?>
			</div>
		</div>
		<div class="col-md-4 ctn-don">
			<img src="<?php echo base_url(); ?>uploads/<?php echo $campania['cuarta_imagen']; ?>" class="titulo-abrir-puertas">
			<div id="myCarousel2" class="carousel slide" data-ride="carousel">
				<h2 style="background-image: url(<?php echo base_url(); ?>uploads/<?php echo $campania['fondo_tipo_donacion']; ?>);"><?php echo $campania['primer_tipo_donacion']; ?></h2>
				<div class="carousel-inner bg-don-uni" style="background-image: url(<?php echo base_url(); ?>uploads/<?php echo $campania['fondo_primer_tipo_donacion']; ?>);">

					<?php foreach($precios_tipo_uno as $key => $value): ?>
						<div class="item <?php echo ($key == 0) ? ' active' : ''; ?>">
							<div class="carousel-caption">
								<span class="don-price">S/ <?php echo number_format($value['precio'], 2); ?></span>
								<p><?php echo nl2br($value['detalles']); ?></p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<ol class="carousel-indicators">
					<?php foreach($precios_tipo_uno as $key => $value): ?>
						<li data-target="#myCarousel2" data-slide-to="<?php echo $key; ?>"<?php echo ($key == 0) ? ' class="active"' : ''; ?>></li>
					<?php endforeach; ?>
				</ol>
			</div>

			<div id="myCarousel3" class="carousel slide" data-ride="carousel">
				<h2 style="background-image: url(<?php echo base_url(); ?>uploads/<?php echo $campania['fondo_tipo_donacion']; ?>);"><?php echo $campania['segundo_tipo_donacion']; ?></h2>
				<div class="carousel-inner bg-don-uni bg-don-men">
					<?php foreach($precios_tipo_dos as $key => $value): ?>
						<div class="item <?php echo ($key == 0) ? ' active' : ''; ?>">
							<div class="carousel-caption">
								<span class="don-price">S/ <?php echo number_format($value['precio'], 2); ?></span>
								<p><?php echo nl2br($value['detalles']); ?></p>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<ol class="carousel-indicators">
					<?php foreach($precios_tipo_dos as $key => $value): ?>
						<li data-target="#myCarousel3" data-slide-to="<?php echo $key; ?>"<?php echo ($key == 0) ? ' class="active"' : ''; ?>></li>
					<?php endforeach; ?>
				</ol>
				<p class="dona-ast"><?php echo nl2br($campania['alerta_asterisco']); ?></p>
			</div>
		</div>
	</div>
</section>

<!--div class="medio-info-2"></div-->

<section class="cont-back3" id="contactanos" style="background-image: url(<?php echo base_url(); ?>uploads/<?php echo $campania['fondo_tercer_contenido']; ?>);">
	<div class="img-ninas3">
		<div class="container">
			<div class="col-xs-12 col-sm-12 col-md-12 cont-rsp-padd">
				<div class="col-xs-12 col-sm-12 col-md-10 ctn-formulario">
					<div class="col-md-6 reset-total cont-form-une">
						<h3><?php echo $campania['unete']; ?></h3>
						<span><?php echo $campania['subtitulo_unete']; ?></span>
					</div>
					<div class="col-md-6 reset-total cont-form-don">
						<h3><?php echo $campania['dona']; ?></h3>
						<span style="font-size: 18px;"><?php echo $campania['subtitulo_dona']; ?>
							</span>
					</div>

					<div class="clearfix"></div>

					<ul class="nav nav-tabs">
						<li><a data-toggle="tab" href="#unete" class="unete"><?php echo $campania['unete']; ?></a></li>
						<li><a data-toggle="tab" onclick="javascript:configurar_descripcion('<?php echo $campania['primer_tipo_donacion']; ?>//');" href="#section_precios_tipo_uno" class="dona-btn"><?php echo $campania['primer_tipo_donacion']; ?></a></li>
						<li class="active"><a data-toggle="tab" onclick="javascript:configurar_descripcion('<?php echo $campania['segundo_tipo_donacion']; ?>//');" href="#section_precios_tipo_dos" class="dona-btn"><?php echo $campania['segundo_tipo_donacion']; ?></a></li>
					</ul>

					<div class="tab-content bg-formulario">
						<div id="unete" class="tab-pane fade">
							<form method="POST" action="<?php echo base_url(); ?>unete">
								<div class="personal-info col-md-6">
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group reset-total">
											<label>*</label>
											<input type="text" class="form-control validate[required, custom[onlyLetterSp]]" placeholder="Nombres" id="nombres" name="nombres" />
										</div>
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group reset-total">
											<label>*</label>
											<input type="text" class="form-control validate[required, custom[onlyLetterSp]]" placeholder="Apellido Paterno" id="apellido-parterno" name="apellido_paterno" />
										</div>
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group reset-total">
											<input type="text" class="form-control validate[custom[onlyLetterSp]]" placeholder="Apellido Materno" id="apellido-materno" name="apellido_materno" />
										</div>
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group reset-total">
											<label>*</label>
											<input type="text" class="form-control validate[required, custom[email]]" placeholder="Email" id="email" name="email" />
										</div>
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group reset-total">
											<input type="text" class="form-control validate[custom[phone]]" placeholder="Celular" id="celular" name="celular" />
										</div>
										<hr class="hr-1">
										<div class="block">
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 ctn-doc">
									<div class="col-md-12 reset-total">
										<div class="col-xs-4 col-sm-4 col-md-4 reset-total">
											<p>Documento</p>
										</div>
										<div class="col-xs-8 col-sm-8 col-md-8 reset-total">
											<div class="col-xs-4 col-sm-4 col-md-4 reset-total">
												<label class="container-check">
													DNI
													<input type="radio" class="validate[required]" id="dni" value="1" name="tipo_documento" onclick="javascript:validar_documento(this);" />
													<span class="checkmark"></span>
												</label>
											</div>
											<div class="col-xs-4 col-sm-4 col-md-4 reset-total">
												<label class="container-check">
													CE
													<input type="radio" class="validate[required]" id="ce" value="2" name="tipo_documento" onclick="javascript:validar_documento(this);">
													<span class="checkmark"></span>
												</label>
											</div>
											<div class="col-xs-4 col-sm-4 col-md-4 reset-total">
												<label class="container-check">
													Otro
													<input type="radio" class="validate[required]" id="otro" value="3" name="tipo_documento" onclick="javascript:validar_documento(this);">
													<span class="checkmark"></span>
												</label>
											</div>
										</div>
									</div>

									<div class="col-xs-12 col-sm-12 col-md-12 reset-total otro hidden">
										<div class="form-group">
											<input type="text" id="otro_tipo_documento" class="form-control" name="otro_tipo_documento" placeholder="Especifique el tipo de documento" />
										</div>
									</div>

									<div class="col-xs-12 col-sm-12 col-md-12 reset-total">
										<div class="form-group">
											<input type="text" class="form-control validate[required]" name="numero_documento" placeholder="Número de documento">
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 reset-total">
										<div class="cont-select" style="overflow:visible;">
											<select name="pais" class="validate[required]" id="pais">
												<option value="" disabled="disabled" selected="selected">País</option>
												<?php foreach($paises as $k => $v): ?>
													<option value="<?php echo $v['id']; ?>"><?php echo $v['titulo']; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="col-xs-12 col-sm-12 col-md-8 col-lg-6 form-group cont-camp reset-total">
									<hr class="hr-2">
									<div class="col-xs-6 col-sm-6 col-md-4 camp-obli reset-total">
										<button type="submit" class="btn-primary">Unirme</button>
										<p>*Campos obligatorios</p>
									</div>
									<div class="col-xs-6 col-sm-6 col-md-8 term-cond">
										<label class="container-check">
											Acepto los
											<input type="checkbox" class="validate[required]" name="terminos" value="1" id="terminos" />
											<span class="checkmark"></span>
										</label>
										<a href="<?php echo base_url(); ?>uploads/TérminosyCondiciones_Plan.pdf" target="_blank">Términos y Condiciones</a>
									</div>
								</div>
							</form>
						</div>

						<?php $tipos = array(1 => 'precios_tipo_uno', 2 => 'precios_tipo_dos'); $descripciones = array(1 => 'primer_tipo_donacion' , 2 => 'segundo_tipo_donacion'); ?>

						<?php foreach($tipos as $key => $value): ?>
							<div id="section_<?php echo $value; ?>" class="tab-pane fade<?php echo ($key == 2) ? ' in active' : ''; ?>">
								<form method="POST" action="<?php echo base_url(); ?>checkout" data-id="<?php echo $key; ?>">
									<input type="hidden" name="tipo_pago" id="tipo_pago_<?php echo $key; ?>" value="<?php echo $key; ?>" />
									<input type="hidden" name="descripcion" id="descripcion_<?php echo $key; ?>" value="<?php echo $descripciones[$key]; ?>" />
									<input type="hidden" name="cantidad_apoyo" id="cantidad_apoyo_<?php echo $key; ?>" />
									<input type="hidden" name="token" class="token" />
									<div class="col-md-4 ctn-doc">
										<div class="col-xs-12 col-sm-12 col-md-12 reset-total">
											<div class="col-xs-6 col-sm-6 col-md-6">
												<label class="container-check">
													Soles
													<input type="radio" name="tipo_moneda" id="soles_<?php echo $key; ?>" onclick="javascript:configurar_moneda('PEN');" value="PEN" checked="checked" />
													<span class="checkmark"></span>
												</label>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<label class="container-check">
													Dólares
													<input type="radio" name="tipo_moneda" id="dolares_<?php echo $key; ?>" onclick="javascript:configurar_moneda('USD');" value="USD" />
													<span class="checkmark"></span>
												</label>
											</div>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-12 reset-total">
											<div class="cont-select">
												<select name="monto_total" class="validate[required]" onchange="javascript:validar_otro_monto(this, <?php echo $key; ?>);" id="monto_total_<?php echo $key; ?>">
													<option value="" disabled="disabled" selected="selected">Selecciona un monto</option>
													<?php foreach($$value as $k => $v): ?>
														<option data-apoyo="<?php echo $v['cantidad_apoyo']; ?>" value="<?php echo $v['precio']; ?>" class="color-2"><?php echo $v['precio']; ?></option>
													<?php endforeach; ?>
													<option value="1" data-apoyo="0" class="color-2">Otro Monto</option>
												</select>
											</div>
											<div id="demo3_<?php echo $key; ?>" class="collapse">
												<div class="col-md-12 ctn-doc reset-total">
													<div class="col-md-12 reset-total">
														<p>Otro Monto</p>
													</div>
													<div class="form-group camp-obli">
														<input type="text" class="form-control" onchange="javascript:configurar_monto(this);" name="otro_monto" placeholder="Monto" id="otro_monto_<?php echo $key; ?>" />
														<?php if($campania['monto_minimo_' . $key] > 0): ?>
															<p class="monto_minimo monto_minimo_PEN<?php echo ($campania['monto_minimo_1'] > 0) ? '' : ' hidden'; ?>">Monto mínimo <?php echo $campania['monto_minimo_1']; ?></p>
															<p class="monto_minimo monto_minimo_USD<?php echo ($campania['monto_minimo_2'] > 0) ? '' : ' hidden'; ?>">Monto mínimo <?php echo $campania['monto_minimo_2']; ?></p>
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
											<input type="text" class="form-control validate[required, custom[onlyLetterSp]]" placeholder="Nombres" id="nombres_<?php echo $key; ?>" name="nombres" />
										</div>
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group reset-total">
											<label>*</label>
											<input type="text" class="form-control validate[required, custom[onlyLetterSp]]" placeholder="Apellido Paterno" id="apellido_paterno_<?php echo $key; ?>" name="apellido_paterno" />
										</div>
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group reset-total">
											<input type="text" class="form-control validate[custom[onlyLetterSp]]" placeholder="Apellido Materno" id="apellido_materno_<?php echo $key; ?>" name="apellido_materno" />
										</div>
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group reset-total">
											<label>*</label>
											<input type="text" class="form-control validate[required, custom[email]]" placeholder="Email" id="email_<?php echo $key; ?>" name="email" />
										</div>
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group reset-total">
											<input type="text" class="form-control validate[custom[phone]]" placeholder="Celular" id="celular_<?php echo $key; ?>" name="celular" />
										</div>
										<hr class="hr-1">
									</div>

									<div class="col-xs-12 col-sm-12 col-md-4 ctn-doc">
										<div class="col-xs-12 col-sm-12 col-md-12 reset-total">
											<div class="col-xs-4 col-sm-4 col-md-4 reset-total">
												<p>Documento</p>
											</div>
											<div class="col-xs-8 col-sm-8 col-md-8 reset-total">
												<div class="col-xs-4 col-sm-4 col-md-4 reset-total">
													<label class="container-check">
														DNI
														<input type="radio" class="validate[required]" onclick="javascript:validar_documento(this, '<?php echo $key; ?>');" name="tipo_documento" id="dni_<?php echo $key; ?>" value="1" />
														<span class="checkmark"></span>
													</label>
												</div>
												<div class="col-xs-4 col-sm-4 col-md-4 reset-total">
													<label class="container-check">
														CE
														<input type="radio" class="validate[required]" onclick="javascript:validar_documento(this, '<?php echo $key; ?>');" name="tipo_documento" id="ce_<?php echo $key; ?>" value="2" />
														<span class="checkmark"></span>
													</label>
												</div>
												<div class="col-xs-4 col-sm-4 col-md-4 reset-total">
													<label class="container-check">
														Otro
														<input type="radio" class="validate[required]" onclick="javascript:validar_documento(this, '<?php echo $key; ?>');" name="tipo_documento" id="otro_<?php echo $key; ?>" value="3" />
														<span class="checkmark"></span>
													</label>
												</div>
											</div>
										</div>

										<div class="col-xs-12 col-sm-12 col-md-12 reset-total otro hidden">
											<div class="form-group">
												<input type="text" id="otro_tipo_documento_<?php echo $key; ?>" class="form-control" name="otro_tipo_documento" placeholder="Especifique el tipo de documento" />
											</div>
										</div>

										<div class="col-xs-12 col-sm-12 col-md-12 reset-total">
											<div class="form-group">
												<input type="text" class="form-control validate[required]" name="numero_documento" id="numero_documento_<?php echo $key; ?>" placeholder="Número de documento">
											</div>
										</div>
										<div class="col-xs-12 col-sm-12 col-md-12 reset-total">
											<div class="cont-select" style="overflow:visible;">
												<select name="pais" class="validate[required]" id="pais_<?php echo $key; ?>">
													<option value="" disabled="disabled" selected="selected">País</option>
													<?php foreach($paises as $k => $v): ?>
														<option value="<?php echo $v['id']; ?>"><?php echo $v['titulo']; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 form-group cont-camp reset-total">
										<hr class="hr-2">
										<div class="col-xs-6 col-sm-6 col-md-4 camp-obli">
											<button type="button" onclick="javascript:pagar(this);" class="btn-primary">Donar</button>
											<p>*Campos obligatorios</p>
										</div>
										<div class="col-xs-6 col-sm-6 col-md-8 term-cond">
											<label class="container-check">
												Acepto los
												<input type="checkbox" name="terminos" value="1" id="terminos_<?php echo $key; ?>" class="validate[required]">
												<span class="checkmark"></span>
											</label>
											<a href="<?php echo base_url(); ?>uploads/TérminosyCondiciones_Plan.pdf" target="_blank">Términos y Condiciones</a>
										</div>
									</div>
								</form>
							</div>
						<?php endforeach; ?>
					</div>

					<?php if($message['type'] == 'success'): ?>
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
										<a href="javascript:;" onclick="window.open('//www.facebook.com/sharer/sharer.php?u=<?php echo base_url(); ?>', '_blank', 'width=500,height=300');"><i class="mdi mdi-facebook"></i></a>
										<a href="javascript:;" onclick="window.open('//twitter.com/?status=<?php echo $campania['titulo_seo']; ?> <?php echo base_url(); ?>', '_blank', 'width=500,height=300');"><i class="mdi mdi-twitter"></i></a>
										<a href="mailto:?subject=<?php echo $campania['titulo_seo']; ?>&body=<?php echo $campania['descripcion_seo']; ?>: <?php echo base_url(); ?>" target="_blank"><i class="mdi mdi-email"></i></a>
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
							<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default left"></span>
						</div>
					</div>
					<?php $rangos = array('uno', 'dos', 'tres', 'cuatro', 'cinco'); ?>
					<div class="ctn-cant-nin">
						<?php foreach($rangos as $key => $value): ?>
							<button class="cant-nin<?php echo ($key == 0) ? ' active' : ''; ?>">
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
