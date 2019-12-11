<?php

try {
  require "../config.php";
  require "../common.php";
  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * 
            FROM users";
  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch (PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}

?>

<?php require "templates/header.php" ?>

<div class="row">
  <div class="col-6">
    <h2>Update Users</h2>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Email Adress</th>
          <th scope="col">Age</th>
          <th scope="col">Location</th>
          <th scope="col">Date</th>
          <th scope="col">Edit</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($result as $row) : ?>
          <tr>
            <td><?php echo escape($row['id']); ?></td>
            <td><?php echo escape($row['firstname']); ?></td>
            <td><?php echo escape($row['lastname']); ?></td>
            <td><?php echo escape($row['email']); ?></td>
            <td><?php echo escape($row['age']); ?></td>
            <td><?php echo escape($row['location']); ?></td>
            <td><?php echo escape($row['date']); ?></td>
            <td><a href="update-single.php?id=<?php echo escape($row["id"]);?>">Edit</a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?php require "templates/footer.php" ?>