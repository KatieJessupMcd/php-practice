<?php include "templates/header.php" ?>
<h2>Find User Based on Location</h2>
<form method="post">
  <div class="form-group">
    <label for="location">Location</label>
    <input type="text" class="form-control" id="location" name="location" aria-describedby="text" placeholder="Enter location">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<a href="index.php">< Back to Home</a>
<?php include "templates/footer.php" ?>