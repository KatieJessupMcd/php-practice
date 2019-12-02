<?php

if (isset($_POST['submit'])) {
  try {
    require "../config.php";
    require "../common.php";
    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT * 
            FROM users 
            WHERE location = :location";
    $location = $_POST['location'];
    $statement = $connection->prepare($sql);
    $statement->bindParam(':location', $location, PDO::PARAM_STR);
    $statement->execute();
    $result = $statement->fetchAll();
  } catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}
?>
<?php require "templates/header.php" ?>
<div class="row">
  <?php
  if (isset($_POST['submit'])) {

    if ($result && $statement->rowCount() > 0) { ?>
      <div class="col-6">
        <h2>Results</h2>
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
            </tr>
          </thead>
          <tbody>
            <?php foreach ($result as $row) { ?>
              <tr>
                <td><?php echo escape($row['id']); ?></td>
                <td><?php echo escape($row['firstname']); ?></td>
                <td><?php echo escape($row['lastname']); ?></td>
                <td><?php echo escape($row['email']); ?></td>
                <td><?php echo escape($row['age']); ?></td>
                <td><?php echo escape($row['location']); ?></td>
                <td><?php echo escape($row['date']); ?></td>

              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <div class="col-3">
      </div>
</div>
<?php } else { ?>
  <div class="col-6">
    No result found for <?php echo escape($_POST['location']); ?>
  </div>
  <div class="col-3">
  </div>
  </div>
<?php }
} ?>
  <div class="col-3">
  </div>
  <div class="col-6">
    <h2>Find User Based on Location</h2>
    <form method="post">
      <div class="form-group">
        <label for="location">Location</label>
        <input type="text" class="form-control" id="location" name="location" aria-describedby="text" placeholder="Enter location">
      </div>
      <button type="submit" name="submit" class="btn btn-primary">View Results</button>
    </form>
  </div>
  <div class="col-3">
  </div>

<div class="row">
  <a href="index.php">
    < Back to Home</a> </div> 
    <?php require "templates/footer.php" ?>