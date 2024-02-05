<h1>Пользователи</h1>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Email</th>
      <th>Имя</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <? foreach ($DATA['rows'] as $user) : ?>
      <tr>
        <td><?= $user['id'] ?></td>
        <td><?= $user['email'] ?></td>
        <td><?= $user['name'] ?></td>
        <td>
          <a href="/user/<?=$user['id']?>/">Редактировать</a>
          <button>Удалить</button>
        </td>
      </tr>
    <? endforeach; ?>
  </tbody>
</table>