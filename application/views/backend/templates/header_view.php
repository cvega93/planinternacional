<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta http-equiv="Cache-Control" content="no-cache" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="expires" content="Fri, 18 Jul 2014 1:00:00 GMT" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Jockerds">
    <link rel="shortcut icon" href="<?php echo backend_view(); ?>images/favicon.png">
    <title>Administraci&oacute;n - <?php echo $this->configuracion['titulo']; ?></title>
    <link href="<?php echo backend_view(); ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo backend_view(); ?>bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo backend_view(); ?>css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?php echo backend_view(); ?>css/select2.css" rel="stylesheet">
    <link href="<?php echo backend_view(); ?>css/alerts.css" rel="stylesheet">
    <link href="<?php echo backend_view(); ?>assets/jquery-ui/jquery-ui-1.10.1.custom.min.css" rel="stylesheet">
    <link href="<?php echo backend_view(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo backend_view(); ?>assets/jvector-map/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <link href="<?php echo backend_view(); ?>css/clndr.css" rel="stylesheet">
    <!--clock css-->
    <link href="<?php echo backend_view(); ?>assets/css3clock/css/style.css" rel="stylesheet">
    <!--Morris Chart CSS -->
    <link href="<?php echo backend_view(); ?>assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="<?php echo backend_view(); ?>assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo backend_view(); ?>assets/data-tables/DT_bootstrap.css" />
    <link rel="stylesheet" href="<?php echo backend_view(); ?>assets/morris-chart/morris.css">
    <link rel="stylesheet" type="text/css" href="<?php echo backend_view(); ?>assets/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" href="<?php echo backend_view(); ?>assets/bootstrap-switch-master/build/css/bootstrap3/bootstrap-switch.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo backend_view(); ?>assets/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo backend_view(); ?>assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo backend_view(); ?>assets/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo backend_view(); ?>assets/bootstrap-timepicker/compiled/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo backend_view(); ?>assets/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo backend_view(); ?>assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo backend_view(); ?>assets/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo backend_view(); ?>assets/jquery-multi-select/css/multi-select.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo backend_view(); ?>assets/jquery-tags-input/jquery.tagsinput.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo backend_view(); ?>assets/nestable/jquery.nestable.css" />

    <!-- Custom styles for this template -->
    <link href="<?php echo backend_view(); ?>css/validationEngine.jquery.css" rel="stylesheet">
    <link href="<?php echo backend_view(); ?>css/style.css" rel="stylesheet">
    <link href="<?php echo backend_view(); ?>css/style-responsive.css" rel="stylesheet"/>
    <link href="<?php echo backend_view(); ?>assets/iCheck-master/skins/square/square.css" rel="stylesheet">
    <link href="<?php echo backend_view(); ?>css/template.css" rel="stylesheet">
    <script type="text/javascript">
    var current_url = "<?php echo current_url(); ?>/"; var base_url = "<?php echo base_url(); ?>"; var backend_url = "<?php echo backend_url(); ?>"; var backend_view = "<?php echo backend_view(); ?>"; var base_view = "<?php echo base_view(); ?>"; var xnToken = "<?php echo MY_Controller::mostrar_session('token'); ?>"; var xnUserId = "<?php echo MY_Controller::mostrar_session('id'); ?>"; var xnUserName = "<?php echo MY_Controller::mostrar_session('nombres') . " " . MY_Controller::mostrar_session('apellidos'); ?>"; var xnChannel = "<?php echo $this->encrypt->hash('iep'); ?>";
    </script>

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<iframe name="oculto" style="display:none;"></iframe>
<section id="container">
<header class="header clearfix">
<div class="brand" style="padding-right:0px !important;padding-left:30px !important;padding-top:5px !important;padding-bottom:5px !important;">
    <a href="<?php echo backend_url(); ?>">
        <img src="<?php echo base_url(); ?>uploads/<?php echo $this->configuracion['logo']; ?>" alt="Logo" />
    </a>
</div>

<div class="nav notify-row" id="top_menu">
    <ul class="nav top-menu">
        <li class="tooltips" data-title="<?php echo $this->lang->line('inicio'); ?>" data-placement="bottom">
            <a href="<?php echo base_url(); ?>" target="_home">
                <i class="fa fa-home"></i>
            </a>
        </li>
    </ul>
</div>
<div class="top-nav clearfix">
    <ul class="nav pull-right top-menu">
        <li class="dropdown tooltips" data-title="<?php echo MY_Controller::mostrar_session('nombres').' '.MY_Controller::mostrar_session('apellidos'); ?>" data-placement="left">
            <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">
                <?php if(isset($_SESSION[$this->session_name])): ?>
                    <img alt="<?php echo MY_Controller::mostrar_session('imagen'); ?>" style="max-height:33px;" src="<?php echo base_url(); ?>uploads/33x33/<?php echo MY_Controller::mostrar_session('imagen'); ?>">
                <?php endif; ?>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="javascript:;" onclick="javascript:abrir_pestania('perfil', this);" data-title="<?php echo $this->lang->line('usuario'); ?>" data-icon="fa-user"><i class="fa fa-user"></i> <?php echo $this->lang->line('usuario'); ?></a></li>
                <li><a href="javascript:;" onclick="javascript:abrir_pestania('contrasenia', this);" data-title="<?php echo $this->lang->line('contrasenia'); ?>" data-icon="fa-lock"><i class="fa fa-lock"></i> <?php echo $this->lang->line('contrasenia'); ?></a></li>
            </ul>
        </li>

        <li data-title="<?php echo $this->lang->line('salir'); ?>" class="tooltips" data-placement="bottom">
            <div class="toggle-left-box" onclick="javascript:cerrar_sesion();">
                <div class="fa fa-power-off"></div>
            </div>
        </li>
    </ul>
</div>
</header>
<section id="main-content" style="margin-left:0px;display:none;">
    <section class="wrapper content" style="margin-top:0px;">
        <div class="col-md-12" id="message">
            <div class="alert alert-warning message" style="display:none;"></div>
        </div>

        <?php $tipo_usuario = array('Administrador General', 'Usuario Administrador', 'Usuario General', 'Usuario Administrador', 'Usuario General'); ?>

<div class="col-md-12">
    <div class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo backend_url(); ?>">INICIO</a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <?php if(MY_Controller::mostrar_session('nivel') == 0): ?>
                    <li><a href="javascript:;" onclick="javascript:abrir('backend_menu', this);" data-title="<?php echo $this->lang->line('backend_menu'); ?>" data-icon="fa-th-list"><i class="fa fa-th-list"></i> Menú Principal</a></li>
                <?php endif; ?>
                <?php if(MY_Controller::mostrar_session('nivel') == 0 || MY_Controller::mostrar_session('nivel') == 1): ?>
                    <li><a href="javascript:;" onclick="javascript:abrir_pestania('configuracion', this);" data-title="<?php echo $this->lang->line('configuracion'); ?>" data-icon="fa-cogs"><i class="fa fa-cogs"></i> Configuración</a></li>
                    <li><a href="javascript:;" onclick="javascript:abrir('usuarios', this);" data-title="<?php echo $this->lang->line('usuarios'); ?>" data-icon="fa-group"><i class="fa fa-group"></i> <?php echo $this->lang->line('usuarios'); ?></a></li>
                <?php endif; ?>
                <?php $menu = MY_Controller::mostrar_menu(); ?>
                <?php if(count($menu) > 0): ?>
                    <?php foreach($menu as $k => $v): ?>
                        <?php if(count($v) == 1): ?>
                            <?php foreach($v as $key => $value): ?>
                                <?php if(!isset($this->items_unlocked[$value['url']])): ?>
                                    <?php if(isset($this->permisos[$value['url']]) || MY_Controller::mostrar_session('nivel') == 0 || MY_Controller::mostrar_session('nivel') == 1): ?>
                                        <li><a href="javascript:;" onclick="javascript:<?php echo $value['metodo']; ?>('<?php echo $value['url']; ?>', this);" data-title="<?php echo $this->lang->line($value['url']); ?>" data-icon="<?php echo $value['icono']; ?>"><i class="fa <?php echo $value['icono']; ?>"></i> <?php echo $this->lang->line($value['url']); ?></a></li>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php foreach($this->items_unlocked[$value['url']] as $a => $b): ?>
                                        <?php $item = $this->module_model->buscar($value['url'], $b); ?>
                                        <?php if(count($item) > 0): ?>
                                            <li><a href="javascript:;" onclick="javascript:actualizar_item('<?php echo $value['url']; ?>', <?php echo $b; ?>);" data-title="<?php echo $item['titulo']; ?>" data-icon="<?php echo $value['icono']; ?>"><i class="fa <?php echo $value['icono']; ?>"></i> <?php echo $item['titulo']; ?></a></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> <?php echo $k; ?> <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                <?php foreach($v as $key => $value): ?>
                                    <?php if(!isset($items_unlocked[$value['url']])): ?>
                                        <?php if(isset($this->permisos[$value['url']]) || MY_Controller::mostrar_session('nivel') == 0 || MY_Controller::mostrar_session('nivel') == 1): ?>
                                            <li><a href="javascript:;" onclick="javascript:<?php echo $value['metodo']; ?>('<?php echo $value['url']; ?>', this);" data-title="<?php echo $this->lang->line($value['url']); ?>" data-icon="<?php echo $value['icono']; ?>"><i class="fa <?php echo $value['icono']; ?>"></i> <?php echo $this->lang->line($value['url']); ?></a></li>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php foreach($this->items_unlocked[$value['url']] as $a => $b): ?>
                                            <?php $item = $this->module_model->buscar($value['url'], $b); ?>
                                            <li><a href="javascript:;" onclick="javascript:actualizar_item('<?php echo $value['url']; ?>', <?php echo $b; ?>);" data-title="<?php echo $item['titulo']; ?>" data-icon="<?php echo $value['icono']; ?>"><i class="fa <?php echo $value['icono']; ?>"></i> <?php echo $item['titulo']; ?></a></li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>

<section class="col-md-12">
    <div class="alert alert-info">
        Página Web desarrollada por: <a href="https://www.phsperu.com" target="_blank">PHSPERU.COM</a> S.A.C. | Todos los derechos reservados.<br />
        Para cualquier consulta, puede escribirnos a: <a href="mailto:ventas@phsperu.com" target="_blank">ventas@phsperu.com</a>
    </div>
</section>

<section style="background:transparent;" class="col-md-12" id="content-main">