<!doctype html>
<html lang="es">
  <head>
    <title>Listar Registros</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/pricing/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>

  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal"><img src="index2.png" style="width: 30px; position: absolute;"> <span style="position: relative; left: 35px;">Listar</span></h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="index.php">Registrar</a>
        <a class="p-2 text-dark" href="#">Actualizar</a>
        <a class="p-2 text-dark" href="#">Eliminar</a>
      </nav>
    </div>

    <div class="container px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Listado de Personas</h1>
      <p class="lead">Registros en la base de datos PostgreSQL</p>
    </div>

    <div class="container">
      <div class="card">
        <div class="card-body">
          <?php
          include("conexion.php");
          $con = conexion();

          if (!$con) {
              echo "<div class='alert alert-danger'>Error al conectar con la base de datos</div>";
          } else {
              $sql = "SELECT * FROM persona ORDER BY id";
              $result = pg_query($con, $sql);

              if (!$result) {
                  echo "<div class='alert alert-danger'>Error al ejecutar la consulta: " . pg_last_error($con) . "</div>";
              } else {
                  $num_rows = pg_num_rows($result);

                  if ($num_rows > 0) {
                      echo "<div class='table-responsive'>";
                      echo "<table class='table table-striped table-bordered'>";
                      echo "<thead class='thead-dark'>";
                      echo "<tr>";
                      echo "<th>ID</th>";
                      echo "<th>Documento</th>";
                      echo "<th>Nombre</th>";
                      echo "<th>Apellido</th>";
                      echo "<th>Dirección</th>";
                      echo "<th>Celular</th>";
                      echo "<th>Acciones</th>";
                      echo "</tr>";
                      echo "</thead>";
                      echo "<tbody>";

                      while ($row = pg_fetch_assoc($result)) {
                          echo "<tr>";
                          echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                          echo "<td>" . htmlspecialchars($row['doc']) . "</td>";
                          echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
                          echo "<td>" . htmlspecialchars($row['ape']) . "</td>";
                          echo "<td>" . htmlspecialchars($row['dir']) . "</td>";
                          echo "<td>" . htmlspecialchars($row['cel']) . "</td>";
                          echo "<td>";
                          echo "<a href='#' class='btn btn-sm btn-primary'>Editar</a> ";
                          echo "<a href='#' class='btn btn-sm btn-danger'>Eliminar</a>";
                          echo "</td>";
                          echo "</tr>";
                      }

                      echo "</tbody>";
                      echo "</table>";
                      echo "</div>";
                      echo "<div class='mt-3'>";
                      echo "<p class='text-muted'>Total de registros: <strong>$num_rows</strong></p>";
                      echo "</div>";
                  } else {
                      echo "<div class='alert alert-info'>No hay registros en la base de datos</div>";
                  }

                  pg_free_result($result);
              }

              pg_close($con);
          }
          ?>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
