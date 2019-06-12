<?php

session_start();


?>


<a href="/User">login</a>
<h1>Tasks</h1>


<h3>Hello <?= $_SESSION['login'] ?></h3>


<?php if ($_SESSION['login'] != 'Admin') : ?>
<form>
    <fieldset>
        <legend>Создание задачи</legend>
        <label for="taskName">Имя задачи</label><br>
        <input id = "taskName" type="text" name="taskName"><br>
        <label for="taskDescription">Описание задачи</label><br>
        <textarea id = "taskDescription" name="taskDescription" cols="25"></textarea><br>
        <button id = "btnSubmitTask" type="submit">send</button>
    </fieldset>
</form>

<?php endif; ?>

<div id="taskContainer">
    <?php foreach ($data as $task) : ?>
        <div id="task<?= $task['id'] ?>" style="<?php if($task['completed'] == 1) echo 'background-color: green'?>" >
            <h3>Наименование задачи: <?= $task['name']?></h3>
            <p>Описание задачи: <?= $task['description']?></p>
            <?php if($_SESSION['login'] == 'Admin' && $task['completed'] == 0) : ?>
                <label for="checkboxForAdmin">Установить одобренным:</label>
                <input id="checkboxForAdmin"
                       type="checkbox"
                       data-id="<?= $task['id'] ?>" >
            <?php endif; ?>
            <p>Статус: <span><?php echo ($task['completed'] == 0 ? 'Не одобрено админом' : 'Одобрено админом'); ?></span></p>
            <hr>
        </div>

    <?php endforeach; ?>
</div>
