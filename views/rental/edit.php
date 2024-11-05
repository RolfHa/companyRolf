<?php
$rentalDataExists = (isset($r) && $r->getId() !== null) ? true : false;
$r = (!$rentalDataExists) ? new Rental() : $r;

?>
<?php include 'views/beginHtml.php'; ?>
<form action="index.php" method="post">
    <input type="hidden" name="action" value="<?php echo $action; ?>">
    <input type="hidden" name="area" value="<?php echo $area; ?>">
    <input type="hidden" name="id" value="<?php echo ($r instanceof Rental && $rentalDataExists === true) ? $r->getId() : ''; ?>">
    <table>
<!--        <tr><td><label>Mitarbeiter </td><td>--><?php //echo $r->getEmployeePulldown(); ?><!--</label></td></tr>-->
        <tr><td><label>Mitarbeiter </td><td>
                <div class="input-field col s12">
                    <select id="form-select-1">
                        <option value="" disabled selected>Choose your option</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                    <label for="form-select-1">Materialize Select</label>
                </div>
            </td></tr>


        <tr><td><label>Kennzeichen: </td><td><?php echo $r->getCarPulldown(); ?></label></td></tr>
        <tr><td><label>von: </td><td><input name="startDate" type="datetime-local"  value="<?php echo ($r instanceof Rental && $rentalDataExists === true) ? $r->getStartDate() : ''; ?>"></label></td></tr>
        <tr><td><label>bis: </td><td><input name="endDate" type="datetime-local"  value="<?php echo ($r instanceof Rental && $rentalDataExists === true) ? $r->getEndDate() : ''; ?>"></label></td></tr>
        <tr><td></td><td><input type="reset"> <input type="submit" value="OK"></td></tr>
    </table>
</form>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems, {
            // specify options here
        });
    });
</script>
<?php include 'views/endHtml.php'; ?>
