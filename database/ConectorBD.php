<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConectorBDODBC
 *
 * @author Andres
 */
class ConectorBD
{
    private $servidor;
    private $usuario;
    private $clave;
    private $conexion;

    function __construct()
    {
        $archivo = dirname(__FILE__) . '/../configuracion.ini';
        if (file_exists($archivo)) {
            $datos = parse_ini_file($archivo);
            $this->servidor = $datos['servidor'];
            $this->usuario = $datos['usuario'];
            $this->clave = $datos['clave'];
        }
    }

    function conectar()
    {
        try {
            // Crear la conexión ODBC
            $this->conexion = odbc_connect($this->servidor, $this->usuario, $this->clave);
            if (!$this->conexion) {
                throw new Exception(odbc_errormsg());
            }
        } catch (Exception $exc) {
            echo "<p>Error al conectarse con la base de datos: {$exc->getMessage()}</p>";
        }
    }

    function desconectar()
    {
        if ($this->conexion) {
            odbc_close($this->conexion);
        }
    }

    static function ejecutarQuery($cadenaSQL)
    {
        $conector = new ConectorBD();
        $conector->conectar();
        $resultado = [];

        try {
            @$sentencia = odbc_exec($conector->conexion, $cadenaSQL);
            if (!$sentencia) {
                // Captura el error si la ejecución falla
                $errorCode = odbc_error($conector->conexion);
                $errorMessage = odbc_errormsg($conector->conexion);

                // Mapea el error y muestra el mensaje
                $resultado = self::mapErrorToMessage($errorCode, $errorMessage);
                echo json_encode($resultado);
            } else {
                // Verificar si es un INSERT, UPDATE o DELETE
                if (preg_match('/^(INSERT|UPDATE|DELETE)/i', $cadenaSQL)) {
                    $resultado = ["status" => "success", "message" => "Operación realizada con éxito."];
                    echo json_encode($resultado);
                } else {
                    // Para SELECT, obtener los resultados
                    while ($fila = odbc_fetch_array($sentencia)) {
                        $resultado[] = $fila;
                    }
                }
            }
        } catch (Exception $e) {
            // Captura cualquier otra excepción que no sea manejada por ODBC
            $resultado = self::mapErrorToMessage($e->getCode(), $e->getMessage());
            echo json_encode($resultado);
        } finally {
            $conector->desconectar();
        }

        return $resultado;
    }

    private static function mapErrorToMessage($errorCode, $errorMessage = null)
    {
        switch ($errorCode) {
            case '23000': // Violación de restricción
                return ["status" => "error", "message" => "Se ha violado una restricción de integridad en la base de datos."];
            case '42000': // Error de permisos
                return ["status" => "error", "message" => "No tienes permiso para realizar esta operación."];
            case '1062': // Duplicación de entrada
                return ["status" => "error", "message" => "El registro ya existe en la base de datos."];
            case '1406': // Campo con demasiados caracteres
                return ["status" => "error", "message" => "Uno de los campos excede la longitud permitida."];
            case '1048': // Campo obligatorio vacío
                return ["status" => "error", "message" => "Faltan datos obligatorios. Por favor, completa todos los campos requeridos."];
            case '1451': // Restricción de clave foránea
                return ["status" => "error", "message" => "No se puede eliminar este registro porque está siendo utilizado en otra parte."];
            case '1064': // Error de sintaxis en SQL
                return ["status" => "error", "message" => "Error de sintaxis en la consulta SQL."];
            case '2002': // Error de conexión
                return ["status" => "error", "message" => "No se pudo conectar a la base de datos. Verifica la configuración."];
            case '1065': // No hay filas que coincidan con el SELECT
                return ["status" => "error", "message" => "No se encontraron resultados en la consulta."];
            case '1213': // Deadlock
                return ["status" => "error", "message" => "Se ha producido un deadlock. Inténtalo de nuevo."];
            case '1045': // Acceso denegado
                return ["status" => "error", "message" => "Acceso denegado. Verifica tus credenciales."];
            case '2005': // Error de host
                return ["status" => "error", "message" => "Error en el host de la base de datos. Verifica la configuración."];
            case '1105': // Error desconocido
                return ["status" => "error", "message" => "Error desconocido. Por favor, intenta más tarde."];
            case '1403': // No hay datos
                return ["status" => "error", "message" => "No hay datos para mostrar."];
            case '22007': // Valor no válido para fecha
                return ["status" => "error", "message" => "Valor de fecha no válido."];
            case '22001': // Cadena de caracteres demasiado larga
                return ["status" => "error", "message" => "Cadena de caracteres demasiado larga."];
            case '22003': // Valor fuera de rango
                return ["status" => "error", "message" => "Valor fuera de rango."];
            case '40001': // Timeout
                return ["status" => "error", "message" => "Se ha superado el tiempo de espera para ejecutar la consulta."];
            default:
                return ["status" => "error", "message" => "Ha ocurrido un error al ejecutar la consulta. $errorMessage."];
        }
    }
}
