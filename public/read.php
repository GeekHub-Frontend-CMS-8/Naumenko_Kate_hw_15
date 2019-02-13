<?php

  try  {
        
    require "../config.php";
    require "../common.php";

      $connection = new PDO($dsn, $username, $password, $options);

      $sql = "SELECT * FROM users";

      $statement = $connection->prepare($sql);
      $statement->execute();

      $result = $statement->fetchAll();
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
?>

<?php require "templates/header.php"; ?>
        
<?php  
  if ($result && $statement->rowCount() > 0) { ?>
    <div class="wrapper">
      <h2>Database</h2>
      <table class="table">
        <thead class="thead">
          <tr>
            <th class="cell">#</th>
            <th class="cell">First Name</th>
            <th class="cell">Last Name</th>
            <th class="cell">Sex</th>
            <th class="cell">Age</th>
            <th class="cell">Young</th>
            <th class="cell">Birthday</th>
            <th class="cell">Marital status</th>
            <th class="cell">Domicile</th>
            <th class="cell">Profession</th>
            <th class="cell">Your weekend</th>
            <th class="cell">Country</th>
            <th class="cell">Number of books</th>
            <th class="cell">Comment</th>
            <th class="cell">Feedback</th>
            <th class="cell">Field</th>
            <th class="cell">Email Address</th>
            <th class="cell">Learn English</th>
            <th class="cell">Garden</th>
            <th class="cell">Make money</th>
            <th class="cell">Complexity</th>
          </tr>
        </thead>
        <tbody class="tbody">
        <?php foreach ($result as $row) { ?>
          <tr>
            <td class="cell"><?php echo escape($row["id"]); ?></td>
            <td class="cell"><?php echo escape($row["name"]); ?></td>
            <td class="cell"><?php echo escape($row["surname"]); ?></td>
            <td class="cell"><?php echo escape($row["sex"]); ?></td>
            <td class="cell"><?php echo escape($row["age"]); ?></td>
            <td class="cell"><?php echo escape($row["young"]); ?></td>
            <td class="cell"><?php echo escape($row["birthday"]); ?> </td>
            <td class="cell"><?php echo escape($row["marital_status"]); ?></td>
            <td class="cell"><?php echo escape($row["domicile"]); ?></td>
            <td class="cell"><?php echo escape($row["profession"]); ?></td>
            <td class="cell"><?php echo escape($row["weekend"]); ?></td>
            <td class="cell"><?php echo escape($row["country"]); ?></td>
            <td class="cell"><?php echo escape($row["number_of_books"]); ?></td>
            <td class="cell"><?php echo escape($row["comment"]); ?></td>
            <td class="cell"><?php echo escape($row["feedback"]); ?></td>
            <td class="cell"><?php echo escape($row["field"]); ?></td>
            <td class="cell"><?php echo escape($row["email"]); ?></td>
            <td class="cell"><?php echo escape($row["learn_english"]); ?></td>
            <td class="cell"><?php echo escape($row["garden"]); ?></td>
            <td class="cell"><?php echo escape($row["make_money"]); ?></td>
            <td class="cell"><?php echo escape($row["complexity"]); ?></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  <?php } else { ?>
    <blockquote>No records.</blockquote>
  <?php }
 ?>

<a href="index.php" class="link">Back to home</a>

<?php require "templates/footer.php"; ?>
