<?php

$genderW = ' checked';
$genderM = '';
$genderD = '';

if (isset($m)){
    if ($m->getGender() === 'weiblich') {
        $genderW = ' checked';
    }
    if ($m->getGender() === 'männlich') {
        $genderM = ' checked';
        $genderW = '';
    }
    if ($m->getGender() === 'divers') {
        $genderD = ' checked';
        $genderW = '';
    }
}

?>
<!doctype html>
<html lang="en">
<head>
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
    <input type="hidden" name="id" value="<?php echo (isset($m) && ($m instanceof Employee)) ? $m->getId() : ''; ?>">
    <table>
        <tr>
            <td><label>Vorname:</td>
            <td><input name="firstName" value="<?php echo (isset($m) && ($m instanceof Employee)) ? $m->getFirstName() : ''; ?>"></label></td>
        </tr>
        <tr>
            <td><label>Nachname:</td>
            <td><input name="lastName" value="<?php echo (isset($m) && ($m instanceof Employee)) ? $m->getLastName() : ''; ?>"></label></td>
        </tr>
        <tr>
            <td><label>Geschlecht:</td>
            <td>
                <input type="radio" name="gender" value="weiblich" <?php echo $genderW; ?>>weiblich
                <input type="radio" name="gender" value="maennlich" <?php echo $genderM; ?>>männlich
                <input type="radio" name="gender" value="divers" <?php echo $genderD; ?>>divers
                </label></td>
        </tr>
        <tr>
            <td><label>Monatslohn:</td>
            <td><input name="salary" type="number" step="0.01" value="<?php echo (isset($m) && ($m instanceof Employee)) ? $m->getSalary() : ''; ?>"></label></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="reset"> <input type="submit" value="OK"></td>
        </tr>
    </table>
</form>
</body>
</html>