<h1>Пользователь</h1>

<p><a class="btn btn-link" href="/user/">Назад</a></p>

<?php foreach ($DATA['errors'] as $error):?>
<div class="alert alert-danger"><?php echo $error;?></div>
<?php endforeach;?>

<form method="POST">
  <table class="table">
    <?php if ($DATA['row']['id']) : ?>
      <tr>
        <td>ID</td>
        <td><?= $DATA['row']['id'] ?></td>
      </tr>
    <?php endif; ?>
    <tr>
      <td>Email</td>
      <td><input type="email" name="email" class="form-control" value="<?= $DATA['row']['email'] ?>" required /></td>
    </tr>
    <tr>
      <td>Имя</td>
      <td><input type="text" class="form-control" name="name" value="<?= $DATA['row']['name'] ?>" required /></td>
    </tr>
    <tr>
      <td rowspan="2">Пароль</td>
      <td><input type="password" class="form-control" name="password1"
        <?php if (!$DATA['id']):?>required<?php endif;?>/></td>
    </tr>
    <tr>
      <td><input type="password" class="form-control" name="password2"
        <?php if (!$DATA['id']):?>required<?php endif;?>/></td>
    </tr>
    <tr>
      <td></td>
      <td>
        <button type="submit" class="btn btn-primary">Сохранить</button>
      </td>
    </tr>
  </table>
</form>