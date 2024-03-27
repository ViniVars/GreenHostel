<!DOCTYPE html>
<html>
<head>
  <title>Using SweetAlert in PHP</title>
  <!-- Include SweetAlert CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>
<body>
  <h1>Hello, World!</h1>
  
  <!-- Your PHP code goes here -->
  <?php
// Your PHP code here

// Check some condition
$condition = true;

if ($condition) {
    // Use SweetAlert to show an alert
    echo "<script>Swal.fire({
        title: 'Good job!',
        text: 'You clicked the button!',
        icon: 'success'
      });</script>";
}
?>

  
  <!-- Include SweetAlert JavaScript -->
</body>
</html>




























<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            overflow-x: hidden;
        }
        nav{
            background-color: #00C1B6;
            width: 100%;
            height: 10vh;
            /* border-bottom-left-radius: 15px; */
            /* border-bottom-right-radius: 15px; */
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .menu1{
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2rem;
            position: relative;
            left: -10rem;
        }
        .menu1 > *{
            width: 100px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 12px;
            background-color: white;
            /* border: 4px solid #6F7BCF; */
            color: #00C1B6;
            /* font-family: ; */
        }
        a{
            color:#00C1B6;
            font-weight: bolder;
            font-size: 1.1rem;
            
        }
        .details{
            position: relative;
            left: 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            color: white;
        }
        .name{
            font-size: 1.3rem;
            font-weight: bolder;

        }
        img{
            width: 50px;
            border-radius: 50vw;
        }
    </style>
</head>
<body>
    <nav>
        <div class="details">
            <div class="logo">
                <img src="data:image/png;base64,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" alt="">
            </div>
            <div class="name">
                Green Hostel
            </div>
        </div>
        <div class="menu1">
            <div class="home"><a href="register.php">Home</a></div>
            <div class="allot"><a href="allotment.php">Rooms</a></div>
            <div class="laund"><a href="laundry.php">Laundry</a></div>
            <div class="review"><a href="reviews.php">Reviews</a></div>
        </div>
    </nav>
</body>
</html> -->