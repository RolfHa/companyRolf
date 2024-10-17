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
<table>
    <tr>
        <th>Kennzeichen</th>
        <th>Hersteller</th>
        <th>Typ</th>
        <th>Löschen</th>
        <th>Ändern</th>
    </tr>
<!--    --><?php
//    for ($i = 0; $i < count($ms); $i++) {
//    ?>
<!--    <tr>-->
<!--        <td>--><?php //echo $ms[$i]->getFirstName(); ?><!--</td>-->
<!--        <td>--><?php //echo $ms[$i]->getLastName(); ?><!--</td>-->
<!--        <td>--><?php //echo $ms[$i]->getGender(); ?><!--</td>-->
<!--        <td>--><?php //echo $ms[$i]->getSalary(); ?><!--</td>-->
<!--        <td><a href="index.php?action=delete&id=--><?php //echo $ms[$i]->getId(); ?><!--"><button>Löschen</button></a></td>-->
<!--        <td><a href="index.php?action=edit&id=--><?php //echo $ms[$i]->getId(); ?><!--"><button>Ändern</button></a></td>-->
<!--    </tr>-->
<!--    --><?php
//    }
//    ?>
    <?php
    foreach ($cars as $c ) :
        ?>
        <tr>
            <td><?php echo $c->getNumberPlate(); ?></td>
            <td><?php echo $c->getMaker(); ?></td>
            <td><?php echo $c->getType(); ?></td>
            <td><a href="index.php?action=delete&area=auto&id=<?php echo $c->getId(); ?>"><button>Löschen</button></a></td>
            <td><a href="index.php?action=showEdit&area=auto&id=<?php echo $c->getId(); ?>"><button>Ändern</button></a></td>
        </tr>
        <?php
    endforeach;
    ?>
</table>
</body>
</html>