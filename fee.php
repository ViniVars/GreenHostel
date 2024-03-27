<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Fee structure</title>
    <style media="screen">
      body{
        background-color: #00C1B6;
/* background-image: url("https://navi.com/blog/wp-content/uploads/2022/06/VISA-vs-MasterCard.jpg");
background-size: 100% 100%; */
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
      }
      .fee_structure {
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;

      }

      .cost{
        background-color: #eee;
        height: 300px;
        width:300px;
        padding: 20px;
        border-radius: 10px 40px;
        border: 3px dashed  #00C1B6;
        box-shadow: 0px 5px 10px #fff;
        margin-top: -50px;
        /* margin-bottom: -150px; */
      }

      .fee_structure .cost h2 {
        padding-top: 10px;
        color: #11999E;
        padding-bottom: 10px;
      }

      .fee_structure .cost p{
        padding-bottom: 5px;
        font-size: 18px;
        font-style: italic;
      }

      .myButton {
	background-color:#11999E;

	border-radius:28px;
	border:1px solid #66BFBF;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
	font-size:15px;
	padding:10px 25px;
	text-decoration:none;
	text-shadow:0px 1px 0px #11999E;
}
.myButton:hover {
	background-color:#00C1B6;
}
.myButton:active {
	position:relative;
	top:1px;
}


    </style>
  </head>
  <body>
    <?php @include 'navbar.php' ?>
    <div class="fee_structure">
      <!-- <div class="image">
        <img src="https://navi.com/blog/wp-content/uploads/2022/06/VISA-vs-MasterCard.jpg" alt="">
      </div> -->
      <div class="cost">
        <h2>Fee structure</h2>
        <p>3 sharing rooms only available</p>
        <p>7000/- per month </p>
        <p>Room : 3000/-</p>
        <p>Food : 4000/-</p>
        <center>
        <a href="checkout.php"><button name="button" class="myButton">Pay</button></a>
        </center>

      </div>
    </div>
  </body>
</html>
