<h1>Собаки</h1>
<form method="POST">
    <input type="text" name="name" placeholder="Имя" required>
    <select name="breed" required>
        <option value="сиба-ину">Сиба-ину</option>
        <option value="мопс">Мопс</option>
        <option value="такса">Такса</option>
        <option value="плюшевый лабрадор">Плюшевый лабрадор</option>
        <option value="резиновая такса с пищалкой">Резиновая такса с пищалкой</option>
    </select>
    <input type="text" name="sound" placeholder="Звук" required>
    <label><input type="checkbox" name="can_hunt"> Может охотиться</label>
    <button type="submit" name="add">Добавить</button>
</form>

<ul>
    <?php foreach ($dogs as $dog): ?>
        <li>
            <strong><?= htmlspecialchars($dog['name']) ?></strong> (<?= htmlspecialchars($dog['breed']) ?>)
            <br>
            Звук: <?= htmlspecialchars($dog['sound']) ?>
            <br>
            Может охотиться: <?= $dog['can_hunt'] ? 'Да' : 'Нет' ?>
            <br>
            <form method="POST" style="display:inline;">
                <input type="hidden" name="id" value="<?= $dog['id'] ?>">
                <button type="submit" name="delete">Удалить</button>
            </form>
            <button onclick="openEditForm(<?= $dog['id'] ?>, '<?= htmlspecialchars($dog['name']) ?>', '<?= htmlspecialchars($dog['breed']) ?>', '<?= htmlspecialchars($dog['sound']) ?>', <?= $dog['can_hunt'] ?>)">Редактировать</button>
        </li>
    <?php endforeach; ?>
</ul>

<!-- Форма для редактирования -->
<div id="editForm" style="display:none;">
    <h2>Редактировать собаку</h2>
    <form method="POST">
        <input type="hidden" name="id" id="editId">
        <input type="text" name="name" id="editName" placeholder="Имя" required>
        <select name="breed" id="editBreed" required>
            <option value="сиба-ину">Сиба-ину</option>
            <option value="мопс">Мопс</option>
            <option value="такса">Такса</option>
            <option value="плюшевый лабрадор">Плюшевый лабрадор</option>
            <option value="резиновая такса с пищалкой">Резиновая такса с пищалкой</option>
        </select>
        <input type="text" name="sound" id="editSound" placeholder="Звук" required>
        <label><input type="checkbox" name="can_hunt" id="editCanHunt"> Может охотиться</label>
        <button type="submit" name="update">Сохранить</button>
        <button type="button" onclick="closeEditForm()">Отмена</button>
    </form>
</div>

<script>
function openEditForm(id, name, breed, sound, canHunt) {
    document.getElementById('editId').value = id;
    document.getElementById('editName').value = name;
    document.getElementById('editBreed').value = breed;
    document.getElementById('editSound').value = sound;
    document.getElementById('editCanHunt').checked = canHunt;
    document.getElementById('editForm').style.display = 'block';
}

function closeEditForm() {
    document.getElementById('editForm').style.display = 'none';
}
</script>