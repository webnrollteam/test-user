<h1>Пользователи</h1>

<p><a class="btn btn-primary" href="/user/0/">Создать пользователя</a></p>

<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Email</th>
      <th>Имя</th>
      <th></th>
    </tr>
  </thead>
  <tbody id="js-user-list">
    <!-- <? foreach ($DATA['rows'] as $user) : ?>
      <tr>
        <td><?= $user['id'] ?></td>
        <td><?= $user['email'] ?></td>
        <td><?= $user['name'] ?></td>
        <td>
          <a class="btn btn-primary" href="/user/<?= $user['id'] ?>/">Редактировать</a>
          <button class="btn btn-danger js-user-delete" data-id="<?= $user['id'] ?>">
            <i class="bi bi-trash"></i>
          </button>
        </td>
      </tr>
    <? endforeach; ?> -->
  </tbody>
</table>

<script id="tmpl-row-user" type="text/x-jquery-tmpl">
  {{each rows}}
  <tr>
    <td>${id}</td>
    <td>${email}</td>
    <td>${name}</td>
    <td>
      <a class="btn btn-primary" href="/user/${id}/">Редактировать</a>
      <button class="btn btn-danger js-user-delete" data-id="${id}">
        <i class="bi bi-trash"></i>
      </button>
    </td>
  </tr>
  {{/each}}
</script>

<script>
  $(function() {
    $.ajax({
      url: '/api/v1/user/',
      method: 'GET'
    }).then(function(result) {
      $('#tmpl-row-user').tmpl(result).appendTo('#js-user-list');
    });
  });
</script>