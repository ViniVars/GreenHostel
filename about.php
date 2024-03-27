<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>About us</title>
    <script src="https://kit.fontawesome.com/a660782495.js" crossorigin="anonymous"></script>
    <style media="screen">
      body{
        margin: 0px;
        text-decoration: none;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
      }

      .coloured{
        background-color:#00C1B6;
        color: #fff;
      }

  #top {
    display: flex;
    align-items: center;
    padding-top: 70px;
    padding-left: 20px;
  }

  #top img {
    /* margin-top: 10px; */
    padding: 15px;

  /* margin-right: 10px; */
  /* padding-right: 10px;
  padding-left: 10px; */
  height: 80vh;
  width: 70vh;
  border-radius: 50%;
  background-color: #fff;
  }

  .text{
    font-size: 30px;
    padding-left: 30px;
    /* background-color: #30e3cb; */
  }
#amenities
{
  margin-top: 50px;
  padding-bottom: 30px;
}

#amenities h2{
  padding: 10px;
  color:#11999E;
}

#amenities h3{
  color:#66BFBF;
}
#amenities img{
  height: 50px;
  width: 50px;
}

#amenities .row{
   display: inline-grid;
   grid-template-columns: auto  auto auto;
   column-gap: 50px;
   row-gap: 30px;
}

#bottom {
  padding:40px;
}

#bottom p{
  font-size: 18px;
}






    </style>
  </head>
  <body>
    <?php @include 'navbar.php' ?>
    <section class="coloured" id="top">
      <div class="image">
        <img src="https://www.surfacesreporter.com/myuploads/ZED_St.%20Andrews%20boys%20hostel%202.jpg" alt="">

      </div>
      <div class="text">
        <h1>Welcome Home!</h1>
        <h3>Come stay in our Green hostel , only few minutes away from Bheemili beach . </h3>
      </div>

    </section>
    <section class="white" id=amenities>

      <center>
        <h2>AMENITIES</h2>


      <div class="row">
        <div class=row-box"">
          <img src="icons/wifi.png" alt="">
          <h3>Free wifi</h3>
        </div>
        <div class="row-box">
          <img src="icons/laundry-machine.png" alt="">
          <h3>Laundry</h3>

        </div>
        <div class="row-box">
          <img src="icons/cctv-camera.png" alt="">
          <h3>CCTV security</h3>
        </div>
        <div class="row-box">
          <img src="icons/television.png" alt="">
          <h3>Common television</h3>

        </div>
        <div class="row-box">
          <img src="icons/elevator.png" alt="">
          <h3>Lift service</h3>
        </div>
        <div class="row-box">
          <img src="icons/restaurant.png" alt="">
          <h3>Food</h3>
        </div>
        <div class="row-box">
          <img src="icons/multiple-users-silhouette.png" alt="">
          <h3>Friendly staff</h3>

        </div>
        <div class="row-box">
          <img src="icons/garage.png" alt="">
          <h3>Private parking</h3>
        </div>
        <div class="row-box">
          <img src="icons/house-keeping.png" alt="">
          <h3>Daily Housekeeping</h3>

        </div>

      </div>
</center>



    </section>
    <section class="coloured" id="bottom">
      <center>
        <h3>Looking for a stay without compromising on your comfort & burning a hole in your pocket? </h3>
          <h3>Green hostels are best if you want to have the true hostel experience.</h3>
        <p>For more details </p>
          <p>contact us :1234567890</p>
      </center>

    </section>


  </body>
</html>
