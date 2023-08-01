<?php
$path = $_SERVER['DOCUMENT_ROOT']."/saves/artemiyzhiromskiy/";
$includes = $_SERVER['DOCUMENT_ROOT'].'/repositories/artemiyzhiromskiy/gymproject/includes/';
if (!file_exists($path)) { mkdir($path, 0777, true); }
$db = new Sqlite3($path . "db.db");
$LOG = "";
$excercise = $_POST["ex"];
$sets = $_POST["sets"];
$reps = $_POST["reps"];

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $db->query('CREATE TABLE test7 (id INTEGER PRIMARY KEY, excercise, sets, reps)');
    $db->query("INSERT INTO 'test7' (id, excercise, sets, reps) VALUES (NULL, '$excercise', '$sets', '$reps');");
}                                         



include $includes."init.php"; ?>
    <title>GYMAPP</title>
    <?php
    $nav_index = 0;
    include($includes."gymheader.php"); print ($LOG);?>
<div id="content">
<p>
Добро пожаловать на вебсайт где вы можете хранить записи результатов ваших тренировок и сравнивать ваш промежуточный прогресс, чтобы начать просто
впишите в соответствующие поля количество подходов, повторов и упражнение и система запишет ваш результат в небольшую сгенерированую таблицу.
</p>

<form method="post" action="./gymindex.php">
<p><b>Упражнение</b><br>
<input name="ex" type="text" size="40"></p>
<p><b>Количество подходов</b>
<input name="sets" type="text" size="3"></p>
<p><b>Количество повторов</b>
<input name="reps" type="text" size="3"></p>
<button>submit</button>
</form>
</div>
<div id="table1">
<table id="test" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Упражнение</th>
                <th>Подходы</th>
                <th>Повторы</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($list as $row): ?>
        <?php $results = $db->query('SELECT * FROM test7');
while ($row = $results->fetchArray(SQLITE3_ASSOC)); ?>
    <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo $row['excercise'];?></td>
        <td><?php echo $row['sets'];?></td>
        <td><?php echo $row['reps'];?></td>
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>
<?php $db->close();?>
<div id="leftbar">
    
</div>
<div id="header">
    
</div>
<div id="rightbar">
</div>
<?php include("./includes/gymfooter.php"); ?>