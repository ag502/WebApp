<!DOCTYPE html>
<html>
    <head>
        <title>SQL PHP</title>
        <meta charset="UTF-8"/>
    </head>
    <body>
        <?php
        $db = new PDO("mysql:dbname=college;host=localhost", "root", "4726");
        $rows = $db -> query("select * from student"); ?>
        <ul>
            <?php foreach($rows as $row) { ?>
                <li>student_id : <?= $row["student_id"] ?> name : <?= $row["name"] ?> year : <?= $row["year"] ?> major : <?= $row["major"] ?></li>
            <?php } ?>
        </ul>
    </body>
</html>


