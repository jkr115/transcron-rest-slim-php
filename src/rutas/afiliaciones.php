<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

$app->add(function($request, $response, $next) {
  $response = $next($request, $response);
  return $response->withHeader('Content-Type', 'application/json');
});

// POST Crear nueva empresa 
$app->post('/api/empresa/nuevo', function(Request $request, Response $response){
   $no_documento   = $request->getParam('no_documento');
   $tipo = $request->getParam('tipo');
   $nombre = $request->getParam('nombre');
   $direccion = $request->getParam('direccion');
   $ciudad = $request->getParam('ciudad');
   $departamento = $request->getParam('departamento');
   $pais = $request->getParam('pais');
   $telefono = $request->getParam('telefono'); 
  
  $sql = "INSERT INTO empresa (no_documento, tipo, nombre, direccion, ciudad, departamento, pais, telefono) VALUES 
          (:no_documento, :tipo, :nombre, :direccion, :ciudad, :departamento, :pais, :telefono)";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->prepare($sql);

    $resultado->bindParam(':no_documento', $no_documento);
    $resultado->bindParam(':tipo', $tipo);
    $resultado->bindParam(':nombre', $nombre);
    $resultado->bindParam(':direccion', $direccion);
    $resultado->bindParam(':ciudad', $ciudad);
    $resultado->bindParam(':departamento', $departamento);
    $resultado->bindParam(':pais', $pais);
    $resultado->bindParam(':telefono', $telefono);

    $resultado->execute();
    echo json_encode("Nueva empresa guardada.");  

    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
});


// GET Todos las empresas
$app->get('/api/empresa', function(Request $request, Response $response){
  $sql = "SELECT * FROM empresa";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $empresa = $resultado->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($empresa);
    }else {
      echo json_encode("No existen empresas en la BBDD.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
});


// GET Recueperar empresa por no_documento
$app->get('/api/empresa/{id}', function(Request $request, Response $response){
  $id = $request->getAttribute('id');
  $sql = "SELECT * FROM empresa WHERE id = $id";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $empresa = $resultado->fetchAll(PDO::FETCH_ASSOC);
      echo json_encode($empresa[0]);
    }else {
      echo json_encode("No existen empresas en la BD con este numero de id.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
});

// PUT Modificar empresa 
$app->put('/api/empresa/modificar/{id}', function(Request $request, Response $response){
  $id = $request->getAttribute('id');
  $tipo = $request->getParam('tipo');
  $nombre = $request->getParam('nombre');
  $direccion = $request->getParam('direccion');
  $ciudad = $request->getParam('ciudad');
  $departamento = $request->getParam('departamento');
  $pais = $request->getParam('pais');
  $telefono = $request->getParam('telefono'); 
 
 $sql = "UPDATE empresa SET
         tipo = :tipo,
         nombre = :nombre,
         direccion = :direccion,
         ciudad = :ciudad,
         departamento = :departamento,
         pais = :pais,
         telefono = :telefono
       WHERE id = $id";
    
 try{
   $db = new db();
   $db = $db->conectDB();
   $resultado = $db->prepare($sql);

   $resultado->bindParam(':tipo', $tipo);
   $resultado->bindParam(':nombre', $nombre);
   $resultado->bindParam(':direccion', $direccion);
   $resultado->bindParam(':ciudad', $ciudad);
   $resultado->bindParam(':departamento', $departamento);
   $resultado->bindParam(':pais', $pais);
   $resultado->bindParam(':telefono', $telefono);


   $resultado->execute();
   echo json_encode("Empresa modificada.");  

   $resultado = null;
   $db = null;
 }catch(PDOException $e){
   echo '{"error" : {"text":'.$e->getMessage().'}';
 }
}); 



// DELETE borar empresa 
$app->delete('/api/empresa/eliminar/{id}', function(Request $request, Response $response){
  $id = $request->getAttribute('id');
  $sql = "DELETE FROM empresa WHERE id = $id";
    
 try{
   $db = new db();
   $db = $db->conectDB();
   $resultado = $db->prepare($sql);
   $resultado->execute();

   if ($resultado->rowCount() > 0) {
     echo json_encode("Empresa eliminada.");  
   }else {
     echo json_encode("No existe empresa con este numero de id.");
   }

   $resultado = null;
   $db = null;
 }catch(PDOException $e){
   echo '{"error" : {"text":'.$e->getMessage().'}';
 }
}); 


// POST Crear nuevo representante legal
$app->post('/api/representante/nuevo', function(Request $request, Response $response){
  $no_documento   = $request->getParam('no_documento');
  $tipo = $request->getParam('tipo');
  $nombre = $request->getParam('nombre');
  $direccion = $request->getParam('direccion');
  $ciudad = $request->getParam('ciudad');
  $departamento = $request->getParam('departamento');
  $pais = $request->getParam('pais');
  $telefono = $request->getParam('telefono');
  $id_empresa = $request->getParam('id_empresa'); 
 
 $sql = "INSERT INTO representante_legal (no_documento, tipo, nombre, direccion, ciudad, departamento, pais, telefono, id_empresa) VALUES 
         (:no_documento, :tipo, :nombre, :direccion, :ciudad, :departamento, :pais, :telefono, :id_empresa)";
 try{
   $db = new db();
   $db = $db->conectDB();
   $resultado = $db->prepare($sql);

   $resultado->bindParam(':no_documento', $no_documento);
   $resultado->bindParam(':tipo', $tipo);
   $resultado->bindParam(':nombre', $nombre);
   $resultado->bindParam(':direccion', $direccion);
   $resultado->bindParam(':ciudad', $ciudad);
   $resultado->bindParam(':departamento', $departamento);
   $resultado->bindParam(':pais', $pais);
   $resultado->bindParam(':telefono', $telefono);
   $resultado->bindParam(':id_empresa', $id_empresa);

   $resultado->execute();
   echo json_encode("Nuevo representante legal guardado.");  

   $resultado = null;
   $db = null;
 }catch(PDOException $e){
   echo '{"error" : {"text":'.$e->getMessage().'}';
 }
}); 


// GET Todos los representantes legales
$app->get('/api/representante', function(Request $request, Response $response){
  $sql = "SELECT * FROM representante_legal";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $representante = $resultado->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($representante);
    }else {
      echo json_encode("No existen representantes legales en la BD.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
});


// GET Recueperar representante por no_documento
$app->get('/api/representante/{id}', function(Request $request, Response $response){
  $id = $request->getAttribute('id');
  $sql = "SELECT * FROM representante_legal WHERE id = $id";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $representante = $resultado->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($representante);
    }else {
      echo json_encode("No existen representantes en la BD con este numero id.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
});


// PUT Modificar representante legal 
$app->put('/api/representante/modificar/{id}', function(Request $request, Response $response){
  $id = $request->getAttribute('id');
  $tipo = $request->getParam('tipo');
  $nombre = $request->getParam('nombre');
  $direccion = $request->getParam('direccion');
  $ciudad = $request->getParam('ciudad');
  $departamento = $request->getParam('departamento');
  $pais = $request->getParam('pais');
  $telefono = $request->getParam('telefono');
  $id_empresa = $request->getParam('id_empresa'); 
 
 $sql = "UPDATE representante_legal SET
         tipo = :tipo,
         nombre = :nombre,
         direccion = :direccion,
         ciudad = :ciudad,
         departamento = :departamento,
         pais = :pais,
         telefono = :telefono,
         id_empresa = :id_empresa
       WHERE id = $id";
    
 try{
   $db = new db();
   $db = $db->conectDB();
   $resultado = $db->prepare($sql);

   $resultado->bindParam(':tipo', $tipo);
   $resultado->bindParam(':nombre', $nombre);
   $resultado->bindParam(':direccion', $direccion);
   $resultado->bindParam(':ciudad', $ciudad);
   $resultado->bindParam(':departamento', $departamento);
   $resultado->bindParam(':pais', $pais);
   $resultado->bindParam(':telefono', $telefono);
   $resultado->bindParam(':id_empresa', $id_empresa);


   $resultado->execute();
   echo json_encode("Representante modificado.");  

   $resultado = null;
   $db = null;
 }catch(PDOException $e){
   echo '{"error" : {"text":'.$e->getMessage().'}';
 }
});


// DELETE borar representante 
$app->delete('/api/representante/eliminar/{id}', function(Request $request, Response $response){
  $id = $request->getAttribute('id');
  $sql = "DELETE FROM representante_legal WHERE id = $id";
    
 try{
   $db = new db();
   $db = $db->conectDB();
   $resultado = $db->prepare($sql);
   $resultado->execute();

   if ($resultado->rowCount() > 0) {
     echo json_encode("Representante eliminado.");  
   }else {
     echo json_encode("No existe representante legal con este numero de id.");
   }

   $resultado = null;
   $db = null;
 }catch(PDOException $e){
   echo '{"error" : {"text":'.$e->getMessage().'}';
 }
}); 



// POST Crear nuevo vehiculo
$app->post('/api/vehiculo/nuevo', function(Request $request, Response $response){
  $placa   = $request->getParam('placa');
  $motor = $request->getParam('motor');
  $chasis = $request->getParam('chasis');
  $modelo = $request->getParam('modelo');
  $fecha_matricula = $request->getParam('fecha_matricula');
  $p_sentados = $request->getParam('p_sentados');
  $p_pie = $request->getParam('p_pie');
  $peso_seco = $request->getParam('peso_seco');
  $peso_bruto = $request->getParam('peso_bruto');
  $puertas = $request->getParam('puertas'); 
  $marca = $request->getParam('marca'); 
  $linea = $request->getParam('linea');
  $id_empresa = $request->getParam('id_empresa');
 
 $sql = "INSERT INTO vehiculo (placa, motor, chasis, modelo, fecha_matricula, p_sentados, p_pie, peso_seco, peso_bruto, puertas, marca, linea, id_empresa) VALUES 
         (:placa, :motor, :chasis, :modelo, :fecha_matricula, :p_sentados, :p_pie, :peso_seco, :peso_bruto, :puertas, :marca, :linea, :id_empresa)";
 try{
   $db = new db();
   $db = $db->conectDB();
   $resultado = $db->prepare($sql);

   $resultado->bindParam(':placa', $placa);
   $resultado->bindParam(':motor', $motor);
   $resultado->bindParam(':chasis', $chasis);
   $resultado->bindParam(':modelo', $modelo);
   $resultado->bindParam(':fecha_matricula', $fecha_matricula);
   $resultado->bindParam(':p_sentados', $p_sentados);
   $resultado->bindParam(':p_pie', $p_pie);
   $resultado->bindParam(':peso_seco', $peso_seco);
   $resultado->bindParam(':peso_bruto', $peso_bruto);
   $resultado->bindParam(':puertas', $puertas);
   $resultado->bindParam(':marca', $marca);
   $resultado->bindParam(':linea', $linea);
   $resultado->bindParam(':id_empresa', $id_empresa);


   $resultado->execute();
   echo json_encode("Nuevo vehiculo guardado.");  

   $resultado = null;
   $db = null;
 }catch(PDOException $e){
   echo '{"error" : {"text":'.$e->getMessage().'}';
 }
}); 


// GET Todos los vehículos
$app->get('/api/vehiculo', function(Request $request, Response $response){
  $sql = "SELECT * FROM vehiculo";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $vehiculo = $resultado->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($vehiculo);
    }else {
      echo json_encode("No existen vehículos en la BD.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
});

// GET Recueperar vehículo por placa
$app->get('/api/vehiculo/{id}', function(Request $request, Response $response){
  $id = $request->getAttribute('id');
  $sql = "SELECT * FROM vehiculo WHERE id = $id";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $vehiculo = $resultado->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($vehiculo);
    }else {
      echo json_encode("No existen vehiculos en la BD con este id.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
});

// PUT Modificar representante legal 
$app->put('/api/vehiculo/modificar/{id}', function(Request $request, Response $response){
  $id = $request->getAttribute('id');
  $placa = $request->getParam('placa');
  $motor = $request->getParam('motor');
  $chasis = $request->getParam('chasis');
  $modelo = $request->getParam('modelo');
  $fecha_matricula = $request->getParam('fecha_matricula');
  $p_sentados = $request->getParam('p_sentados');
  $p_pie = $request->getParam('p_pie');
  $peso_seco = $request->getParam('peso_seco');
  $peso_bruto = $request->getParam('peso_bruto');
  $puertas = $request->getParam('puertas'); 
  $marca = $request->getParam('marca'); 
  $linea = $request->getParam('linea');
  $id_empresa = $request->getParam('id_empresa');
 
 $sql = "UPDATE vehiculo SET
         placa = :placa,
         motor = :motor,
         chasis = :chasis,
         modelo = :modelo,
         fecha_matricula = :fecha_matricula,
         p_sentados = :p_sentados,
         p_pie = :p_pie,
         peso_seco = :peso_seco,
         peso_bruto = :peso_bruto,
         peso_seco = :peso_seco,
         marca = :marca,
         linea = :linea,
         id_empresa = :id_empresa
       WHERE id = $id";
    
 try{
   $db = new db();
   $db = $db->conectDB();
   $resultado = $db->prepare($sql);

   $resultado->bindParam(':placa', $placa);
   $resultado->bindParam(':motor', $motor);
   $resultado->bindParam(':chasis', $chasis);
   $resultado->bindParam(':modelo', $modelo);
   $resultado->bindParam(':fecha_matricula', $fecha_matricula);
   $resultado->bindParam(':p_sentados', $p_sentados);
   $resultado->bindParam(':p_pie', $p_pie);
   $resultado->bindParam(':peso_seco', $peso_seco);
   $resultado->bindParam(':peso_bruto', $peso_bruto);
   $resultado->bindParam(':puertas', $puertas);
   $resultado->bindParam(':marca', $marca);
   $resultado->bindParam(':linea', $linea);
   $resultado->bindParam(':id_empresa', $id_empresa);


   $resultado->execute();
   echo json_encode("Vehiculo modificado.");  

   $resultado = null;
   $db = null;
 }catch(PDOException $e){
   echo '{"error" : {"text":'.$e->getMessage().'}';
 }
});


// DELETE borar representante 
$app->delete('/api/vehiculo/eliminar/{id}', function(Request $request, Response $response){
  $id = $request->getAttribute('id');
  $sql = "DELETE FROM vehiculo WHERE id = $id";
    
 try{
   $db = new db();
   $db = $db->conectDB();
   $resultado = $db->prepare($sql);
   $resultado->execute();

   if ($resultado->rowCount() > 0) {
     echo json_encode("Vehiculo eliminado.");  
   }else {
     echo json_encode("No existe vehiculo con este numero de id.");
   }

   $resultado = null;
   $db = null;
 }catch(PDOException $e){
   echo '{"error" : {"text":'.$e->getMessage().'}';
 }
}); 




// POST Crear nuevo conductor
$app->post('/api/conductor/nuevo', function(Request $request, Response $response){
  $no_documento   = $request->getParam('no_documento');
  $tipo = $request->getParam('tipo');
  $nombre = $request->getParam('nombre');
  $direccion = $request->getParam('direccion');
  $ciudad = $request->getParam('ciudad');
  $departamento = $request->getParam('departamento');
  $pais = $request->getParam('pais');
  $telefono = $request->getParam('telefono');
 
 $sql = "INSERT INTO conductor (no_documento, tipo, nombre, direccion, ciudad, departamento, pais, telefono) VALUES 
         (:no_documento, :tipo, :nombre, :direccion, :ciudad, :departamento, :pais, :telefono)";
 try{
   $db = new db();
   $db = $db->conectDB();
   $resultado = $db->prepare($sql);

   $resultado->bindParam(':no_documento', $no_documento);
   $resultado->bindParam(':tipo', $tipo);
   $resultado->bindParam(':nombre', $nombre);
   $resultado->bindParam(':direccion', $direccion);
   $resultado->bindParam(':ciudad', $ciudad);
   $resultado->bindParam(':departamento', $departamento);
   $resultado->bindParam(':pais', $pais);
   $resultado->bindParam(':telefono', $telefono);

   $resultado->execute();
   echo json_encode("Nuevo conductor guardado.");  

   $resultado = null;
   $db = null;
 }catch(PDOException $e){
   echo '{"error" : {"text":'.$e->getMessage().'}';
 }
}); 


// GET Todos los conductores
$app->get('/api/conductor', function(Request $request, Response $response){
  $sql = "SELECT * FROM conductor";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $conductor = $resultado->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($conductor);
    }else {
      echo json_encode("No existen conductores en la BD.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
});


// GET Recueperar conductor id
$app->get('/api/conductor/{id}', function(Request $request, Response $response){
  $id = $request->getAttribute('id');
  $sql = "SELECT * FROM conductor WHERE id = $id";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $conductor = $resultado->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($conductor);
    }else {
      echo json_encode("No existen conductores en la BD con este numero id.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
});


// PUT Modificar conductor 
$app->put('/api/conductor/modificar/{id}', function(Request $request, Response $response){
  $id = $request->getAttribute('id');
  $tipo = $request->getParam('tipo');
  $nombre = $request->getParam('nombre');
  $direccion = $request->getParam('direccion');
  $ciudad = $request->getParam('ciudad');
  $departamento = $request->getParam('departamento');
  $pais = $request->getParam('pais');
  $telefono = $request->getParam('telefono');
 
 $sql = "UPDATE conductor SET
         tipo = :tipo,
         nombre = :nombre,
         direccion = :direccion,
         ciudad = :ciudad,
         departamento = :departamento,
         pais = :pais,
         telefono = :telefono
       WHERE id = $id";
    
 try{
   $db = new db();
   $db = $db->conectDB();
   $resultado = $db->prepare($sql);

   $resultado->bindParam(':tipo', $tipo);
   $resultado->bindParam(':nombre', $nombre);
   $resultado->bindParam(':direccion', $direccion);
   $resultado->bindParam(':ciudad', $ciudad);
   $resultado->bindParam(':departamento', $departamento);
   $resultado->bindParam(':pais', $pais);
   $resultado->bindParam(':telefono', $telefono);

   $resultado->execute();
   echo json_encode("Conductor modificado.");  

   $resultado = null;
   $db = null;
 }catch(PDOException $e){
   echo '{"error" : {"text":'.$e->getMessage().'}';
 }
});

// DELETE borar conductor 
$app->delete('/api/conductor/eliminar/{id}', function(Request $request, Response $response){
  $id = $request->getAttribute('id');
  $sql = "DELETE FROM conductor WHERE id = $id";
    
 try{
   $db = new db();
   $db = $db->conectDB();
   $resultado = $db->prepare($sql);
   $resultado->execute();

   if ($resultado->rowCount() > 0) {
     echo json_encode("Conductor eliminado.");  
   }else {
     echo json_encode("No existe conductor con este numero de id.");
   }

   $resultado = null;
   $db = null;
 }catch(PDOException $e){
   echo '{"error" : {"text":'.$e->getMessage().'}';
 }
}); 


// POST Crear nuevo vinculo entre conductor y vehiculo
$app->post('/api/vinculacion/nuevo', function(Request $request, Response $response){
  $id_conductor   = $request->getParam('id_conductor');
  $id_vehiculo = $request->getParam('id_vehiculo');

 $sql = "INSERT INTO vinculacion (id_conductor, id_vehiculo) VALUES 
         (:id_conductor, :id_vehiculo)";
 try{
   $db = new db();
   $db = $db->conectDB();
   $resultado = $db->prepare($sql);

   $resultado->bindParam(':id_conductor', $id_conductor);
   $resultado->bindParam(':id_vehiculo', $id_vehiculo);

   $resultado->execute();
   echo json_encode("Nueva vinculacion guardada.");  

   $resultado = null;
   $db = null;
 }catch(PDOException $e){
   echo '{"error" : {"text":'.$e->getMessage().'}';
 }
});


// GET Todos las vinculaciones
$app->get('/api/vinculacion', function(Request $request, Response $response){
  $sql = "SELECT * FROM vinculacion";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $vinculacion = $resultado->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($vinculacion);
    }else {
      echo json_encode("No existen vinculaciones en la BD.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
});



// GET Recueperar vinculacion por no id
$app->get('/api/vinculacion/{id}', function(Request $request, Response $response){
  $id = $request->getAttribute('id');
  $sql = "SELECT * FROM vinculacion WHERE id = $id";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $vinculacion = $resultado->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($vinculacion);
    }else {
      echo json_encode("No existen vinculacion en la BD con este numero de id.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
});


// PUT Modificar vinculacion 
$app->put('/api/vinculacion/modificar/{id}', function(Request $request, Response $response){
  $id = $request->getAttribute('id');
  $id_conductor = $request->getParam('id_conductor');
  $id_vehiculo = $request->getParam('id_vehiculo');

 $sql = "UPDATE vinculacion SET
         id_conductor = :id_conductor,
         id_vehiculo = :id_vehiculo
       WHERE id = $id";
    
 try{
   $db = new db();
   $db = $db->conectDB();
   $resultado = $db->prepare($sql);

   $resultado->bindParam(':id_conductor', $id_conductor);
   $resultado->bindParam(':id_vehiculo', $id_vehiculo);

   $resultado->execute();
   echo json_encode("Vinculacion modificada.");  

   $resultado = null;
   $db = null;
 }catch(PDOException $e){
   echo '{"error" : {"text":'.$e->getMessage().'}';
 }
}); 


// DELETE borar vinculación por id
$app->delete('/api/vinculacion/eliminar/{id}', function(Request $request, Response $response){
  $id = $request->getAttribute('id');
  $sql = "DELETE FROM vinculacion WHERE id = $id";
    
 try{
   $db = new db();
   $db = $db->conectDB();
   $resultado = $db->prepare($sql);
   $resultado->execute();

   if ($resultado->rowCount() > 0) {
     echo json_encode("Vinculacion eliminada.");  
   }else {
     echo json_encode("No existe vinculacion con este numero de id.");
   }

   $resultado = null;
   $db = null;
 }catch(PDOException $e){
   echo '{"error" : {"text":'.$e->getMessage().'}';
 }
}); 


// GET Obtener la vista principal
$app->get('/api/vehiculogeneral', function(Request $request, Response $response){
  $sql = "SELECT c.id, c.placa, e.nombre empresa, e.tipo tipo_doc_empresa, e.no_documento no_doc_empresa, 
            r.nombre representante_legal, r.tipo tipo_doc_representante, r.no_documento no_doc_representante, 
            COUNT(p.id_vehiculo) AS no_conductores
          FROM vehiculo c LEFT JOIN
              vinculacion p ON p.id_vehiculo = c.id
              INNER JOIN
              empresa e ON e.id = c.id_empresa
              INNER JOIN
              representante_legal r ON e.id = r.id_empresa
          GROUP BY c.placa
          HAVING
          no_conductores > 2";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $vinculacion = $resultado->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($vinculacion);
    }else {
      echo json_encode("No existen vehiculos con más de dos conducteres vinculados en la BD.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
});

