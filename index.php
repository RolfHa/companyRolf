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
$area = $_REQUEST['area'] ?? 'employee';

// verkürzt
$postData = [];
$postDataNames = ['firstName', 'lastName', 'gender', 'salary', 'maker', 'type', 'numberPlate', 'area', 'id', 'action'];
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

$view = 'table';
$possibleActions = ['showTable', 'showEdit', 'insert', 'update', 'delete'];
if (in_array($action, $possibleActions)) {
    $controllerName = ucfirst($action) . 'Controller';
    $controller = new $controllerName($area);

    $array = $controller->invoke($getData, $postData);

    if (isset($array['action']) && $array['action'] === 'insert'){
        $action = 'insert';
    } else {
        $action = 'update';
    }

}
// Variablennamen für table (z.B. $employees oder $cars)
//echo $view;
if ($controller->getView() === 'table') {
    $arrayName = $area . 's';
    $$arrayName = $array;
} elseif ($controller->getView() === 'edit') { //Variablennamen für Objekte in edit (z.B. $e oder $c)
        $objectName = substr($area, 0, 1);
        $$objectName = $array['array'];
}
include 'views/' . $controller->getArea() . '/' . $controller->getView() . '.php';
