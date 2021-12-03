<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Cargue Masivo!</title>
  </head>
  <body>
    <div class="col-lg-12" style="padding-top:20px">
<div class="card">
  <div class="card-header">
      <b>Importar Fichas</b>
  </div>
  <div class="card-body">

    <div class="row">
        <form action="#" enctype="multipart/form-data">
            <div class="row">
 <div class="col-lg-8">
     <input type="file" id="txt_archivo" class="form-control" accept=".csv, .xlsx, .xls">
 </div>

   <div class="col-lg-2">
       <button class="btn btn-danger" style="width:100%" onclick="CargarExcel()">Cargar Excel</button>
   </div>
   <div class="col-lg-2">
       <button class="btn btn-primary" style="width:100%" onclick="RegistrarExcel()" disabled id="btn_registrar">
       Guardar Datos</button>
   </div>
   <div class="col-lg-12" id="div_tabla">

   </div>
   </div>
</form>
   




     </div>
   </div>
 </div>

      </body>
</html>
<!-- Optional JavaScript; choose one of the two! -->

    
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" ></script>

    <script src="https://cdn.jsdelivr.net/ npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
 


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>


<script > 
    $('input[type="file"]').on('change', function(){
            var ext = $( this ).val().split('.').pop();
            if ($( this ).val() != '') {
            if(ext == "xls" || ext == "xlsx" || ext == "csv"){
            }
            else
            {
                $( this ).val('');
                Swal.fire("Mensaje De Error","Extensión no permitida: " + ext+"","error");
            }
            }
        });


function CargarExcel() {
    var excel = $("#txt_archivo").val();
    if(excel===""){
        return  Swal.fire("Mensaje De Advertencia","Selecciona un archivo excel", "warning");
    }
    var formData = new FormData();
    var files = $("#txt_archivo")[0].files[0];
    formData.append('archivoexcel',files);
    $.ajax({
        url:'importar_excel_ajax.php',
        type:'post',
        data:formData,
        contentType:false,
        processData:false,
        success:function(resp){
      $("#div_tabla").html(resp);
      document.getElementById('btn_registrar').disabled=false;
        }
    });
    return false;
}



function RegistrarExcel(){
  var contador=0;
  var arreglo_numero = new Array();
  var arreglo_tipo = new Array();
  var arreglo_fechaini = new Array();
  var arreglo_fechafin = new Array();
  var arreglo_estado = new Array();
  var arreglo_programa = new Array();

  

  $("#tabla_ficha tbody#tbody_tabla_ficha tr").each(function(){
    arreglo_numero.push($(this).find('td').eq(0).text().trim());
    arreglo_tipo.push($(this).find('td').eq(1).text().trim());
    arreglo_fechaini.push($(this).find('td').eq(2).text().trim());
    arreglo_fechafin.push($(this).find('td').eq(3).text().trim());
    arreglo_estado.push($(this).find('td').eq(4).text().trim());
    arreglo_programa.push($(this).find('td').eq(5).text().trim());
    contador++;
  })
 // alert(arreglo_numero+"-"+arreglo_tipo+"-"+arreglo_fechaini+"-"+arreglo_fechafin+"-"+arreglo_estado+"-"+arreglo_programa);

  if(contador==0){
    return  Swal.fire("Mensaje de advertencia","la tabla debe tener minimo como un dato","warning");
  }

 var Numero = arreglo_numero.toString();
 var Tipo = arreglo_tipo.toString();
 var FechaIni = arreglo_fechaini.toString();
 var FechaFin = arreglo_fechafin.toString();
 var Estado = arreglo_estado.toString();
 var Programa = arreglo_programa.toString();

  $.ajax({
    url: 'registro.php',
    type: 'post',
    data:{
    n:Numero,
    t:Tipo,
    fini:FechaIni,
    fnal:FechaFin,
    e:Estado,
    p:Programa
    }
  }).done(function(resp){
   alert(resp);
  })

}
    </script>
   