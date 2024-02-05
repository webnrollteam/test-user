<h1>Авторизация</h1>

<?php foreach ($DATA['errors'] as $error):?>
<div class="alert alert-danger"><?php echo $error;?></div>
<?php endforeach;?>

<form method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Пароль</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
  </div>
  <div class="mb-3">
    <a href="/register/">Регистрация</a>
  </div>
  <button type="submit" class="btn btn-primary">Войти</button>
</form>