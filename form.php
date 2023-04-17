<html>
  <head>
    <style>
/* Сообщения об ошибках и поля с ошибками выводим с красным бордюром. */
.error {
  border: 2px solid red;
}
    </style>
  </head>
  <body>

<?php
if (!empty($messages)) {
  print('<div id="messages">');
  // Выводим все сообщения.
  foreach ($messages as $message) {
    print($message);
  }
  print('</div>');
}

// Далее выводим форму отмечая элементы с ошибками классом error
// и задавая начальные значения элементов ранее сохраненными.
?>

 <form action="" method="POST">
      <p> Форма </p>
<p> Напишите имя, год и email. <br>
<input name="fio" <?php if ($errors['fio']) {print 'class="error"';} ?> value="<?php print $values['fio']; ?>" >
<input name="year" <?php if ($errors['year']) {print 'class="error"';} ?> value="<?php print $values['year']; ?>" >
<input name="email" <?php if ($errors['email']) {print 'class="error"';} ?> value="<?php print $values['email']; ?>" >
</p>
<p>Выберите пол: <br>
<INPUT name="gender" type="radio" value="m" selected = "selected" >
М
<INPUT name="gender" type="radio" value="j">
Ж
</p>
<p>Выберите суперсилу: <br>
<select name="superpower[]" size="4" multiple="multiple">
<option value="t" selected = "selected">God</option>
<option value="b">fly</option>
<option value="c">idclip</option>
<option value="p">fireball</option>
</select></p>
<p>
Сколько у вас конечностей <br>

<INPUT name="limbs" type="radio" value="0" selected = "selected">
0
<INPUT name="limbs" type="radio" value="1">
1
<INPUT name="limbs" type="radio" value="2">
2
<INPUT name="limbs" type="radio" value="3">
3
<INPUT name="limbs" type="radio" value="4">
4
</p>
<INPUT type="text" name="text" size="100" maxlength="100" >
<p>
C контрактом ознакомлен.
<input type="checkbox" name="formWheelchair" value="Yes" <?php ($errors['checkbox']) {print 'class="error"';} ?> value="<?php print $values['checkbox']; ?>">
</p>
<p>
<input type="submit" value="ok">

</p>
    </form>
  </body>
</html>
