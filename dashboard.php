<?php
 @include 'connect.php';
 if($_SESSION['log'] != 'admin'){
    header('Location: login.php');
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            overflow: hidden;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        .d-con {
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .d-con>* {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
        }

        .dl-con {
            background-color: #00C1B6;
            width: 30%;
            flex-direction: column;
        }

        .dr-con {
            position: relative;
            flex-direction: column;
            left: -2rem;
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
            background-color: white;

        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            height: 30vh;
        }

        .Overview {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            position: relative;
            left: 2rem;
        }

        .name {
            font-size: 2rem;
            font-weight: bolder;
        }

        .time {
            background-color: #FF6251;
            width: 170px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 15px;
            height: 25px;
        }

        .main1 {
            width: 90%;
            height: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cards {
            position: relative;
            left: 3rem;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
        }

        .admin-cover {
            display: flex;
            justify-content: center;
            /* align-items: center; */
            flex-direction: column;
            gap: 0.5rem;
        }

        .welcome,
        .admin {
            font-size: 1.5rem;
            font-weight: bolder;
        }

        .welcome {
            font-size: 2rem;
        }


        .card {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 1rem;
            font-size: 1.1rem;
            font-weight: bolder;
            width: 170px;
            height: 170px;
            background-color: red;
            border-radius: 15px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;        }

        .today {
            writing-mode: vertical-lr;
            /* vertical right-to-left */
            text-orientation: upright;
            display: flex;
            gap: .7rem;
            font-weight: bolder;
            font-size: 1.1rem;

        }

        .today span {
            transform: rotate(360deg);
            transform-origin: bottom;
            /* Set transform origin to the bottom */
        }

        .main2 {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 90%;
            height: 100%;
            gap: 2rem;
        }

        .dis1,
        .dis2 {
            width: 100%;
            height: 90%;
            background-color: white;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;            border-radius: 15px;
        }

        .dis1 {
            width: 70%;
        }

        .c1 {
            background-color: #8CC3A9;

        }

        .total-num {
            font-size: 4rem;
        }

        .c2 {
            background-color: #095F59;
            color: white;
        }

        .c3 {
            background-color: #0067FF;
            color: white;
        }

        .hostel-name {
            width: 90%;
            height: 20%;
            position: relative;
            left: -1.5rem;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            font-size: 2.5rem;
            color: #FFFD6B;
            font-weight: bolder;
        }
        .hostel-name > span{
            color: black;
        }

        .nav {
            position: relative;
            left: -1.5rem;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 2rem;
        }

        .nav img {
            width: 50px;
        }

        .nav>* {
            display: flex;
            width: 70%;
            border-radius: 15px;
            height: 70px;
            background-color: white;
            justify-content: center;
            align-items: center;
            gap: 1rem;
        }

        a {
            text-decoration: none;
            color: white;
            color: black;
        }
        .dis2{
            display: flex;justify-content: center;
            align-items: center;
            flex-direction: column;
            font-size: 1.3rem;
            font-weight: bolder;
            background-color: #0067FF;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
            /* gap: 0.5rem; */
        }
        .dis2 > *{
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }
        .rev-name{
            justify-content: flex-start;
            align-items: flex-start;
            top: 2rem;
            height: 40%;
        
            position: relative;
            left: 2rem;
        }
        .rev-con{
            align-items: flex-start;
        }

        .regis{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 40%;
            font-size: 2rem;
            font-weight: bolder;
        }
        .memb{
            display: flex;
            justify-content: center;
            align-items: flex-start;
            width: 100%;
            height: 100%;
            gap: 2.5rem;
            font-size: 1rem;
            font-weight: bolder;
        }
        .memb > *{
            /* width: 100%; */
            /* height: 50%; */
            display: flex;
            gap: 0.5rem;
            justify-content: center;
            flex-direction: column;
            align-items: center;

        }
        .Logout img {
            width: 50px;
            /* border-radius: 50vw; */
        }
        .hash{
            background-color: #0067FF;
            width: 100px;
            height: 100px;
            border-radius: 15px;
            color: white;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        }
    </style>
</head>

<body>
    <div class="d-con">
        <div class="dl-con">
            <div class="hostel-name">
                Green <span>Hostel</span>
            </div>
            <div class="nav">
                <div class="allotment-con">
                    <div class="logo">
                        <img src="images-removebg-preview (8).png" alt="">
                    </div>
                    <div class="name"><a href="allotment.php">Rooms</a></div>
                </div>
                <div class="register-con">
                    <div class="logo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
  <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
</svg>
                    </div>
                    <div class="name"><a href="register.php">Register</a></div>
                </div>
                <div class="laundry-con">
                    <div class="logo">
                        <img src="laundry.png" alt="">
                    </div>
                    <div class="name"><a href="laundry.php">Laundry</a></div>
                </div>
                <div class="payment-con">
                    <div class="logo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
  <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5z"/>
</svg>
                    </div>
                    <div class="name"><a href="checkout.php">Payment</a></div>
                </div>
                <div class="review-con">
                    <div class="logo">
                        <img src="review.png" alt="">
                    </div>
                    <div class="name"><a href="reviews.php">Reviews</a></div>
                </div>
            </div>
        </div>
        <div class="dr-con">
            <nav>
                <div class="Overview">
                    <div class="name">
                        Overview
                    </div>
                    <?php
                    $current_time = date('Y-m-d H:i:s');
                    echo "<div class='time'>" . $current_time . "</div>";
                    ?>
                </div>
                <div class="Logout">
                <a href="logout.php"><img src="https://cdn-icons-png.freepik.com/512/10233/10233766.png" alt=""></a>
                </div>
            </nav>
            <div class="main1">
                <div class="admin-cover">
                    <div class="welcome">
                        Welcome Back
                    </div>
                    <div class="admin">
                        Admin
                    </div>
                    <div class="content">
                        Your Admin panel allows you to manage <br> all the activites of the website
                    </div>
                </div>
                <div class="cards">
                    <div class="today">
                        <span>T</span>
                        <span>O</span>
                        <span>D</span>
                        <span>A</span>
                        <span>Y</span>
                    </div>
                    <div class="card c1">
                        <div class="total-name">
                            Total Registrations
                        </div>
                        <?php
                       
                        $sql = "SELECT COUNT(*) AS total FROM login";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<div class='total-num'>" . $row['total'] . "</div>";
                            }
                        }
                        ?>
                    </div>
                    <div class="card c2">
                        <div class="room-name">
                            Avaliable Rooms
                        </div>
                        <?php
                        @include 'connect.php';
                        $sql = "SELECT COUNT(*) AS aval FROM Rooms WHERE memb <> 3";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<div class='total-num'>" . $row['aval'] . "</div>";
                            }
                        }
                        ?>
                    </div>
                    <div class="card c3">
                        <div class="room-name">
                            Laundry Bookings
                        </div>
                        <?php
                        @include 'connect.php';
                        $sql = "SELECT COUNT(*) AS laund FROM laundry WHERE occup = 1";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<div class='total-num'>" . $row['laund'] . "</div>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="main2">
                <div class="dis1">
                    <div class="regis">
                        Recently Registered
                    </div>
                    <div class="memb">
                        <?php
                            $sql = "SELECT * FROM login
                            ORDER BY kno DESC
                            LIMIT 3;
                            ";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<div class='hash'>";
                                    echo "<div class='sno'>".$row['sno']."</div>";
                                    echo "<div class='rname'>".$row['name']."</div>";
                                    echo "<div class='room'>".$row['room']."</div>";
                                    echo "</div>";
                                }
                            }

                        ?>

                    </div>
                </div>
                <div class="dis2">
                    <div class="rev-name">
                        Latest Review
                    </div>
                    <div class="rev-con">
                        <?php
                            $sql = "SELECT * FROM reviews
                            ORDER BY sno DESC
                            LIMIT 1;
                            ";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo $row['review'];
                                }
                            }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>