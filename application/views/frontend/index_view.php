<?php $this->load->view("frontend/templates/head_view"); ?>
	<body>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KJDSDBZ"
					  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
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
									<input type="hidden" name="pedidoId" id="pedidoId"/>
									<div class="col-md-4 ctn-doc">
										<div class="col-xs-12 col-sm-12 col-md-12 reset-total">
											<h5>Tipo de donación :</h5>
											<div class="col-xs-6 col-sm-6 col-md-6">
												<label class="container-check">
													Mensual
													<input type="radio"  name="tipo_pago" id="d1" value="2" checked />
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
														   checked
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
													<option disabled="disabled" selected="selected">
														Monto a donar
													</option>
													<option data-apoyo="" value="35" class="color-2">35.00</option>
													<option data-apoyo="" value="50" class="color-2">50.00</option>
													<option data-apoyo="" value="100" class="color-2">100.00</option>
													<option data-apoyo="" value="200" class="color-2">200.00</option>
													<option value="1" data-apoyo="0" class="color-2">Otro Monto</option>
												</select>
											</div>
											<div id="otro_monto_input" style="display: none;">
												<div class="col-md-12 ctn-doc reset-total">
													<div class="col-md-12 reset-total">
														<p>Otro Monto</p>
													</div>
													<input type="number" class="form-control validate[required, min[5]]"
														   name="otro_monto" placeholder="Monto" min="5"
														   id="otro_monto"/>
													<p>Monto mínimo 5.00</p>
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
													<option value="AF">Afghanistan</option>
													<option value="AL">Albania</option>
													<option value="DZ">Algeria</option>
													<option value="AS">American Samoa</option>
													<option value="AD">Andorra</option>
													<option value="AO">Angola</option>
													<option value="AI">Anguilla</option>
													<option value="AQ">Antarctica</option>
													<option value="AG">Antigua and Barbuda</option>
													<option value="AR">Argentina</option>
													<option value="AM">Armenia</option>
													<option value="AW">Aruba</option>
													<option value="AU">Australia</option>
													<option value="AT">Austria</option>
													<option value="AZ">Azerbaijan</option>
													<option value="BS">Bahamas</option>
													<option value="BH">Bahrain</option>
													<option value="BD">Bangladesh</option>
													<option value="BB">Barbados</option>
													<option value="BY">Belarus</option>
													<option value="BE">Belgium</option>
													<option value="BZ">Belize</option>
													<option value="BJ">Benin</option>
													<option value="BM">Bermuda</option>
													<option value="BT">Bhutan</option>
													<option value="BO">Bolivia</option>
													<option value="BA">Bosnia and Herzegowina</option>
													<option value="BW">Botswana</option>
													<option value="BV">Bouvet Island</option>
													<option value="BR">Brazil</option>
													<option value="IO">British Indian Ocean Territory</option>
													<option value="BN">Brunei Darussalam</option>
													<option value="BG">Bulgaria</option>
													<option value="BF">Burkina Faso</option>
													<option value="BI">Burundi</option>
													<option value="KH">Cambodia</option>
													<option value="CM">Cameroon</option>
													<option value="CA">Canada</option>
													<option value="CV">Cape Verde</option>
													<option value="KY">Cayman Islands</option>
													<option value="CF">Central African Republic</option>
													<option value="TD">Chad</option>
													<option value="CL">Chile</option>
													<option value="CN">China</option>
													<option value="CX">Christmas Island</option>
													<option value="CC">Cocos (Keeling) Islands</option>
													<option value="CO">Colombia</option>
													<option value="KM">Comoros</option>
													<option value="CG">Congo</option>
													<option value="CD">Congo, the Democratic Republic of the</option>
													<option value="CK">Cook Islands</option>
													<option value="CR">Costa Rica</option>
													<option value="CI">Cote d'Ivoire</option>
													<option value="HR">Croatia (Hrvatska)</option>
													<option value="CU">Cuba</option>
													<option value="CY">Cyprus</option>
													<option value="CZ">Czech Republic</option>
													<option value="DK">Denmark</option>
													<option value="DJ">Djibouti</option>
													<option value="DM">Dominica</option>
													<option value="DO">Dominican Republic</option>
													<option value="TP">East Timor</option>
													<option value="EC">Ecuador</option>
													<option value="EG">Egypt</option>
													<option value="SV">El Salvador</option>
													<option value="GQ">Equatorial Guinea</option>
													<option value="ER">Eritrea</option>
													<option value="EE">Estonia</option>
													<option value="ET">Ethiopia</option>
													<option value="FK">Falkland Islands (Malvinas)</option>
													<option value="FO">Faroe Islands</option>
													<option value="FJ">Fiji</option>
													<option value="FI">Finland</option>
													<option value="FR">France</option>
													<option value="FX">France, Metropolitan</option>
													<option value="GF">French Guiana</option>
													<option value="PF">French Polynesia</option>
													<option value="TF">French Southern Territories</option>
													<option value="GA">Gabon</option>
													<option value="GM">Gambia</option>
													<option value="GE">Georgia</option>
													<option value="DE">Germany</option>
													<option value="GH">Ghana</option>
													<option value="GI">Gibraltar</option>
													<option value="GR">Greece</option>
													<option value="GL">Greenland</option>
													<option value="GD">Grenada</option>
													<option value="GP">Guadeloupe</option>
													<option value="GU">Guam</option>
													<option value="GT">Guatemala</option>
													<option value="GN">Guinea</option>
													<option value="GW">Guinea-Bissau</option>
													<option value="GY">Guyana</option>
													<option value="HT">Haiti</option>
													<option value="HM">Heard and Mc Donald Islands</option>
													<option value="VA">Holy See (Vatican City State)</option>
													<option value="HN">Honduras</option>
													<option value="HK">Hong Kong</option>
													<option value="HU">Hungary</option>
													<option value="IS">Iceland</option>
													<option value="IN">India</option>
													<option value="ID">Indonesia</option>
													<option value="IR">Iran (Islamic Republic of)</option>
													<option value="IQ">Iraq</option>
													<option value="IE">Ireland</option>
													<option value="IL">Israel</option>
													<option value="IT">Italy</option>
													<option value="JM">Jamaica</option>
													<option value="JP">Japan</option>
													<option value="JO">Jordan</option>
													<option value="KZ">Kazakhstan</option>
													<option value="KE">Kenya</option>
													<option value="KI">Kiribati</option>
													<option value="KP">Korea, Democratic People's Republic of</option>
													<option value="KR">Korea, Republic of</option>
													<option value="KW">Kuwait</option>
													<option value="KG">Kyrgyzstan</option>
													<option value="LA">Lao People's Democratic Republic</option>
													<option value="LV">Latvia</option>
													<option value="LB">Lebanon</option>
													<option value="LS">Lesotho</option>
													<option value="LR">Liberia</option>
													<option value="LY">Libyan Arab Jamahiriya</option>
													<option value="LI">Liechtenstein</option>
													<option value="LT">Lithuania</option>
													<option value="LU">Luxembourg</option>
													<option value="MO">Macau</option>
													<option value="MK">Macedonia, The Former Yugoslav Republic of</option>
													<option value="MG">Madagascar</option>
													<option value="MW">Malawi</option>
													<option value="MY">Malaysia</option>
													<option value="MV">Maldives</option>
													<option value="ML">Mali</option>
													<option value="MT">Malta</option>
													<option value="MH">Marshall Islands</option>
													<option value="MQ">Martinique</option>
													<option value="MR">Mauritania</option>
													<option value="MU">Mauritius</option>
													<option value="YT">Mayotte</option>
													<option value="MX">Mexico</option>
													<option value="FM">Micronesia, Federated States of</option>
													<option value="MD">Moldova, Republic of</option>
													<option value="MC">Monaco</option>
													<option value="MN">Mongolia</option>
													<option value="MS">Montserrat</option>
													<option value="MA">Morocco</option>
													<option value="MZ">Mozambique</option>
													<option value="MM">Myanmar</option>
													<option value="NA">Namibia</option>
													<option value="NR">Nauru</option>
													<option value="NP">Nepal</option>
													<option value="NL">Netherlands</option>
													<option value="AN">Netherlands Antilles</option>
													<option value="NC">New Caledonia</option>
													<option value="NZ">New Zealand</option>
													<option value="NI">Nicaragua</option>
													<option value="NE">Niger</option>
													<option value="NG">Nigeria</option>
													<option value="NU">Niue</option>
													<option value="NF">Norfolk Island</option>
													<option value="MP">Northern Mariana Islands</option>
													<option value="NO">Norway</option>
													<option value="OM">Oman</option>
													<option value="PK">Pakistan</option>
													<option value="PW">Palau</option>
													<option value="PA">Panama</option>
													<option value="PG">Papua New Guinea</option>
													<option value="PY">Paraguay</option>
													<option value="PE">Peru</option>
													<option value="PH">Philippines</option>
													<option value="PN">Pitcairn</option>
													<option value="PL">Poland</option>
													<option value="PT">Portugal</option>
													<option value="PR">Puerto Rico</option>
													<option value="QA">Qatar</option>
													<option value="RE">Reunion</option>
													<option value="RO">Romania</option>
													<option value="RU">Russian Federation</option>
													<option value="RW">Rwanda</option>
													<option value="KN">Saint Kitts and Nevis</option>
													<option value="LC">Saint LUCIA</option>
													<option value="VC">Saint Vincent and the Grenadines</option>
													<option value="WS">Samoa</option>
													<option value="SM">San Marino</option>
													<option value="ST">Sao Tome and Principe</option>
													<option value="SA">Saudi Arabia</option>
													<option value="SN">Senegal</option>
													<option value="SC">Seychelles</option>
													<option value="SL">Sierra Leone</option>
													<option value="SG">Singapore</option>
													<option value="SK">Slovakia (Slovak Republic)</option>
													<option value="SI">Slovenia</option>
													<option value="SB">Solomon Islands</option>
													<option value="SO">Somalia</option>
													<option value="ZA">South Africa</option>
													<option value="GS">South Georgia and the South Sandwich Islands</option>
													<option value="ES">Spain</option>
													<option value="LK">Sri Lanka</option>
													<option value="SH">St. Helena</option>
													<option value="PM">St. Pierre and Miquelon</option>
													<option value="SD">Sudan</option>
													<option value="SR">Suriname</option>
													<option value="SJ">Svalbard and Jan Mayen Islands</option>
													<option value="SZ">Swaziland</option>
													<option value="SE">Sweden</option>
													<option value="CH">Switzerland</option>
													<option value="SY">Syrian Arab Republic</option>
													<option value="TW">Taiwan, Province of China</option>
													<option value="TJ">Tajikistan</option>
													<option value="TZ">Tanzania, United Republic of</option>
													<option value="TH">Thailand</option>
													<option value="TG">Togo</option>
													<option value="TK">Tokelau</option>
													<option value="TO">Tonga</option>
													<option value="TT">Trinidad and Tobago</option>
													<option value="TN">Tunisia</option>
													<option value="TR">Turkey</option>
													<option value="TM">Turkmenistan</option>
													<option value="TC">Turks and Caicos Islands</option>
													<option value="TV">Tuvalu</option>
													<option value="UG">Uganda</option>
													<option value="UA">Ukraine</option>
													<option value="AE">United Arab Emirates</option>
													<option value="GB">United Kingdom</option>
													<option value="US">United States</option>
													<option value="UM">United States Minor Outlying Islands</option>
													<option value="UY">Uruguay</option>
													<option value="UZ">Uzbekistan</option>
													<option value="VU">Vanuatu</option>
													<option value="VE">Venezuela</option>
													<option value="VN">Viet Nam</option>
													<option value="VG">Virgin Islands (British)</option>
													<option value="VI">Virgin Islands (U.S.)</option>
													<option value="WF">Wallis and Futuna Islands</option>
													<option value="EH">Western Sahara</option>
													<option value="YE">Yemen</option>
													<option value="YU">Yugoslavia</option>
													<option value="ZM">Zambia</option>
													<option value="ZW">Zimbabwe</option>
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
														<input type="radio" class="validate[required]" onclick="" name="genero" id=""
															   value="Masculino"/>
														<span class="checkmark"></span>
													</label>
												</div>
												<div class="col-xs-4 col-sm-4 col-md-4 reset-total">
													<label class="container-check">
														F
														<input type="radio" class="validate[required]" onclick="" name="genero" id=""
															   value="Femenino"/>
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
												<input type="date" name="cumpleanios" class="validate[required]" value="">
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
											<button type="button" id="submitButton" class="btn-primary">
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
