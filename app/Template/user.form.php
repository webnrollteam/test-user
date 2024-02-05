<h1>Пользователь</h1>

<p><a href="/user/">Назад</a></p>

<form>
  <table>
    <tr>
      <td>ID</td>
      <td><?=$DATA['row']['id']?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="email" name="email" value="<?=$DATA['row']['email']?>" required/></td>
    </tr>
    <tr>
      <td>Имя</td>
      <td><input type="text" name="name" value="<?=$DATA['row']['name']?>" required/></td>
    </tr>
    <tr>
      <td rowspan="2">Пароль</td>
      <td><input type="password" name="password1"/></td>
    </tr>
    <tr>
      <td><input type="password" name="password2"/></td>
    </tr>
    <tr>
      <td></td>
      <td>
        <button type="submit">Сохранить</button>
      </td>
    </tr>
  </table>
</form>