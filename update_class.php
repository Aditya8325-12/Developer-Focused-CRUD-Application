

<?php

require __DIR__ . DIRECTORY_SEPARATOR.'delete_class.php';

    class update_class extends delete_class
    {

        function update_table_form()
        {
            $column_name = self::Column_name();
            $update_table_form = '<input type="hidden"  id="' . $column_name[0] . '" value="" >';
            for ($i = 1; $i < sizeof($column_name); $i++) {
                $update_table_form = $update_table_form . '<input type="text" class="swal2-input" id="' . $column_name[$i] . '" placeholder="enter the ' . $column_name[$i] . '" value=""  >';
            }
            return $update_table_form;
        }
        function update_value($query)
        {
            $this->connection->query($query);
            if($this->connection->query($query))
            {
            return "ok";
            }
            else{
            return $query;
            }
        }
    
    
        function get_update_data()
        {
            $data[] = self::update_table_form();
            $data[] = self::Column_name();
            $data[] = self::get_the_table_name();
    
            return $data;
        }
    }

?>