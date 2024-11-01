<?php
try {


    include 'config.php';
    spl_autoload_register(function ($className): void {
        if (substr($className, -10) === 'Controller') {
            include 'controllers/' . $className . '.php';
        } else {
            include 'classes/' . $className . '.php';
        }
    });

//echo '<pre>';
//print_r($_GET);
//echo '<br>';
//print_r($_POST);
//echo '</pre>';

    $action = $_REQUEST['action'] ?? 'showTable'; // Standardwert
    $id = $_REQUEST['id'] ?? null;
    $area = $_REQUEST['area'] ?? 'employee'; // Standardwert

// verkürzt
    $postData = [];
    $postDataNames = ['firstName', 'lastName', 'gender', 'salary', 'maker', 'type', 'numberPlate',
        'area', 'id', 'action', 'employeeId', 'carId', 'startDate', 'endDate'];
    foreach ($postDataNames as $field) {
        $value = $_POST[$field] ?? null;
        if (!empty($value)) {
            $postData[$field] = $value;
        }
    }
    $getData = [];
    $getDataNames = ['id', 'area', 'action'];
    foreach ($getDataNames as $field) {
        $value = $_GET[$field] ?? null;
        if (!empty($value)) {
            $getData[$field] = $value;
        }
    }

// Erstellen des Controllernamens und Aufruf des entsprechenden Controllers
// der controller erstellt auch $view
    $possibleActions = ['showTable', 'showEdit', 'insert', 'update', 'delete'];
    if (in_array($action, $possibleActions)) {
        $controllerName = ucfirst($action) . 'Controller';
        $controller = new $controllerName($area);

        $array = $controller->invoke($getData, $postData);

        if (isset($array['action']) && $array['action'] === 'insert') {
            $action = 'insert';
        } else {
            $action = 'update';
        }

    }

// Variablennamen für table (z.B. $employees oder $cars) und Objekte (z.B. $e oder $c)
//echo $view;
    if ($controller->getView() === 'table') {
        $arrayName = $area . 's';
        $$arrayName = $array;
    } elseif ($controller->getView() === 'edit') { //Variablennamen für Objekte in edit (z.B. $e oder $c)
        if (isset($array['array'])) { // nur bei update Vorbelegung der input-Felder
            $objectName = substr($area, 0, 1);
            $$objectName = $array['array'];
        }
    }
    include 'views/' . $controller->getArea() . '/' . $controller->getView() . '.php';
} catch (Exception $e) {
    //echo $e->getMessage();
    include 'views/error.php';
}

