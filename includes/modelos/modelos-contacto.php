<?php

    if($_POST['accion'] == 'crear'){
        // importar el módulo de conexión a la base de datos
        require_once('../funciones/bd.php');

        // Filtros de seguridad
        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $empresa = filter_var($_POST['empresa'], FILTER_SANITIZE_STRING);
        $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);

        try {
            // Prepared statement
            // La llave primaria se ignora porque se autoincrementa.
            $statement = $conn->prepare("INSERT INTO contactos (nombre, empresa, telefono) VALUES(?, ? ,?)");
            $statement->bind_param("sss",$nombre, $empresa, $telefono);
            $statement->execute();
            if($statement->affected_rows == 1){
                $response = array(
                    'respuesta'=>'correcto',
                    'datos' => array(
                        'id'=> $statement->insert_id,
                        'nombre'=>$nombre,
                        'empresa'=>$empresa,
                        'telefono'=>$telefono
                    )
                );
            }

            $statement->close();
            $conn->close();
        } catch (Exception $e) {
            $response = array(
                'error' => $e.getMessage()
            );
        }
        echo json_encode($response);
    }
?>