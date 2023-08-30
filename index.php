<?php
require __DIR__ . DIRECTORY_SEPARATOR. 'main_class.php';

// header 


$strRequest = file_get_contents('php://input');
if (!empty($strRequest)) {
    $response = ["success" => true, "data_recd" => json_decode($strRequest, true)];
    $data = json_decode($strRequest, true);

   
    if($data['option']=='Database_list')
    {
         echo json_encode($mainobj->get_database_list());
    }
   

    if ($data['option']=='database_name')
    {
          $mainobj->set_data_base($data['dbname']);
          echo json_encode($mainobj->get_table_list());
    }

    if ($data['option']=='table_name')
    {
         $mainobj->set_the_table_name($data['tname']);
         echo json_encode($response);
     }


    if($data['option']=='get_data')
    {
        $mainobj->set_data_base($data['dbname']);
        $mainobj->set_the_table_name($data['tableName']);
        echo json_encode($mainobj->get_all_table_data());
    }


    if($data['option']=='update')
    {
        $mainobj->set_data_base($data['dbname']);
        $mainobj->set_the_table_name($data['tableName']);
        echo json_encode($mainobj->update_value($data['query']));
    }
    if($data['option']=='delete')
    {
        $mainobj->set_data_base($data['dbname']);
        $mainobj->set_the_table_name($data['tableName']);
        echo json_encode($mainobj->delete_value($data['query']));
        
    }


    die();
}


include __DIR__ . '/header.html';
// footer
include __DIR__ . '/footer.html';
?>