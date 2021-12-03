  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
<title></title>
<style>
    table.dataTable thead {
        background: linear-gradient(to right, #F87800, #FBBF50);
        color:white;
    }
</style>  
  
</head>
<body>
<div class="sidebar" data-color="orange">
<br>
<div class="sidebar" data-color="orange">
    
    
    <div class="logo">
  
      <a class="simple-text logo-normal">
        SENA
      </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
      <ul class="nav">
        <li>
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("./Vista/Aprendiz/examples/dashboard.html")?>">
            <i class="now-ui-icons design_app"></i>
            <p>Dashboard</p>
          </a>
        </li>
         <li class="active ">
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("./Vista/Aprendiz/consulta.php")?>">
            <i class="now-ui-icons education_atom"></i>
            <p>Consultar Asistencia</p>
          </a>
        </li>
        <li>
          <a href="examples/excusa.html">
            <i class="now-ui-icons location_map-big"></i>
            <p>Excusa</p>
          </a>
        </li>
        <li>
          <a href="examples/notificar.html">
            <i class="now-ui-icons ui-1_bell-53"></i>
            <p>Notificaciones</p>
          </a>
        </li>
       <li>
          <a href="examples/perfil.php">
            <i class="now-ui-icons ui-1_bell-53"></i>
            <p>Perfil</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
 
  <h1 class="text-center">Datos de tabla</h1>
    
  <h3 class="text-center">Consulta de asistencia</h3>
  
  <div class="container">
     <div class="row">
         <div class="col-lg-12">
          <table id="tablaUsuarios" class="table-striped table-bordered" style="width:100%">
              <thead class="text-center">
                  <th>id</th>
                  <th>Fecha Registro</th>
                  <th>Nombre Instructor</th>
                  <th>Apellido Instructor</th>
                  <th>Tematica</th>
              </thead>
              <tbody>
                  <?php
                      foreach($asistencia as $asistencia){
                  ?>
                  <tr>
                    <td><?php echo $asistencia['IdAsistencia'] ?></td>
                    <td><?php echo $asistencia['Fecha_Registro'] ?></td>
                    <td><?php echo $asistencia['Nombre_Instructor'] ?></td>
                    <td><?php echo $asistencia['Apellido_Instructor'] ?></td>
                    <td><?php echo $asistencia['Nombre_Actividad'] ?></td>
                  </tr>
                  <?php
                      }
                  ?>
              </tbody>
          </table>
         </div>
     </div> 
  </div>
 
  


  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    

  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  
    
    
  <script>
    $(document).ready(function(){
       $('#tablaUsuarios').DataTable(); 
    });
  </script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      
      

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  
      
      
    <script>
      $(document).ready(function(){
         $('#tablaUsuarios').DataTable(); 
      });
    </script>
  </div>
</div>
