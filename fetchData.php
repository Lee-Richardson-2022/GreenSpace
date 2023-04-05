<?php
    $db = new SQLite3('Data/Greenspace.db'); //should this be at top of index.php?

    header('Content-Type: application/json');

    $data = array();

    if( isset($_POST['query']) ) {
        $query = $_POST['query'];
        $statement = $db->prepare($query);
        $result = $statement->execute();
    
        $data = $result->fetchArray(SQLITE3_NUM);
        echo json_encode($data);
    } else {
        echo json_encode('error');
    }


    
?>