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
<table class="highlight">
    <tr>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Geschlecht</th>
        <th>Monatslohn</th>
        <th>Löschen</th>
        <th>Ändern</th>
    </tr>

    <?php
    foreach ($employees as $m) :
        ?>
        <tr>
            <td><?php echo $m->getFirstName(); ?></td>
            <td><?php echo $m->getLastName(); ?></td>
            <td><?php echo $m->getGender(); ?></td>
            <td><?php echo number_format($m->getSalary(), 2, ',', ''); ?></td>
            <td><a href="index.php?action=delete&area=employee&id=<?php echo $m->getId(); ?>">
                    <button>Löschen</button>
                </a></td>
            <td><a href="index.php?action=showEdit&area=employee&id=<?php echo $m->getId(); ?>">
                    <button>Ändern</button>
                </a></td>
        </tr>
    <?php
    endforeach;
    ?>
</table>
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>