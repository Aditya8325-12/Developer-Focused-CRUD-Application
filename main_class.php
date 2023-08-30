<?php

    require __DIR__ . DIRECTORY_SEPARATOR.'update_class.php';
    class main_class extends update_class
    {
        function get_database_list()
        {
            $query = "SHOW DATABASES;";
            $resutlt = self::get_the_query_result($query);
            $option_form = '<option value="">selcte database...</option>';
            for ($i = 0; $i < sizeof($resutlt);$i++)
            {
                $option_form =$option_form. '<option value="'.$resutlt[$i]["Database"].'">'.$resutlt[$i]["Database"].'</option>';    
            }            
            return $option_form;
        }
        
        function get_table_list()
        {
    
            $databasename = "Tables_in_" . $this->database_name;
            $query = "SHOW TABLES;";
            $resutlt = self::get_the_query_result($query);
    
            $option_form = '<option value="">selcte Table  ...</option>';
            for ($i = 0; $i < sizeof($resutlt);$i++)
            {
                $option_form =$option_form. '<option value="'.$resutlt[$i][$databasename].'">'.$resutlt[$i][$databasename].'</option>';    
            }
    
            return $option_form;
        }
     
        

        function get_all_table_data()
        {
            $tabledata[] = self::get_value();
            if($tabledata[0][0]==0)
            {
                $data[] = 0;
                return $data;
            }
            else{
                $data[] = 1;
                $data[] = self::get_value();
                $data[] = self::update_table_form();
                $data[] = self::delete_table_form();
                return $data;
            }

        }
    }


$mainobj = new main_class();
?>