<?php include 'views/head.php'; ?>
<table>
    <tr>

        <th>Name</th>
        <th>Kennzeichen</th>
        <th>von</th>
        <th>bis</th>
        <th>Löschen</th>
        <th>Ändern</th>
    </tr>
    <?php
    foreach ($rentals as $r ) :
        ?>
        <tr>
            <td><?php echo $r->getEmployee()->getName(); ?></td>
            <td><?php echo $r->getCar()->getNumberPlate(); ?></td>
            <td><?php echo $r->getStartDate(); ?></td>
            <td><?php echo $r->getEndDate(); ?></td>
            <td><a href="index.php?action=delete&area=rental&id=<?php echo $r->getId(); ?>"><button>Löschen</button></a></td>
            <td><a href="index.php?action=showEdit&area=rental&id=<?php echo $r->getId(); ?>"><button>Ändern</button></a></td>
        </tr>
        <?php
    endforeach;
    ?>
</table>
</body>
</html>