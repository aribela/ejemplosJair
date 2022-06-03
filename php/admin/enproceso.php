<?php
session_start();
$idRol = $_SESSION['idRol'];
switch ($idRol) {
    case 1: $rol = true; break;
	case 2: $rol = true; break;
    case 3: $rol = true; break;
    case 4: $rol = true; break;
    default: $rol = false; break;
}
if($_SESSION['status']!= "ok" || $rol!=true)
        header("location: logout.php");

include_once '../common/screenPortions.php';
include_once '../brules/KoolControls/KoolGrid/koolgrid.php';
require_once '../brules/KoolControls/KoolAjax/koolajax.php';
require_once '../brules/KoolControls/KoolCalendar/koolcalendar.php';
include_once '../brules/KoolControls/KoolGrid/ext/datasources/MySQLiDataSource.php';
$localization = "../brules/KoolControls/KoolCalendar/localization/es.xml";
include_once '../brules/datosPanelObj.php';
include_once '../brules/rowFormObj.php';
include_once '../brules/atributoObj.php';
include_once '../brules/utilsObj.php';
//establecer la zona horaria
$dateByZone = new DateTime("now", new DateTimeZone('America/Mexico_City') );
$dateTime = $dateByZone->format('Y-m-d H:i:s'); //fecha Actual

$datosPanelObj = new datosPanelObj();
$datosPanelObj->titulo = 'Panel ejemplo';

$ejemploHd = new rowFormObj();
$ejemploHd->claseRow = '';
$ejemploHd->claseDivLabel = '';
$ejemploHd->claseDivInput = '';
$ejemploHd->claseInput = '';
$ejemploHd->nameid = 'hiddenId';
$ejemploHd->label = '';
$ejemploHd->type = 'hidden';

$ejemploTx = new rowFormObj();
$ejemploTx->claseRow = '';
$ejemploTx->claseDivLabel = 'col-xs-12 col-md-4 text-right';
$ejemploTx->claseDivInput = 'col-xs-12 col-md-6';
$ejemploTx->claseInput = 'form-control';
$ejemploTx->nameid = 'prueba';
$ejemploTx->label = 'Prueba';
$ejemploTx->type = 'text';

$arrCampos =  array();
$arrCampos[] = $ejemploHd;
$arrCampos[] = $ejemploTx;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>En proceso</title>
    <?php echo estilosPagina(true); ?>
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    
</head>
<body>
    <?php echo getHeaderMain($_SESSION['myusername'], true);?>
    <?php $menu = getAdminMenu(); ?>

    <input type="hidden" name="vista" id="vista" value="inicio">

    <section class="section-internas">
        <div class="panel-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="colmenu col-md-2 menu_bg">
                        <?php echo getNav($menu); ?>
                    </div>
                    <div class="col-md-10">
                        <h1 class="titulo">En proceso <span class="pull-right"><a id="btnAyudaweb" onclick="mostrarAyuda('web_inicio')" href="#fancyAyudaWeb"><img src="../images/icon_ayuda.png" width="20px"></a></span></h1>  


                        <ol class="breadcrumb">
                          <li><a href="index.php">Inicio</a></li>
                          <li class="active">Subir documentos</li>
                        </ol>

                        <p>En proceso</p>
                        <?php echo generaHtmlForm2($datosPanelObj, $arrCampos);?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="panel-footer">
            <?php echo getPiePag(true); ?>
        </div>
    </footer>

    <?php echo scriptsPagina(true); ?>
</body>
</html>
