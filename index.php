<?php

include 'config.php';
spl_autoload_register(function ($className):void{
    include 'classes/' . $className . '.php';
});

//echo '<pre>';
//echo '$_GET ';
//print_r($_GET);
//echo '$_POST ';
//print_r($_POST);
//echo '</pre>';

$action = $_REQUEST['action'] ?? 'showTabelle'; // $_REQUEST = $_GET und $_POST
$id = $_REQUEST['id'] ?? '0';
$firstName = $_POST['firstName'] ?? '';
$lastName = $_POST['lastName'] ?? '';
$gender = $_POST['gender'] ?? '';
$salaryStr = $_POST['salary'] ?? '';
$salary = (float)$salaryStr;
$area = $_REQUEST['area'] ?? 'mitarbeiter';
$numberPlate = $_POST['numberPlate'] ?? '';
$maker = $_POST['maker'] ?? '';
$type = $_POST['type'] ?? '';

$view = 'tabelle';
if ($action === 'showTabelle') {
//    if ($area === 'mitarbeiter') {
//        $ms = (new Mitarbeiter())->getAllAsObjects();
//    } elseif ($area === 'auto') {
//        $cars = (new Auto())->getAllAsObjects();
//    }
//    $view = 'tabelle';
    $controllerName = ucfirst($action) . 'Controller';
    $controller = new $controllerName($area, $view);
    $array = $controller->tuwas();
    if ($area =='mitarbeiter') {
        $ms = $array;
    } elseif ($area === 'auto') {
        $cars = $array;
    }
} elseif ($action === 'showEingabe') {

    if ($area === 'mitarbeiter') {
        $action = 'insert';
    } elseif ($area === 'auto') {
        $action = 'insert';
    }
    $view = 'eingabe';
} elseif ($action === 'delete') {

    if ($area === 'mitarbeiter') {
        (new Mitarbeiter())->deleteObjectById($id);
        $ms = (new Mitarbeiter())->getAllAsObjects();
    } elseif ($area === 'auto') {
        $c = (new Auto())->deleteObjectById($id);
        $cars = (new Auto())->getAllAsObjects();
    }
    $view = 'tabelle';
} elseif ($action === 'insert') {
    if ($area === 'mitarbeiter') {
        (new Mitarbeiter())->insert($firstName, $lastName, $gender, $salary);
        $ms = (new Mitarbeiter())->getAllAsObjects();
    } elseif ($area === 'auto') {
        (new Auto())->insert($numberPlate, $maker, $type);
        $cars = (new Auto())->getAllAsObjects();
    }
    $view = 'tabelle';
} elseif ($action === 'showEdit') {

    if ($area === 'mitarbeiter') {
        $m = (new Mitarbeiter())->getObjectById($id);
        $action = 'update';
    } elseif ($area === 'auto') {
        $c = (new Auto())->getObjectById($id);
        $action = 'update';
    }
    $view = 'eingabe';
} elseif ($action === 'update') {
    if ($area === 'mitarbeiter') {
        (new Mitarbeiter($id, $firstName, $lastName, $gender, $salary))->update();
        $ms = (new Mitarbeiter())->getAllAsObjects();
    } elseif ($area === 'auto') {
        (new Auto($id, $numberPlate, $maker, $type))->update();
        $cars = (new Auto())->getAllAsObjects();
    }
    $view = 'tabelle';
}

include 'views/' . $area . '/' . $view . '.php';