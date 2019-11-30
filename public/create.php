<?php include "templates/header.php" ?>
<form method="post">
  <div class="form-group">
    <label for="first_name">First Name</label>
    <input type="text" class="form-control" id="first_name" name="first_name" aria-describedby="text" placeholder="Enter first name">
  </div>
  <div class="form-group">
    <label for="last_name">Last Name</label>
    <input type="text" class="form-control" id="last_name" name="last_name" aria-describedby="text" placeholder="Enter last name">
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
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<a href="index.php">< Back to Home</a>
<?php include "templates/footer.php" ?>