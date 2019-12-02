<?php
require "../config.php";
require "../common.php";

if (isset($_POST['submit'])) {

  try {
    $connection = new PDO($dsn, $username, $password, $options);

    $new_user = array(
      "firstname" => $_POST['firstname'],
      "lastname" => $_POST['lastname'],
      "email" => $_POST['email'],
      "age" => $_POST['age'],
      "location" => $_POST['location']
    );

    $sql = sprintf(
      "INSERT INTO %s (%s) values (%s)",
      "users",
      implode(", ", array_keys($new_user)),
      ":" . implode(", :", array_keys($new_user))
    );

    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
  } catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}
?>

<?php require "templates/header.php"; ?>
<?php if (isset($_POST['submit']) && $statement) { ?>
  <div class="alert alert-success" role="alert">
    <?php echo escape($_POST['firstname']); ?> successfuly added.
  </div>
<?php } ?>

<h2>Add User</h2>
<div class="row">
  <div class="col-3">
  </div>
  <div class="col-6">
    <form method="post">
      <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="text" placeholder="Enter first name">
      </div>
      <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="text" placeholder="Enter last name">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="text" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="age">Age</label>
        <input type="text" class="form-control" id="age" name="age" aria-describedby="text" placeholder="Enter age">
      </div>
      <div class="form-group">
        <label for="location">Location</label>
        <input type="text" class="form-control" id="location" name="location" aria-describedby="text" placeholder="Enter location">
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <div class="col-3">
  </div>
</div>

<a href="index.php">
  < Back to Home</a> <?php require "templates/footer.php"; ?>