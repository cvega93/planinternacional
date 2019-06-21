<header class="large">
	<?php $message = $this->session->flashdata('message'); ?>

	<?php if($message != '' AND $message['type'] != 'success'): ?>
	<div class="alert alert-<?php echo $message['type']; ?>" style="margin-bottom:0px;">
	<p><?php echo $message['content']; ?></p>
	</div>
	<?php endif; ?>

	<div id="menu-container">
		<div id="menu-wrapper">
			<div id="hamburger-menu">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
		<ul class="menu-list accordion" style="background-image: url(<?php echo base_url(); ?>uploads/<?php echo $campania['fondo_menu']; ?>);">
			<li id="" class="toggle menu-normal"> 
				<a class="menu-link scrollLink" href="#tipodedonaciones"><?php echo $campania['titulo_uno_menu']; ?></a>
			</li>
			<li class="lin-sep"><hr></li>
			<li id="" class="toggle menu-normal"> 
				<a class="menu-link scrollLink" href="#donaryserparte"><?php echo $campania['titulo_dos_menu']; ?></a>
			</li>
			<li class="lin-sep"><hr></li>
			<li id="" class="toggle menu-normal"> 
				<a class="menu-link scrollLink" href="#contactanos"><?php echo $campania['titulo_tres_menu']; ?></a>
			</li>
			<li class="lin-sep"><hr></li>
			<li id="" class="toggle menu-normal"> 
				<a class="menu-link scrollLink" href="#foooter"><?php echo $campania['titulo_cuatro_menu']; ?></a>
			</li>
		</ul>
	</div>
</header>