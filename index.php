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

$action = $_REQUEST['action'] ?? 'showTable'; // $_REQUEST = $_GET und $_POST
$id = $_REQUEST['id'] ?? '0';
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
//    if ($area === 'employee') {
//        $employees = (new Mitarbeiter())->getAllAsObjects();
//    } elseif ($area === 'auto') {
//        $cars = (new Car())->getAllAsObjects();
//    }
//    $view = 'tabelle';
    $controllerName = ucfirst($action) . 'Controller';
    $controller = new $controllerName($area, $view);  // $view wird im Konstruktor überschrieben
    $array = $controller->tuwas();
    // korrekte Namen für edit.php
    if ($area == 'employee') {
        $employees = $array;
    } elseif ($area === 'car') {
        $cars = $array;
    }
} elseif ($action === 'showEdit') {

//    if ($area === 'employee') {
//        $action = 'insert';
//    } elseif ($area === 'auto') {
//        $action = 'insert';
//    }

    $controllerName = ucfirst($action) . 'Controller';
    $controller = new $controllerName($area, $view, $id);
    $array = $controller->tuwas();
    if (count($array) > 0) {
        if ($area == 'employee') {
            $m = $array[0];
        } elseif ($area === 'car') {
            $c = $array[0];
        }
    }
    if ($id != 0) {
        $action = 'update';

    } else {
        $action = 'insert';
    }


    //$view = 'eingabe';
} elseif ($action === 'delete') {

//    if ($area === 'employee') {
//        (new Employee())->deleteObjectById($id);
//        $employees = (new Employee())->getAllAsObjects();
//    } elseif ($area === 'auto') {
//        $c = (new Car())->deleteObjectById($id);
//        $cars = (new Car())->getAllAsObjects();
//    }
    //$view = 'table';
    $controllerName = ucfirst($action) . 'Controller';
    $controller = new $controllerName($area, $view, $id);
    $array = $controller->tuwas();
    // korrekte Namen für edit.php
    if ($area == 'employee') {
        $employees = $array;
    } elseif ($area === 'car') {
        $cars = $array;
    }
} elseif ($action === 'insert') {
//    if ($area === 'employee') {
//        (new Employee())->insert($firstName, $lastName, $gender, $salary);
//        $employees = (new Employee())->getAllAsObjects();
//    } elseif ($area === 'car') {
//        (new Car())->insert($numberPlate, $maker, $type);
//        $cars = (new Car())->getAllAsObjects();
//    }
//    $view = 'table';
    $controllerName = ucfirst($action) . 'Controller';
    $controller = new $controllerName($area, $view, ['firstName' => $firstName, 'lastName' => $lastName
        , 'gender' => $gender, 'salary' => $salary
        , 'numberPlate' => $numberPlate, 'maker' => $maker, 'type' => $type
    ]);  // $view wird im Konstruktor überschrieben

    //$controller = new $controllerName($area, $view, $object);  // $view wird im Konstruktor überschrieben
    $array = $controller->tuwas();
// korrekte Namen für edit.php
    if ($area == 'employee') {
        $employees = $array;
    } elseif ($area === 'car') {
        $cars = $array;
    }
} elseif ($action === 'showEdit') { // => Zeile 44

//    if ($area === 'employee') {
//        $m = (new Employee())->getObjectById($id);
//        $action = 'update';
//    } elseif ($area === 'car') {
//        $c = (new Car())->getObjectById($id);
//        $action = 'update';
//    }
//    $view = 'edit';

} elseif ($action === 'update') {
//    if ($area === 'employee') {
//        (new Employee($id, $firstName, $lastName, $gender, $salary))->update();
//        $employees = (new Employee())->getAllAsObjects();
//    } elseif ($area === 'car') {
//        (new Car($id, $numberPlate, $maker, $type))->update();
//        $cars = (new Car())->getAllAsObjects();
//    }
//    $view = 'table';
    $controllerName = ucfirst($action) . 'Controller';
    $controller = new $controllerName($area, $view, ['id' => $id, 'firstName' => $firstName, 'lastName' => $lastName
        , 'gender' => $gender, 'salary' => $salary
        , 'numberPlate' => $numberPlate, 'maker' => $maker, 'type' => $type
    ]);  // $view wird im Konstruktor überschrieben
    $array = $controller->tuwas();
    if ($area == 'employee') {
        $employees = $array;
    } elseif ($area === 'car') {
        $cars = $array;
    }
}

include 'views/' . $area . '/' . $view . '.php';