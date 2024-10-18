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
    <input type="hidden" name="id" value="<?php echo (isset($c) && $c instanceof Car) ? $c->getId() : ''; ?>">
    <table>
        <tr><td><label>Kennzeichen: </td><td><input name="numberPlate" value="<?php echo (isset($c) && $c instanceof Car) ? $c->getnumberPlate() : ''; ?>"></label></td></tr>
        <tr><td><label>Hersteller: </td><td><input name="maker" value="<?php echo (isset($c) && $c instanceof Car) ? $c->getMaker() : ''; ?>"></label></td></tr>
        <tr><td><label>Typ: </td><td><input name="type" type="text"  value="<?php echo (isset($c) && $c instanceof Car) ? $c->getType() : '';  ?>"></label></td></tr>
        <tr><td></td><td><input type="reset"> <input type="submit" value="OK"></td></tr>
    </table>
</form>
</body>
</html>