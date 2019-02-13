<?php

if (isset($_POST['submit'])) {
  require "../config.php";
  require "../common.php";

  try  {
    $connection = new PDO($dsn, $username, $password, $options);

    $new_user = array(
      "name"            => $_POST['name'],
      "surname"         => $_POST['surname'],
      "sex"             => $_POST['sex'],
      "age"             => $_POST['age'],
      "email"           => $_POST['email'],
      "young"           => $_POST['young'],
      "birthday"        => $_POST['birthday'],
      "marital_status"  => $_POST['marital_status'],
      "domicile"        => $_POST['domicile'],
      "profession"      => $_POST['profession'],
      "weekend"         => implode(', ', $_POST['weekend']),
      "country"         => $_POST['country'],
      "number_of_books" => implode(', ', $_POST['number_of_books']),
      "comment"         => $_POST['comment'],
      "feedback"        => $_POST['feedback'],
      "field"           => $_POST['field'],
      "learn_english"   => $_POST['learn_english'],
      "garden"          => $_POST['garden'],
      "make_money"      => $_POST['make_money'],
      "complexity"      => $_POST['complexity']
    );

    $sql = sprintf(
      "INSERT INTO %s (%s) values (%s)",
      "users",
      implode(", ", array_keys($new_user)),
      ":" . implode(", :", array_keys($new_user))
    );
        
    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
    header("Location: http://localhost/public/read.php");
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}
?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) { ?>
  <blockquote><?php echo $_POST['name']; ?> successfully added.</blockquote>
<?php } ?>

<main>
  <h2>Розкажіть про себе...</h2>
  <span>Це - спроба створити форму за зразком.</span>
  <form action="create.php" method="POST">
    <fieldset class="fieldset briefly-about-yourself">
      <legend><b>Коротко про себе</b></legend>
      <ul>
        <li>
          <label for="name">Ім'я:</label>
          <input type="text" name="name" id="name" size="25">
        </li>
        <li>
          <label for="surname">Прізвище:</label>
          <input type="text" name="surname" id="surname" size="25">
        </li>
        <li>
          <label>Стать:</label>
          <input type="radio" name="sex" value="male" id="male" checked="">
          <label for="male">чоловіча</label>
          <input type="radio" name="sex" value="female" id="female">
          <label for="female">жіноча</label>
        </li>
        <li>
          <label for="age">Вік:</label>
          <input type="number" name="age" id="age" size="3">
          <label for="age">років.</label>
        </li>
      </ul>
    </fieldset>
    <fieldset class="fieldset more-about-yourself">
      <legend><b>Детальніше про себе</b></legend>
      <section class="smaller">
        <ul>
          <li>
            <input type="radio" name="young" value="young_man" id="young_man" checked="">
            <label for="young_man">Хлопець</label>
          </li>
          <li>
            <input type="radio" name="young" value="young_woman" id="young_woman">
            <label for="young_woman">Дівчина</label>
          </li>
          <li>
            <input type="text" name="birthday" id="birthday">
            <label for="birthday">Дата народження</label>
          </li>
          <li>
            <input type="text" name="marital_status" id="marital_status">
            <label for="marital_status">Сімейний стан</label>
          </li>
          <li>
            <input type="text" name="domicile" id="domicile">
            <label for="domicile">Місце проживання</label>
          </li>
          <li>
            <input type="text" name="profession" id="profession">
            <label for="profession">Професія</label>
          </li>
        </ul>
      </section>
      <section>
        <h4 class="small-title">Як Ви зазвичай проводите вихідні?</h4>
        <ul>
          <li>
            <input type="checkbox" name="weekend[]" value="sleeping" id="sleeping">
            <label for="sleeping">Сплю</label>
          </li>
          <li>
            <input type="checkbox" name="weekend[]" value="walking" id="walking">
            <label for="walking">Гуляю з друзями</label>
          </li>
          <li>
            <input type="checkbox" name="weekend[]" value="reading" id="reading">
            <label for="reading">Читаю книги</label>
          </li>
          <li>
            <input type="checkbox" name="weekend[]" value="cooking" id="cooking">
            <label for="cooking">Готую</label>
          </li>
          <li>
            <input type="checkbox" name="weekend[]" id="playing">
            <label for="playing">Граю в ігри</label>
          </li>
        </ul>
      </section>
      <section>
        <h4 class="small-title">Яку з представлених країн Ви порадили б відвідати?</h4>
        <select class="select" name="country">
          <optgroup label="Європа">
            <option value="Чехія">Чехія</option>
            <option value="Іспанія">Іспанія</option>
            <option value="Італія">Італія</option>
          </optgroup>
          <optgroup label="Азія">
            <option value="Китай">Китай</option>
            <option value="Індія">Індія</option>
          </optgroup>
          <optgroup label="Африка">
            <option value="ОАЕ">ОАЕ</option>
            <option value="Саудівська Аравія">Саудівська Аравія</option>
          </optgroup>
          <optgroup label="Океанія">
            <option value="Японія">Японія</option>
            <option value="Австралія">Австралія</option>
            <option value="Індонезія">Індонезія</option>
          </optgroup>
        </select>
      </section>
      <section>
        <h4 class="small-title">Скільки книг Ви прочитали за все життя?</h4>
        <ul>
          <li>
            <input type="radio" name="number_of_books[]" id="up-to-ten" value="0-10">
            <label for="up-to-ten">0-10</label>
          </li>
          <li>
            <input type="radio" name="number_of_books[]" id="up-to-twenty" value="11-20">
            <label for="up-to-twenty">11-20</label>
          </li>
          <li>
            <input type="radio" name="number_of_books[]" id="up-to-fifty" value="21-50">
            <label for="up-to-fifty">21-50</label>
          </li>
          <li>
            <input type="radio" name="number_of_books[]" id="more-than-fifty" value="50+">
            <label for="more-than-fifty">50+</label>
          </li>
        </ul>
      </section>
      <section>
        <ul>
          <li>
            <label for="comments"><b>Ваші коментарі:</b></label>
          </li>
          <li>
            <textarea cols="60" rows="10" name="comment" id="comments"></textarea>
          </li>
        </ul>
      </section>
      <section>
        <select class="select" size="3" name="feedback">
          <option value="cool" selected="">Радитиму Ваш сайт :)</option>
          <option value="average">На один раз.</option>
          <option value="badly">Поганий сайт!</option>
        </select>
      </section>
    </fieldset>
    <fieldset class="fieldset in-conclusion">
      <legend><b>І на завершення</b></legend>
      <section class="other-design">
        <ul>
          <li>
            <label hidden="" for="field">Поле</label>
            <input type="text" name="field" id="field" placeholder="Це поле було заповненим до Вас." size="25">
          </li>
          <li>
            <label for="email"><b>Email:</b></label>
          </li>
          <li>
            <input type="email" name="email" id="email" size="25">
          </li>
        </ul>
      </section>
      <section>
        <h4 class="small-title">Хочете отримувати наш спам? :)</h4>
        <span><i>Тоді оберіть категорії:</i></span>
        <ul>
          <li>
            <input type="checkbox" name="learn_english" id="eng">
            <label for="eng">Як вивчити англійську за 10 днів.</label>
          </li>
          <li>
            <input type="checkbox" name="garden" id="garden">
            <label for="garden">Сад та город.</label>
          </li>
          <li>
            <input type="checkbox" name="make_money" id="money">
            <label for="money">Як заробляти 100 тисяч на місяць.</label>
          </li>
        </ul>
      </section>
      <section>
        <h4 class="small-title">Наскільки складне завдання?</h4>
        <ul>
          <li>
            <input type="radio" name="complexity" value="easy" id="easy" checked="" >
            <label for="easy">Легко.</label>
          </li>
          <li>
            <input type="radio" name="complexity" value="so-so" id="so-so">
            <label for="so-so">Так собі.</label>
          </li>
          <li>
            <input type="radio" name="complexity" value="complicated" id="complicated">
            <label for="complicated">Складно.</label>
          </li>
        </ul>
      </section>
    </fieldset>
    <label hidden="" for="submit">Кнопка</label>
    <input type="submit" name="submit" value="Відправити" class="submit" id="submit">
  </form>
  <a href="index.php" class="link">Back to home</a>
</main>
<?php require "templates/footer.php"; ?>