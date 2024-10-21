<?php

include 'config.php';
spl_autoload_register(function ($className): void {
    include 'classes/' . $className . '.php';
});

echo '<pre>';
echo '$_GET ';
print_r($_GET);
echo '$_POST ';
print_r($_POST);
echo '</pre>';

$action = $_REQUEST['action'] ?? 'showTable';
$id = $_REQUEST['id'] ?? null;
$firstName = $_POST['firstName'] ?? '';
$lastName = $_POST['lastName'] ?? '';
$gender = $_POST['gender'] ?? '';
$salaryStr = $_POST['salary'] ?? '';
$salary = (float)$salaryStr;
$area = $_REQUEST['area'] ?? 'employee';
$numberPlate = $_POST['numberPlate'] ?? '';
$maker = $_POST['maker'] ?? '';
$type = $_POST['type'] ?? '';

$view = 'table';
if ($action === 'showTable') {
    $controllerName = ucfirst($action) . 'Controller';
    $controller = new $controllerName($area, $view);  // $view wird im Konstruktor überschrieben
    $array = $controller->invoke();
    // korrekte Namen für edit.php
    if ($area == 'employee') {
        $employees = $array;
    } elseif ($area === 'car') {
        $cars = $array;
    }
} elseif ($action === 'showEdit') {
    $controllerName = ucfirst($action) . 'Controller';
    $controller = new $controllerName($area, $view, $id);
    $array = $controller->invoke();
    if (count($array) > 0) {
        if ($area == 'employee') {
            $e = $array[0];
        } elseif ($area === 'car') {
            $c = $array[0];
        }
    }
    if (isset($id)) {
        $action = 'update';
    } else {
        $action = 'insert';
    }
} elseif ($action === 'delete') {
    $controllerName = ucfirst($action) . 'Controller';
    $controller = new $controllerName($area, $view, $id);
    $array = $controller->invoke();
    // korrekte Namen für edit.php
    if ($area == 'employee') {
        $employees = $array;
    } elseif ($area === 'car') {
        $cars = $array;
    }
} elseif ($action === 'insert') {
    $controllerName = ucfirst($action) . 'Controller';
    $controller = new $controllerName($area, $view, ['firstName' => $firstName, 'lastName' => $lastName
        , 'gender' => $gender, 'salary' => $salary
        , 'numberPlate' => $numberPlate, 'maker' => $maker, 'type' => $type
    ]);
    $array = $controller->invoke();

    if ($area == 'employee') {
        $employees = $array;
    } elseif ($area === 'car') {
        $cars = $array;
    }
} elseif ($action === 'update') {
    $controllerName = ucfirst($action) . 'Controller';
    $controller = new $controllerName($area, $view, ['id' => $id, 'firstName' => $firstName, 'lastName' => $lastName
        , 'gender' => $gender, 'salary' => $salary
        , 'numberPlate' => $numberPlate, 'maker' => $maker, 'type' => $type
    ]);
    $array = $controller->invoke();
    if ($area == 'employee') {
        $employees = $array;
    } elseif ($area === 'car') {
        $cars = $array;
    }
}

include 'views/' . $area . '/' . $view . '.php';