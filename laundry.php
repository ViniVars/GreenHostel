<?php
@include 'connect.php';

$currentDate = date("Y-m-d");
// echo $currentDate;
$flag = 0;
$sql = 'SELECT * from date1';
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);
if ($rows['date'] != $currentDate) {
  $sql = 'UPDATE laundry set occup = 0';
  $result = mysqli_query($conn, $sql);
  $sql = "UPDATE date1 set date = '$currentDate'";
  $result = mysqli_query($conn, $sql);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['cellValue'])) {
    $res = $_POST['cellValue'];
    // echo $res;
    $sql = "SELECT * from laundry where sno = '$res'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      if ($row['occup'] == 1) {
        echo "Slot already Booked!!";
      } else {
        echo "Slot booking Successfull!!";
        $sql = "UPDATE laundry 
        SET occup = 1
        WHERE sno = '$res'";
        $result = mysqli_query($conn, $sql);

      }
    }
    exit();
  } else {
    echo "No cell value received";
    exit();
  }
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Laundry</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
  <style>
    body{
      background-color: #EAF7E3;
      overflow: hidden;
    }
  </style>
</head>

<body>
  <?php 
@include 'navbar.php';
?>
  <div class="lo-con">
    <div class="l-con">
      <div class="cell" id='1'>8:00AM - 9:00AM</div>
      <div class="cell" id='2'>9:00AM - 10:00AM</div>
      <div class="cell" id='3'>10:00AM - 11:00AM</div>
      <div class="cell" id='4'>11:00AM - 12:00PM</div>
      <div class="cell" id='5'>12:00PM - 1:00PM</div>
      <div class="cell" id='6'>1:00PM - 2:00PM</div>
      <div class="cell" id='7'>2:00PM - 3:00PM</div>
      <div class="cell" id='8'>3:00PM - 4:00PM</div>
      <div class="cell" id='9'>4:00PM - 5:00PM</div>
      <div class="cell" id='10'>5:00PM - 6:00PM</div>
    </div>
  </div>

  <script>
    <?php
    $sql = 'SELECT * from laundry';
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "cells = document.querySelectorAll('.cell');
              cells.forEach(cell => {
                  if(cell.id == '" . $row['sno'] . "') {
                    if(" . $row['occup'] . "){

                      cell.classList.add('Red');
                    }
                    else{
                      cell.classList.add('Green');

                    }
                      console.log('Done');
                  }
              });";
      }
    }
    ?>
    document.addEventListener('DOMContentLoaded', function () {
      let cells = document.querySelectorAll('.cell');
      cells.forEach(cell => {
        cell.addEventListener('click', e => {
          let cellValue = e.target.id;
          // window.location.reload()
          let xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
              // console.log(this.responseText);
              window.location.reload();
              alert(this.responseText);
            }
          };
          xhttp.open('POST', 'laundry.php', true);
          xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
          xhttp.send('cellValue=' + encodeURIComponent(cellValue));
        });
      });
    });

  </script>
</body>

</html>