<?php
@include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
</head>
<style media="screen">
  body {
    padding: 0;
    margin: 0px;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    box-sizing: border-box;

  }

  .container {
    display: flex;
    /* align-items: center;  */
  }


  .left {
    background-color: #00C1B6;
    height: 100vh;
    width: 250px;

  }

  .green {
    display: flex;
    justify-content: left;
    align-items: center;
    padding: 30px;
    padding-top: 40px;
    padding-bottom: 50px;
    width: 250px;
  }


  .right {
    /* margin-left: 30px;
    margin-top: 30px; */
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }

  ul {
    list-style-type: none;
  }

  li {
    padding-bottom: 35px;
  }

  .items img {
    height: 20px;
    width: 20px;
    padding-right: 10px;
  }

  a {
    text-decoration: none;
    color: white;
    font-size: 1.2rem;
    padding: 20px;
  }

  .name {
    font-size: 1.3rem;
    font-weight: bolder;
    color: white;


  }

  .logo img {
    width: 50px;
    border-radius: 50%;
    padding-right: 5px;
  }

  .row {
    padding: 20px;
    display: inline-grid;
    grid-template-columns: auto auto auto;
    column-gap: 70px;
    row-gap: 50px;
  }

  .cell {
    height: 130px;
    position: relative;
    left: 9rem;
    width: 120px;
    padding: 10px;
    border-radius: 15px;
    box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px;
    background-color: #FEFEFE;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    /* gap: 1rem; */
    font-weight: bolder;
  }
  .cname{
    width: 100%;
    height: 30%;display: flex;
    justify-content: center;
    align-items: center;
    font-size: 1.2rem;
  }
  .cnum{
    font-size: 2.5rem;
  }
  .c1 {
    background-color: #6EBCB7;
  }

  .right>* {
    /* background-color: red; */
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .foot {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .f1 {
    background-color: #E9F5F4;
    width: 80%;
    height: 85%;
    border-radius: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 2rem;
    box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px;

  }

  .f2 {
    font-size: 3rem;
    font-weight: bolder;
  }

  .mid {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .m1 {
    width: 80%;
    height: 100%;
    background-color: #0067FF;
    border-radius: 15px;
    box-shadow: rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 56px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-weight: bolder;
  }

  .mname {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    font-size: 2rem;
    color: white;
  }

  .m1 {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 2rem;
  }
  .mmemb{
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8rem;
    /* flex-direction: column; */
  }

  .sno {
    background-color: white;
    width: 100px;
    height: 100px;
    border-radius: 15px;
    color: #0067FF;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;

  }
</style>

<body>
  <div class="dashboard">
    <div class="container">
      <div class="left">
        <div class="green">
          <div class="logo">
            <img
              src="data:image/png;base64,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"
              alt="">
          </div>
          <div class="name">
            Green Hostel
          </div>
        </div>

        <div class="items">
          <ul>

            <li>
              <a href="menu.php">
                <img src="icons/restaurant.png" alt="">Menu
              </a>
            </li>
            <li>
              <a href="reviews.php">
                <img src="icons/star.png" alt="">Add Review
              </a>
            </li>
            <li>
              <a href="laundry.php">
                <img src="icons/laundry-machine.png" />Laundry
              </a>
            </li>
            <li>
              <a href="fee.php">
                <img src="icons/receipt.png" alt="">Fee structure
              </a>
            </li>
            <!-- <li>
              <a href="#">
                <img src="icons/credit-card.png" alt="">Payment
              </a>
            </li> -->
            <li>
              <a href="logout.php">
                <img src="icons\power-switch.png" alt="">Logout
              </a>
            </li>
          </ul>

        </div>
      </div>
      <div class="right">
        <div class="head">
          <div class="hl-con">

            <?php
            if (isset ($_SESSION['log']) && $_SESSION['log'] == 'true') {

              echo "<h1>Welcome " . $_SESSION['uname'] . "!</h1>";
            } else {
              echo "<h1>Welcome Guest!</h1>";
            }
            ?>
          </div>
          <div class="hr-con"></div>
        </div>
        <div class="mid">
          <div class="m1">
            <div class="mname">Your Room Mates</div>
            <div class="mmemb">
              <?php
              $sql = "SELECT * from Rooms where room = " . $_SESSION['uroom'] . "";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_assoc($result)) {
                if ($row['m1']) {

                  echo "<div class='sno'>" . $row['m1'] . "</div>";
                }
                if ($row['m2']) {

                  echo "<div class='sno'>" . $row['m2'] . "</div>";
                }
                if ($row['m3']) {

                  echo "<div class='sno'>" . $row['m3'] . "</div>";
                }
              }
              ?>
            </div>
          </div>
        </div>
        <div class="foot">
          <div class="f1">
            <div class='f2'>Details</div>
            <div class="cell">
              <div class="cname">
                Age
              </div>
              <div class="cnum">
                <?php
                echo $_SESSION['uage'];
                ?>
              </div>
            </div>
            <div class="cell">
            <div class="cname">
                Room
              </div>
              <div class="cnum">
                <?php
                echo $_SESSION['uroom'];
                ?>
              </div>
            </div>
            <div class="cell">
            <div class="cname">
                Roll Number
              </div>
              <div class="cnum">
                <?php
                echo $_SESSION['uroll'];
                ?>
              </div>
            </div>
            <div class="cell c1">
            <div class="cname">
                Payment
              </div>
              <div class="cnum1">
                Pending
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</body>

</html>