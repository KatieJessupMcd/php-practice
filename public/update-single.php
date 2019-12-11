<?php
require "../config.php";
require "../common.php";

if (isset($_GET['id'])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = :id";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
} else {
  echo "Something went wrong";
  exit;
}
?>

<?php require "templates/header.php" ?>

<h2>Edit a User</h2>
<div class="row">
  <div class="col-3">
  </div>
  <div class="col-6">
    <form method="post">
      <div class="form-group">
        <?php foreach ($user as $key => $value) : ?>
          <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
          <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
        <?php endforeach; ?>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
  <div class="col-3">
  </div>
</div>

<a href="index.php">
  < Back to Home</a> <?php require "templates/footer.php"; ?> <?php require "templates/footer.php" ?>