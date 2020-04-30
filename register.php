<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>X Corp - Register</title>
  <style>
    form{
      margin: 0 auto;
    }
  </style>
</head>
<body>
  <div class="py-5 text-center">
    <img src="img/logo.png" alt="Smiley face" height="130" width="130"><br><br>
    <h2>Register</h2>
    <p class="lead">Here you can create a new account</p>
  </div>

  <form class="w-25 p-3" action="php/Auth/register.php" method="POST">
    <div class="form-row">
      <!-- First Name -->
      <div class="form-group col-md-6">
        <label for="inputEmail4">First name</label>
        <input type="text" class="form-control" name="firstName" id="inputEmail4" placeholder="First name">
      </div>
      <!-- Last Name -->
      <div class="form-group col-md-6">
        <label for="inputPassword4">Last name</label>
        <input type="text" class="form-control" name="lastName" id="inputPassword4" placeholder="Last name">
      </div>
    </div>
    <!-- Email -->
    <div class="form-group">
      <label for="inputAddress">Email</label>
      <input type="email" class="form-control" name="email" id="inputAddress" placeholder="Email">
    </div>
    <!-- Password -->
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Password</label>
        <input type="password" class="form-control" name="password" id="inputEmail4" placeholder="Password">
      </div>
      <!-- Confirm Password -->
      <div class="form-group col-md-6">
        <label for="inputPassword4">Password confirmation</label>
        <input type="password" class="form-control" name="passwordConfirm" id="inputPassword4" placeholder="Password confirmation">
      </div>
    </div>
    <!-- Specialty -->
    <div class="form-group">
      <label for="inputAddress2">Specialty</label>
      <select id="inputState" name="specialty" class="form-control">
        <option>Doctor</option>
        <option>Radiology Center Staff</option>
        <option>Radiologist</option>
      </select>
    </div>
    <hr>
    <!-- Submit -->
    <button type="submit" class="btn btn-primary w-100">Sign up</button><br><br>
    <!-- Sign in  -->
    <div class="form-group d-flex justify-content-center">
      <p>Already havean account? <a href="index.php">Sign In</a>.</p>
    </div>
  </form>
</body>
</html>