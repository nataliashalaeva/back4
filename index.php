<?php
/**
 * Реализовать проверку заполнения обязательных полей формы в предыдущей
 * с использованием Cookies, а также заполнение формы по умолчанию ранее
 * введенными значениями.
 */

// Отправляем браузеру правильную кодировку,
// файл index.php должен быть в кодировке UTF-8 без BOM.
header('Content-Type: text/html; charset=UTF-8');

// В суперглобальном массиве $_SERVER PHP сохраняет некторые заголовки запроса HTTP
// и другие сведения о клиненте и сервере, например метод текущего запроса $_SERVER['REQUEST_METHOD'].
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  // Массив для временного хранения сообщений пользователю.
  $messages = array();

  // В суперглобальном массиве $_COOKIE PHP хранит все имена и значения куки текущего запроса.
  // Выдаем сообщение об успешном сохранении.
  if (!empty($_COOKIE['save'])) {
    // Удаляем куку, указывая время устаревания в прошлом.
    setcookie('save', '', 100000);
    // Если есть параметр save, то выводим сообщение пользователю.
    $messages[] = 'Спасибо, результаты сохранены.';
  }

  // Складываем признак ошибок в массив.
  $errors = array();
  $errors['fio'] = !empty($_COOKIE['fio_error']);
  $errors['year'] = !empty($_COOKIE['year_error']);
  $errors['email'] = !empty($_COOKIE['email_error']);
  $errors['gender'] = !empty($_COOKIE['gender_error']);
  $errors['superpower'] = !empty($_COOKIE['superpower_error']);
  $errors['limbs'] = !empty($_COOKIE['limbs_error']);
  $errors['text'] = !empty($_COOKIE['text_error']);
  $errors['checkbox'] = !empty($_COOKIE['checkbox_error']);
  // TODO: аналогично все поля.

  // Выдаем сообщения об ошибках.
  if ($errors['fio']) {
    // Удаляем куку, указывая время устаревания в прошлом.
    setcookie('fio_error', '', 100000);
    // Выводим сообщение.
    $messages[] = '<div class="error">Заполните имя.</div>';
  }
  if ($errors['year']) {
    // Удаляем куку, указывая время устаревания в прошлом.
    setcookie('year_error', '', 100000);
    // Выводим сообщение.
    $messages[] = '<div class="error">Заполните год.</div>';
  }
  if ($errors['email']) {
    // Удаляем куку, указывая время устаревания в прошлом.
    setcookie('email_error', '', 100000);
    // Выводим сообщение.
    $messages[] = '<div class="error">Заполните email.</div>';
  }
  if ($errors['gender']) {
    // Удаляем куку, указывая время устаревания в прошлом.
    setcookie('gender_error', '', 100000);
    // Выводим сообщение.
    $messages[] = '<div class="error">Заполните gender.</div>';
  }
    if ($errors['superpower']) {
      // Удаляем куку, указывая время устаревания в прошлом.
      setcookie('superpower_error', '', 100000);
      // Выводим сообщение.
      $messages[] = '<div class="error">Заполните superpower.</div>';
    }
      if ($errors['limds']) {
        // Удаляем куку, указывая время устаревания в прошлом.
        setcookie('limds_error', '', 100000);
        // Выводим сообщение.
        $messages[] = '<div class="error">Заполните limds.</div>';
  // TODO: тут выдать сообщения об ошибках в других полях.
}
if ($errors['text']) {
  // Удаляем куку, указывая время устаревания в прошлом.
  setcookie('text_error', '', 100000);
  // Выводим сообщение.
  $messages[] = '<div class="error">Заполните text.</div>';
}
if ($errors['checkbox']) {
  // Удаляем куку, указывая время устаревания в прошлом.
  setcookie('checkbox_error', '', 100000);
  // Выводим сообщение.
  $messages[] = '<div class="error">Заполните checkbox.</div>';
}


  // Складываем предыдущие значения полей в массив, если есть.
  $values = array();
  $values['fio'] = empty($_COOKIE['fio_value']) ? '' : $_COOKIE['fio_value'];
  $values['year'] = empty($_COOKIE['year_value']) ? '' : $_COOKIE['year_value'];
  $values['email'] = empty($_COOKIE['email_value']) ? '' : $_COOKIE['email_value'];
  $values['gender'] = empty($_COOKIE['gender_value']) ? '' : $_COOKIE['gender_value'];
  $values['superpower'] = empty($_COOKIE['superpower_value']) ? '' : $_COOKIE['superpower_value'];
  $values['limbs'] = empty($_COOKIE['limbs_value']) ? '' : $_COOKIE['limbs_value'];
  $values['text'] = empty($_COOKIE['text_value']) ? '' : $_COOKIE['text_value'];
  $values['checkbox'] = empty($_COOKIE['checkbox_value']) ? '' : $_COOKIE['checkbox_value'];
  // TODO: аналогично все поля.

  // Включаем содержимое файла form.php.
  // В нем будут доступны переменные $messages, $errors и $values для вывода 
  // сообщений, полей с ранее заполненными данными и признаками ошибок.
  include('form.php');
}
// Иначе, если запрос был методом POST, т.е. нужно проверить данные и сохранить их в XML-файл.
else {
  // Проверяем ошибки.
  $errors = FALSE;
  if (empty($_POST['fio'])) {
    // Выдаем куку на день с флажком об ошибке в поле fio.
    setcookie('fio_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    // Сохраняем ранее введенное в форму значение на месяц.
    setcookie('fio_value', $_POST['fio'], time() + 30 * 24 * 60 * 60);
  }
  if (empty($_POST['year'])) {
    // Выдаем куку на день с флажком об ошибке в поле fio.
    setcookie('year_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    // Сохраняем ранее введенное в форму значение на месяц.
    setcookie('year_value', $_POST['year'], time() + 30 * 24 * 60 * 60);
  }
  if (empty($_POST['email'])) {
    // Выдаем куку на день с флажком об ошибке в поле fio.
    setcookie('email_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    // Сохраняем ранее введенное в форму значение на месяц.
    setcookie('email_value', $_POST['email'], time() + 30 * 24 * 60 * 60);
  }
  if (empty($_POST['gender'])) {
    // Выдаем куку на день с флажком об ошибке в поле fio.
    setcookie('gender_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    // Сохраняем ранее введенное в форму значение на месяц.
    setcookie('gender_value', $_POST['gender'], time() + 30 * 24 * 60 * 60);
  }
  if (empty($_POST['superpower'])) {
    // Выдаем куку на день с флажком об ошибке в поле fio.
    setcookie('superpower_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    // Сохраняем ранее введенное в форму значение на месяц.
    setcookie('superpower_value', $_POST['superpower'], time() + 30 * 24 * 60 * 60);
  }
  if (empty($_POST['limbs'])) {
    // Выдаем куку на день с флажком об ошибке в поле fio.
    setcookie('limbs_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    // Сохраняем ранее введенное в форму значение на месяц.
    setcookie('limbs_value', $_POST['limbs'], time() + 30 * 24 * 60 * 60);
  }
  if (empty($_POST['text'])) {
    // Выдаем куку на день с флажком об ошибке в поле fio.
    setcookie('text_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    // Сохраняем ранее введенное в форму значение на месяц.
    setcookie('text_value', $_POST['text'], time() + 30 * 24 * 60 * 60);
  }
  if (empty($_POST['checkbox'])) {
    // Выдаем куку на день с флажком об ошибке в поле fio.
    setcookie('checkbox_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    // Сохраняем ранее введенное в форму значение на месяц.
    setcookie('checkbox_value', $_POST['checkbox'], time() + 30 * 24 * 60 * 60);
  }

// *************
// TODO: тут необходимо проверить правильность заполнения всех остальных полей.
// Сохранить в Cookie признаки ошибок и значения полей.
// *************

  if ($errors) {
    // При наличии ошибок перезагружаем страницу и завершаем работу скрипта.
    header('Location: index.php');
    exit();
  }
  else {
    // Удаляем Cookies с признаками ошибок.
    setcookie('fio_error', '', 100000);
    setcookie('year_error', '', 100000);
    setcookie('email_error', '', 100000);
    setcookie('gender_error', '', 100000);
    setcookie('superpower_error', '', 100000);
    setcookie('limbs_error', '', 100000);
    setcookie('text_error', '', 100000);
    setcookie('checkbox_error', '', 100000);
    // TODO: тут необходимо удалить остальные Cookies.
  }

  // Сохранение в БД.
  // ...

  // Сохраняем куку с признаком успешного сохранения.
  setcookie('save', '1');

  // Делаем перенаправление.
  header('Location: index.php');
}
