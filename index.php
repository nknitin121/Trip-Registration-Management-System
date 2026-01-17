<?php
session_start();

$server = "localhost";
$username = "root";
$password = "";
$database = "us_trip";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) {
  die("Connection Failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {

  $name   = $_POST['name'];
  $age    = $_POST['age'];
  $phone  = $_POST['phone'];
  $email  = $_POST['email'];
  $gender = $_POST['gender'];
  $other  = $_POST['other'];

  $sql = "INSERT INTO trip (name, age, phone, email, gender, other, date)
          VALUES ('$name', '$age', '$phone', '$email', '$gender', '$other', current_timestamp())";

  if (mysqli_query($conn, $sql)) {
    $_SESSION['success'] = true;
    header("Location: index.php"); // redirect to avoid reload issue
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Backend Page</title>

  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
      padding: 40px;
    }

    .container {
      background: rgb(196, 128, 196);
      padding: 25px;
      max-width: 500px;
      margin: auto;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    label {
      display: block;
      margin-top: 10px;
      font-weight: bold;
    }

    input, textarea {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    button {
      margin-top: 15px;
      padding: 10px;
      width: 48%;
      border: none;
      cursor: pointer;
      border-radius: 5px;
    }

    .submit {
      background: #28a745;
      color: white;
    }

    .reset {
      background: #dc3545;
      color: white;
      float: right;
    }

    /* POPUP STYLE */
    .popup {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.6);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .popup-box {
      background: white;
      padding: 30px;
      border-radius: 10px;
      text-align: center;
      width: 300px;
    }

    .popup-box h2 {
      color: green;
    }

    .popup-box button {
      margin-top: 15px;
      background: #28a745;
      color: white;
      padding: 8px 15px;
      border-radius: 5px;
      border: none;
      cursor: pointer;
    }
  </style>
</head>

<body>

<div class="container">
  <h1>Welcome to the IIT</h1>

  <form method="post">
    <label>Name</label>
    <input type="text" name="name" required>

    <label>Age</label>
    <input type="number" name="age" required>

    <label>Phone Number</label>
    <input type="text" name="phone" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Gender</label>
    <input type="text" name="gender" required>

    <label>Other</label>
    <textarea name="other"></textarea>

    <button type="submit" name="submit" class="submit">Submit</button>
    <button type="reset" class="reset">Reset</button>
  </form>
</div>

<?php if (isset($_SESSION['success'])) { ?>
  <div class="popup">
    <div class="popup-box">
      <h2>Thank You!</h2>
      <p>Thanks for filling the form 😊</p>
      <button onclick="closePopup()">OK</button>
    </div>
  </div>

  <script>
    function closePopup() {
      document.querySelector('.popup').style.display = 'none';
    }
  </script>
<?php unset($_SESSION['success']); } ?>

</body>
</html>
