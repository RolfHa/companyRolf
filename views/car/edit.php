<?php include 'views/beginHtml.php'; ?>
<form action="index.php" method="post">
    <input type="hidden" name="action" value="<?php echo $action; ?>">
    <input type="hidden" name="area" value="<?php echo $area; ?>">
    <input type="hidden" name="id" value="<?php echo (isset($c) && $c instanceof Car) ? $c->getId() : ''; ?>">
    <table>
        <tr><td><label>Kennzeichen: </td><td><input name="numberPlate" value="<?php echo (isset($c) && $c instanceof Car) ? $c->getnumberPlate() : ''; ?>"></label></td></tr>
        <tr><td><label>Hersteller: </td><td><input name="maker" value="<?php echo (isset($c) && $c instanceof Car) ? $c->getMaker() : ''; ?>"></label></td></tr>
        <tr><td><label>Typ: </td><td><input name="type" type="text"  value="<?php echo (isset($c) && $c instanceof Car) ? $c->getType() : '';  ?>" required></label></td></tr>
        <tr><td></td><td><input type="reset"> <input type="submit" value="OK"></td></tr>
    </table>
</form>
<?php include 'views/endHtml.php'; ?>