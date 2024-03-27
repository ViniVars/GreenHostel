
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Registration</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <style>
    body {
      overflow: hidden;
    }

    .reg-bg {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100vw;
      height: 100vh;
    }

    .regl-con {
      background-color: #00C1B6;
      height: 100%;
      width: 35%;
      display: flex;
      justify-content: space-around;
      /* justify-content: center; */
      flex-direction: column;
      align-items: center;
      /* border-bottom-right-radius: 15px; */
      /* border-top-right-radius: 15px; */
    }

    .regr-con {
      background-color: #FFFFFF;
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    .regr-con>* {
      width: 90%;
      height: 13.5%;
      display: flex;
      justify-content: center;
      align-items: center;

    }

    .register-cover {
      justify-content: left;
      position: relative;
      left: 3rem;
      font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
      font-size: 2rem;
      font-weight: 900;
    }

    .name-roll-cover,
    .room-phn-cover,
    .pass-cover,
    .age-cover {
      gap: 5rem;
    }

    input,
    textarea {
      background-color: #EBEBEB;
      border: #DCDEDC 2px solid;
      border-radius: 7px;
      width: 400px;
      height: 20px;
      padding: 0.5rem;
      color: #00C1B6;
      font-weight: bold;
    }

    input:focus,
    textarea:focus {
      outline: none;
    }

    input[type='submit'], button {
      border-radius: 7px;
      width: 300px;
      height: 40px;
      font-weight: bolder;
      font-size: 1.1rem;
      border: 0;
      background-color: #00C1B6;
      color: white;
      transition: all 300ms linear;
    }

    input[type='submit']:hover, button {
      cursor: pointer;
      scale: 1.05;
    }

    input[type='email'] {
      width: 88%;
    }

    .hostel {
      gap: 1rem;
      font-size: 2.5rem;
      font-weight: bolder;
      position: relative;
      top: -2rem;
    }
    span{
      color: #FFFD6B;

    }

    img {
      width: 350px;
    }
    a{
      width: 100%;
      text-decoration: none;
      color: white;
    }
    .reg-btn{
      display: flex;
      gap: 17rem;
    }
  </style>
</head>

<body>
<form action="register.php" method='post'>
  <div class="reg-bg">
    <div class="regl-con">
      
      <div class="hostel">
        <!-- <div class="logo">
          <img
          src="data:image/png;base64,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"
          alt="">
        </div> -->
        <div class="name"><span>Green </span>Hostel</div>
      </div>
      <div class="logo">
        <img src="vectorlab190300330-removebg-preview.png" alt="">
      </div>
    </div>
    <div class="regr-con">
      <div class="register-cover">Registration Form</div>
      <div class="name-roll-cover">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="rno" placeholder="Roll Number eg. A211">
        <!-- <div class="name-cover"></div>
        <div class="roll-cover"></div> -->
      </div>
      <div class="email-cover">
        <input type="email" name="email" placeholder='Email eg. abc@gmail.com'>
        <!-- <input type="email" placeholder='email eg. abc@gmail.com'> -->
      </div>
      <div class="room-phn-cover">
        <input type="text" name="rnu" placeholder="Room Number">
        <input type="text" name="phn" placeholder="Phone Number">
      </div>
      <div class="age-cover">
        <input type="text" name="age" placeholder="Age">
        <textarea cols="30" rows="20" name="loc" placeholder="Address"></textarea>
      </div>
      <div class="pass-cover">
        <input type="password" name="password" placeholder="password">
        <input type="password" name="cpassword" placeholder="Confirm password">
      </div>
      <div class="reg-btn">
        <button><a href="dashboard.php">Back</a></button>
        <input type="submit" value='Register'>
      </div>
    </div>
  </div>
</form>
  <!-- <ul>
    <li><a href="login.php">Login</a></li>
    <li><a href="menu.php">Menu</a></li>
    <li><a href="reviews.php">Reviews</a></li>
    <li><a href="">Availability</a></li>
  </ul>
  <div class="login-container" id="reg-con">
    <form  method="post">
      <center><h2>REGISTER NOW</h2></center>
      <table>
          <tr>
            <td><label>Name:</label></td>
            <td><input type="text" name="name" placeholder="Enter name"></td>
          </tr>
          <tr>
            <td><label>Roll Number:</label></td>
            <td><input type="text" name="rno" placeholder="Enter Roll Number"></td>
          </tr>
          <tr>
            <td><label>Room Number:</label></td>
            <td><input type="text" name="rnu" placeholder="Enter Roll Number"></td>
          </tr>
          <tr>
            <td><label>Email: </label></td>
            <td><input type="email" name="email" placeholder="Enter email id"><br></td>
          </tr>
          <tr>
            <td><label>Password: </label></td>
            <td><input type="password" name="password" placeholder="Enter password"><br></td>
          </tr>
          <tr>
            <td><label>Confirm Password:</label></td>
            <td><input type="password" name="cpassword" placeholder="Confirm your password"></td>
          </tr>
          <tr>
            <td><label>Phone Number:</label></td>
            <td><input type="text" name="phn" placeholder="Enter Phone Number"></td>
          </tr>
          <tr>
            <td><label>Location:</label></td>
            <td><input type="text" name="loc" placeholder="Enter Your Location"></td>
          </tr>
          <tr>
            <td><label>Age:</label></td>
            <td><input type="text" name="age" placeholder="Enter Your Age"></td>
          </tr>
        </table>
        <center><input type="submit" name="submit" value="Sign In" class="btn">
        <p>Already have an account? <a href="login.php"><span>login now</span></a></p>
      </form>

    </div> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
<?php
@include 'connect.php';
$conn = $_SESSION['db'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $rno = $_POST["rno"];
  $rnu = $_POST["rnu"];
  $username = $_POST["email"];
  $loc = $_POST["loc"];
  $cp = $_POST["cpassword"];
  $password = $_POST["password"];
  $age = $_POST["age"];
  $phn = $_POST["phn"];

  if ($rnu && $username && $rno && $password && $name && $age && $loc && $phn && $cp && ($cp == $password)) {
    $sql = "Select * from Login where sno ='$rno'";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);
    if ($check == 0) {
      $sql = "SELECT * from Rooms where room = '$rnu'";
      $result = mysqli_query($conn, $sql);
      $rows = mysqli_fetch_assoc($result);
        if($rows['memb'] == 3){
          echo "<script>Swal.fire({
            icon: 'error',
            title: 'Room Full',
            text: 'Room Already has 3 Members!',
          });</script>";
          exit();
        }
        $pay = date("Y-m-d", strtotime("+1 month", strtotime(date("Y-m-d"))));
      $sql = "insert into Login (email, name, password, phone, location, age, room, sno, pay) values('$username', '$name', '$password', '$phn', '$loc', '$age', '$rnu', '$rno', '$pay')";
      $result = mysqli_query($conn, $sql);
      $sql = "SELECT * from Rooms where room = '$rnu'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) == 0) {
        $sql = "INSERT into Rooms values('$rnu', '1', '$rno', '', '')";
        $result = mysqli_query($conn, $sql);
      } else {
        $rows = mysqli_fetch_assoc($result);
        if (!$rows['m1']) {
          $sql = "UPDATE Rooms
            SET m1 = '$rno',
                memb = " . ($rows['memb'] + 1) . "
            WHERE room = '$rnu'";
        } else if (!$rows['m2']) {
          $sql = "UPDATE Rooms
            SET m2 = '$rno',
                memb = " . ($rows['memb'] + 1) . "
            WHERE room = '$rnu'";
        } else if (!$rows['m3']) {
          $sql = "UPDATE Rooms
            SET m3 = '$rno',
                memb = " . ($rows['memb'] + 1) . "
            WHERE room = '$rnu'";
        }
        $result = mysqli_query($conn, $sql);
      }
      // echo "Success";
      echo "<script>Swal.fire({
        title: 'Registered!',
        text: '$rno has been added Succesfully!',
        icon: 'success'
      });</script>";
      header("Location: admin.php");
      exit();
      // $_SESSION['log'] = "true";
    } else {
      echo "<script>Swal.fire({
        icon: 'error',
        title: 'Existing User',
        text: 'User Already Exists!',
      });</script>";
    }
  } else {
    echo "<script>Swal.fire({
      icon: 'error',
      title: 'Empty Fields',
      text: 'Enter All Fields!',
    });</script>";
  }
}
?>