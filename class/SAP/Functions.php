<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Functions
 *
 * @author Andres
 */
class Functions
{

    public static function getVentas($month = null, $year = null)
    {
        $month = isset($month) && !empty($month) ? $month : "MONTH(CURRENT_DATE)";
        $year = isset($year) ? $year : "YEAR(CURRENT_DATE)";
        $cadenaSQL = "SELECT \"Dia\" AS \"Dia\", SUM(\"Total_Ventas\") AS \"Total_Ventas_Diaria\", SUM(\"Total_Ventas\") - SUM(\"Costo\") AS \"Utilidad_Diaria\" FROM \"_SYS_BIC\".\"sap.casaandina.Manager/CALC_VENTASNET\" WHERE \"YEAR\" = $year AND \"MES\" = $month GROUP BY \"Dia\" ORDER BY \"Dia\" ASC";
        return ConectorBD::ejecutarQuery($cadenaSQL);
    }

    public static function getVentasXMes()
    {
        $cadenaSQL = "SELECT \"MES\" AS \"MES\", SUM(CASE WHEN \"YEAR\" = YEAR(CURRENT_DATE) THEN \"Total_Ventas\" ELSE 0 END) AS \"Total_Ventas_Anio_Actual\", SUM(CASE WHEN \"YEAR\" = YEAR(CURRENT_DATE) - 1 THEN \"Total_Ventas\" ELSE 0 END) AS \"Total_Ventas_Anio_Anterior\", SUM(SUM(CASE WHEN \"YEAR\" = YEAR(CURRENT_DATE) THEN \"Total_Ventas\" ELSE 0 END)) OVER (ORDER BY \"MES\") AS \"Acumulado_Anio_Actual\", SUM(SUM(CASE WHEN \"YEAR\" = YEAR(CURRENT_DATE) - 1 THEN \"Total_Ventas\" ELSE 0 END)) OVER (ORDER BY \"MES\") AS \"Acumulado_Anio_Anterior\" FROM \"_SYS_BIC\".\"sap.casaandina.Manager/CALC_VENTASNET\" WHERE \"YEAR\" >= YEAR(CURRENT_DATE) - 1 GROUP BY \"MES\" ORDER BY \"MES\" ASC";
        return ConectorBD::ejecutarQuery($cadenaSQL);
    }

}
