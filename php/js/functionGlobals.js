function cargaSelector(idInputOrigen, idInputDestino, tabla, opcTodos, opcSelectorDestino){
    // if(typeof opcTodos !== "undefined"){
    //   opcTodos = (opcTodos == -1)?false:opcTodos;
    // }
    var presupuestoAlmacenId = ($("#presupuestoAlmacenId").length)?$("#presupuestoAlmacenId").val():'';

    var idOrigen = $("#"+idInputOrigen).val();
    if($("#"+idInputDestino).attr("multiple")){
      console.log($("#"+idInputOrigen).val());
      idOrigen = ($("#"+idInputOrigen).val()  !== null )?$("#"+idInputOrigen).val().toString():'';
    }
    var params = {
        funct: 'cargaSelector',
        idOrigen: idOrigen,
        idInputOrigen: idInputOrigen,
        idInputDestino: idInputDestino,
        tabla: tabla,
        opcTodos: opcTodos,
        presupuestoAlmacenId: presupuestoAlmacenId,
    };
    // $("#").html("");
    var htmlOriginal = showLoading(idInputDestino);

    var activeSelectPicker = false;
    // console.log(idInputDestino+" "+$("#"+idInputDestino).attr('class'));
    if($("#"+idInputDestino).hasClass('selectpicker')){
      // console.log("activar");
      activeSelectPicker = true
      $("#"+idInputDestino).selectpicker('destroy');
    }

    ajaxData(params, function(data){
      hideLoading(idInputDestino, htmlOriginal);
      
      if(activeSelectPicker){
        // $("#"+idInputDestino).selectpicker('destroy');
      }
      
      setTimeout(function(){
        $("button[data-id='"+idInputDestino+"']").remove();
          $("#"+idInputDestino).html(data.html);
          if(activeSelectPicker){
            // $("#"+idInputDestino).selectpicker('destroy');
            $("#"+idInputDestino).selectpicker();
          }
      }, 100);
      // if(idInputOrigen == 'rubroId' || typeof (opcSelectorDestino) != "undefined"){
      //   $("#"+idInputDestino).selectpicker();
      //   // $(".selectpicker").selectpicker();
      //   setTimeout(function(){
      //     console.log('productoIdSelect', productoIdSelect);
      //     if(productoIdSelect > 0){
      //       $("#"+idInputDestino).val(productoIdSelect);
      //       $("#"+idInputDestino).trigger("change");
      //     }
      //   }, 1000);
      // }
    });
}


function ajaxData(data, response){
    $.ajax({
        type: 'GET',
        dataType: 'jsonp',
        data: data,
        jsonp: 'callback',
        url: '../ajaxcall/ajaxFunctions.php',
        beforeSend: function () {
            //$("#imgLoadSave").show();
        },
        complete: function () {
        },
        success: function (data) {
            //console.log(data);
            response(data);
        },
        error: function () {
          response(data, 'error');
        }
    });
  }