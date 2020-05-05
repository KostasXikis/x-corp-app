<?php 

function getAvailableRadiologists() {
    $root = '../../';

    // DB Connection
    require $root.'php/config.php';
    
    $radiologists = getAllRadiologistAndExamNum();
    // print_r($radiologists);

    $max = findMax($radiologists);
    $availableRadiologists = array();

    if (equalExamNum($max, $radiologists)) {
        $availableRadiologists = formatRadiologists($radiologists);
    } else {
        $availableRadiologists = getRightRadiologists($max, $radiologists);
    };

    return $availableRadiologists;
}

function getAllRadiologistAndExamNum() {
    $root = '../../';

    // DB Connection
    require $root.'php/config.php';

    $radiologists = array();

    $stmt = $conn->prepare
    ( 
        "SELECT `name`, `last_name`, `email`, `appointments` 
         FROM `radiologist`"
    );
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            
            $radiologist = array();
            $radiologist['name'] = $row['name'];   
            $radiologist['last_name'] = $row['last_name'];
            $radiologist['email'] = $row['email'];
            $radiologist['appointments'] = $row['appointments'];
            $appsNum = ($radiologist['appointments'] == null ? 0 : count(json_decode($row['appointments'])));
            $radiologist['apps_number'] = $appsNum;
            array_push($radiologists, $radiologist);
        }
    }
    
    return $radiologists;
}

function getAllRadiologists() {
    $root = '../../';

    // DB Connection
    require $root.'php/config.php';

    $radiologists = array();

    $stmt = $conn->prepare
    ( 
        "SELECT `name`, `last_name`, `email`, `appointments` 
         FROM `radiologist`"
    );
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['name'];
            $lastName = $row['last_name'];
            $email = $row['email'];
            $apps = ($row['appointments'] == null) ? null : json_decode($row['appointments']); 

            $radiologist = $name . ' ' . $lastName . ' ' . '(' . $email . ')' . ' - ' . 'Exam(s) to do: ' . count($apps);
            array_push($radiologists, $radiologist); 
        }
    }

    return $radiologists;
} 

function getRightRadiologists($max, $radiologists) {
    $radiologistsFinal = array();

    foreach($radiologists as $radiologist) {
        if ($radiologist['apps_number'] < $max) {

            $name = $radiologist['name'];
            $lastName = $radiologist['last_name'];
            $email = $radiologist['email'];
            $appsNumber = $radiologist['apps_number'];

            $radiologist = $name . ' ' . $lastName . ' ' . '(' . $email . ')' . ' - ' . 'Exam(s) to do: ' . $appsNumber;
            array_push($radiologistsFinal, $radiologist); 
        }   
    }
    return $radiologistsFinal;
}

function formatRadiologists($radiologists) {
    $radiologistsFinal = array();

    foreach($radiologists as $radiologist) {
        
        $name = $radiologist['name'];
        $lastName = $radiologist['last_name'];
        $email = $radiologist['email'];
        $appsNumber = $radiologist['apps_number'];

        $radiologist = $name . ' ' . $lastName . ' ' . '(' . $email . ')' . ' - ' . 'Exam(s) to do: ' . $appsNumber;
        array_push($radiologistsFinal, $radiologist); 
    }   
    return $radiologistsFinal;
}

function equalExamNum($max, $radiologists) {
    foreach ($radiologists as $key=>$value) {
        if ($value['apps_number'] != $max) {
            return false;
        } 
    }
    return true;
}

function findMax($radiologists) {
    $max = 0;
    foreach ($radiologists as $radiologist) {
        if ($radiologist['apps_number'] > $max) $max = $radiologist['apps_number'];
    }
    return $max;
}