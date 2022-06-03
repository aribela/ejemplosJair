<?php 

$function= $_GET['funct'];
switch ($function){
    case "cargaSelector":
        cargaSelector($_GET['callback']);
      break;
}

function cargaSelector($callback){
    $catJuiciosObj = new catJuiciosObj();
    $catJuzgadosObj = new catJuzgadosObj();
    $catAccionesObj = new catAccionesObj();

    $html = "";
    $arrConsulta = array();
    $opcTodos = (isset($_GET["opcTodos"]))?$_GET["opcTodos"]:false;
    $onchange = "";
    $tipochange = (isset($_GET["tipochange"]))?$_GET["tipochange"]:1;
    $dataText = "";
    $campoDT = "";
    $campoDT2 = "";
    $clases = "";//Jair 24/3/2022 Clases para el selector

    switch ($_GET["tabla"]) {
        

        case 'juicios':
          $arrConsulta = $catJuiciosObj->ObtJuicios("", $_GET["idOrigen"]);
          $idTabla = "idJuicio";
          $campoDT = "";
          $clases = "selectpicker";
      break;

      case 'juzgados':
        $arrConsulta = $catJuzgadosObj->ObtJuzgados("", $_GET["idOrigen"]);
        $idTabla = "idJuzgado";
        $campoDT = "";
        $clases = "selectpicker";
    break;

    case 'acciones':
      $arrConsulta = $catAccionesObj->ObtAcciones("", $_GET["idOrigen"]);
      $idTabla = "idAccion";
      $campoDT = "";
    break;

        default:
            # code...
            break;
    }

    switch ($tipochange) {
      case '1':
        $onchange = 'onchange="guardaValorTextoDeSelect(this, \'uMedidaId\');"';
      break;

      case '2':
        $onchange = 'onchange="cargaSelector(\'$_GET["idInputOrigen"]\', \'$_GET["idInputDestino"]\', \'$_GET["tabla"]\')"';
      break;

      default:
        # code...
        break;
    }
    // if(count($arrConsulta) > 0){
    $html .= '<select name="'.$_GET["idInputDestino"].'" id="'.$_GET["idInputDestino"].'" class="form-control required '.$clases.'" '.$onchange.'>';
    $html .= '<option value="">Seleccione...</option>';

    if($opcTodos){
        $html .= '<option value="0">Todos</option>';
    }

    foreach ($arrConsulta as $item) {
      $dataText = ($campoDT != "")?' data-texto="'.$item->$campoDT.'" ':'';
      $dataText2 = ($campoDT2 != "")?' data-texto2="'.$item->$campoDT2.'" ':'';
      $html .= '<option value="'.$item->$idTabla.'" '.$dataText.' '.$dataText2.'>'.$item->nombre.'</option>';
    }
    $html .= '</select>';
    // }


    $arr = array("success" => true, "html" => $html);
    echo $callback . '(' . json_encode($arr) . ');'; 
}