<?php

class CSVExporter
{
    private static $ruta = '';

    public static function exportar($datos, $nombreArchivo)
    {
        $rutaArchivo = self::$ruta . $nombreArchivo;

        if (($archivo = fopen($rutaArchivo, 'w')) !== false) {
            fputcsv($archivo, array_keys($datos[0]));

            foreach ($datos as $fila) {
                fputcsv($archivo, $fila);
            }

            fclose($archivo);

            echo "El archivo CSV '$nombreArchivo' se ha guardado correctamente en: $rutaArchivo<br>";
        } else {
            echo "Error al abrir el archivo '$nombreArchivo' para escritura.<br>";
        }
    }

    public static function generarCSV($funcion, $nombreArchivo)
    {
        $datos = TakeOrders::$funcion();
        self::exportar($datos, $nombreArchivo);
    }

    public static function exportarCSV()
    {
        self::generarCSV('obtenerFletes', 'fletes.csv');
        self::generarCSV('obtenerMarcas', 'marcas.csv');
        self::generarCSV('obtenerGrupoDescuentos', 'grupo_descuentos.csv');
        self::generarCSV('obtenerTablaDescuentos', 'tabla_descuentos.csv');
        self::generarCSV('obtenerFormaDePago', 'forma_de_pago.csv');
        self::generarCSV('obtenerDescuentoFormaDePago', 'descuento_forma_pago.csv');
        self::generarCSV('obtenerDescuentoAdicionalGrupos', 'descuento_adicional_grupos.csv');
        self::generarCSV('obtenerDescuentoAdicional', 'descuento_adicional.csv');
        self::generarCSV('obtenerDescuentoProntoPago', 'descuento_pronto_pago.csv');
        self::generarCSV('obtenerClientes', 'clientes.csv');
        self::generarCSV('obtenerProductos', 'productos.csv');
        self::generarCSV('obtenerInventario', 'inventario.csv');
    }
}
