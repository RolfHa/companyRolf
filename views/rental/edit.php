<?php
$rentalDataExists = (isset($r)) ? true : false;
$r = (!$rentalDataExists) ? new Rental() : $r;
// Vorbelegen der pulldownss
if ($rentalDataExists){
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
    <input type="hidden" name="id" value="<?php echo ($r instanceof Rental && $rentalDataExists === true) ? $r->getId() : ''; ?>">
    <table>
        <tr><td><label>Mitarbeiter </td><td><?php echo $r->getEmployeePulldown(); ?></label></td></tr>
        <tr><td><label>Kennzeichen: </td><td><?php echo $r->getCarPulldown(); ?></label></td></tr>
        <tr><td><label>Typ: </td><td><input name="startDate" type="datetime-local"  value=""></label></td></tr>
        <tr><td><label>Typ: </td><td><input name="endDate" type="datetime-local"  value=""></label></td></tr>
        <tr><td></td><td><input type="reset"> <input type="submit" value="OK"></td></tr>
    </table>
</form>
</body>
</html>
