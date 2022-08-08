<p></p>

<?if(!empty($data)):?>
<!--        <h3>--><?php //echo $column['name']; ?><!--</h3>-->
<!--        <p>--><?php //echo $column['age']; ?><!--</p>-->
<!--        <hr>-->
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Gender</th>
            </tr>
            </thead>
            <tbody>
    <?php foreach ($data as $column): ?>
            <tr>
                <th><?= $column['id']; ?></th>
                <td><?= $column['name']; ?></td>
                <td><?= $column['age']; ?></td>
                <td><?= $column['email']; ?></td>
                <td><?= $column['phone']; ?></td>
                <td><?= $column['gender']; ?></td>
            </tr>
    <?php endforeach; ?>
            </tbody>
        </table>
    <?else:?>
        <span>Ще немає записів</span><br>
<?php endif; ?>

<a id="show" href="/csv/save">Завантажити csv файл</a><br>

<a id="show" href="/csv/delete">Видалити всі записи</a>
