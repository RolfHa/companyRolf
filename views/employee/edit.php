<?php
// Vorbelegen der radio-buttons
$genderW = ' checked';
$genderM = '';
$genderD = '';

if (isset($e)){
    if ($e->getGender() === 'weiblich') {
        $genderW = ' checked';
    }
    if ($e->getGender() === 'männlich') {
        $genderM = ' checked';
        $genderW = '';
    }
    if ($e->getGender() === 'divers') {
        $genderD = ' checked';
        $genderW = '';
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/company.css" media="screen,projection"/>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php include 'views/navigation.php'; ?>
<form action="index.php" method="post">
    <input type="hidden" name="action" value="<?php echo $action; ?>">
    <input type="hidden" name="area" value="<?php echo $area; ?>">

    <input type="hidden" name="id" value="<?php echo (isset($e) && ($e instanceof Employee)) ? $e->getId() : ''; ?>">
    <table>
        <tr>
            <td><label>Vorname:</td>
            <td><input name="firstName" value="<?php echo (isset($e) && ($e instanceof Employee)) ? $e->getFirstName() : ''; ?>"></label></td>
        </tr>
        <tr>
            <td><label>Nachname:</td>
            <td><input name="lastName" value="<?php echo (isset($e) && ($e instanceof Employee)) ? $e->getLastName() : ''; ?>"></label></td>
        </tr>
        <tr>
            <td><label>Geschlecht:</td>
            <td>
                <label><input type="radio" name="gender" value="weiblich" <?php echo $genderW; ?>><span>weiblich</span></label>
                <label><input type="radio" name="gender" value="männlich" <?php echo $genderM; ?>><span>männlich</span></label>
                <label><input type="radio" name="gender" value="divers" <?php echo $genderD; ?>><span>divers</span></label>
                </label></td>
        </tr>
        <tr>
            <td><label>Monatslohn:</td>
            <td><input name="salary" type="number" step="0.01" value="<?php echo (isset($e) && ($e instanceof Employee)) ? $e->getSalary() : ''; ?>"></label></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="reset"> <input type="submit" value="OK"></td>
        </tr>
    </table>
</form>
</body>
</html>