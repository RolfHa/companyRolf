<?php include 'views/head.php'; ?>
<table>
    <tr>
        <th>Kennzeichen</th>
        <th>Hersteller</th>
        <th>Typ</th>
        <th>Löschen</th>
        <th>Ändern</th>
    </tr>

    <?php
    foreach ($cars as $c) :
        ?>
        <tr>
            <td><?php echo $c->getNumberPlate(); ?></td>
            <td><?php echo $c->getMaker(); ?></td>
            <td><?php echo $c->getType(); ?></td>
            <td><a href="index.php?action=delete&area=car&id=<?php echo $c->getId(); ?>">
                    <button>Löschen</button>
                </a></td>
            <td><a href="index.php?action=showEdit&area=car&id=<?php echo $c->getId(); ?>">
                    <button>Ändern</button>
                </a></td>
        </tr>
    <?php
    endforeach;
    ?>
</table>
</body>
</html>