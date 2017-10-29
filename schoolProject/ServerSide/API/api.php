<?php
    require_once 'manufacturer-api.php';
    require_once 'phones-api.php';
    

    $method = $_SERVER['REQUEST_METHOD']; 
    $params = $_REQUEST['activitiesArray'];


    

    switch ($params['ctrl']) {
        
            case 'login':
            $capi = new Username();
            $result  = $capi->gateway($method, $params);
            echo json_encode($result);
            break;

            case 'logout':
            $capi = new Password();
            $result = $capi->gateway($method, $params);
            echo json_encode($result);
            
            break;
    }


?>
