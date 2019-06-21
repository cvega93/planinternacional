<!DOCTYPE HTML>
<html>
	<head>
    	<title><?php echo $this->configuracion['titulo']; ?></title>

    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>        
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0">	    
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="description" content="<?php echo $campania['descripcion_seo']; ?>"/>
        <meta http-equiv="Content-Language" content="es"/>
        <meta name="language" content="es"/>
        <meta property="og:title" content="<?php echo $campania['titulo_seo']; ?>" />
        <meta property="og:site_name" content="<?php echo $campania['titulo']; ?>" />
        <meta property="og:url" content="<?php echo base_url(); ?>" />
        <meta property="og:description" content="<?php echo $campania['descripcion_seo']; ?>." />
        <meta property="og:type" content="website" />
        <meta property="og:locale" content="es_ES" />
        <meta property="og:image" content="<?php echo base_url(); ?>uploads/<?php echo $campania['imagen_seo']; ?>" />
        
        <!--bootstrap CDN-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.2/css/bootstrap-select.css" />
        <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.5.95/css/materialdesignicons.min.css">

        <meta name="verify-v1" content="Tod1lTmq8XnYtRhVIHc+AFE2Kbnoz5WgeLWKDywDOq0=" />
        <meta name="robots" content="all"/>
        <meta name="revisit-after" content="5 days"/>
        <meta name="description" content=""/>
        <meta name="keywords" content=""/>
        <meta http-equiv="Content-Language" content="es"/>
        <meta name="language" content="es"/>
        <meta name="Copyright" content="phsperu.com"/>
        <meta property="og:image" content="<?php echo base_view();?>img/face1.jpg">
    	<meta property="og:image" content="<?php echo base_view();?>img/face2.jpg">
        <link rel="icon" type="image/png" href="<?php echo base_view();?>img/favicon.png"/>

        <!--Estilos-->
        <link rel="stylesheet" href="<?php echo base_view();?>css/estilos.css?<?php echo time(); ?>">
        <link rel="stylesheet" href="<?php echo base_view();?>css/responsive.css?<?php echo time(); ?>">
        <link rel="stylesheet" href="<?php echo base_view();?>css/hover.css">

        <!-- Camera Master -->
        <link rel="stylesheet" href="<?php echo base_view();?>resources/camera_master/css/camera.css" id="camera-css" type="text/css" media="all"> 
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <style type="text/css">
            .ui-state-disabled, .ui-widget-content .ui-state-disabled, .ui-widget-header .ui-state-disabled {
                opacity: inherit !important;
                filter: inherit !important;
            }
        </style>
	</head>
