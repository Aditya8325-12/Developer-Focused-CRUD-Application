<?php
require __DIR__ . DIRECTORY_SEPARATOR . 'dbconnecation.php';

class create_table_class extends dbconnecation_class
{

    // geting the column name from the database 
    function Column_name()
    {
        $table_name = self::get_the_table_name();
        $query = "SHOW COLUMNS FROM  $table_name;";
        $result = self::get_the_query_result($query);
        for ($i = 0; $i < sizeof($result); $i++) {
            $column_name[$i] = $result[$i]['Field'];
        }
        return $column_name;
    }



    function get_value()
    {
        $column_name = self::Column_name();

        $first_column_name=$column_name[0];
        //  get the column name 
        $table_column_name = "";
        for ($i = 0; $i < sizeof($column_name); $i++) {
            $table_column_name = $table_column_name . "<th>" . $column_name[$i] . "</th>";
        }

        $table_column_name = $table_column_name . "<th>Action </th>";

        //  get the table row value
        $query = "SELECT * FROM $this->table_name;";
        $resutlt = self::get_the_query_result($query);

        if($resutlt==null)
        {

            $table_data[] = 0;
            return $table_data;
        }
        else{
            $table_row_value = "";
            for ($i = 0; $i < sizeof($resutlt); $i++) {
                $table_row_value = $table_row_value . "<tr>";
                for ($j = 0; $j < sizeof($column_name); $j++) {
                    $table_row_value = $table_row_value . "<td> " . $resutlt[$i][$column_name[$j]] . "</td>";
                }
                $table_row_value = $table_row_value . '<td class="d-flex gap-2"><button type="button" class="btn btn-primary btn-update"   data-id="' . $resutlt[$i][$column_name[0]] . '" >update</button><button type="button" class="btn-delete btn btn-primary " data-id="' . $resutlt[$i][$column_name[0]] . '">delete</button></td>' . "</tr>" . "</tr>";
            }
            $table_data[] = $table_column_name;
            $table_data[] = $table_row_value;
            $table_data[]= $first_column_name;
            $table_data[] = $column_name;
            return $table_data;

        }


    }

}


?>