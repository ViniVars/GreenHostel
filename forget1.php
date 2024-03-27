<?php
@include 'connect.php';
if(!isset($_SESSION['change'])){
    header('Location: forget.php');
    exit();
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    $mail = $_SESSION['change'];
    if($pass == $cpass){
        $sql = "UPDATE login
        SET password = '$pass'
        WHERE email = '$mail'";
        $result = mysqli_query($conn, $sql);
        echo'Done';
        unset($_SESSION["change"]);
        header('Location: login.php');
        exit();

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            color: #00C1B6;
            overflow: hidden;

        }
        .p-con{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100vw;
        }
        .p-con > *{
            height: 100%;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .pr-con{
            gap: 4rem;
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

    input[type='submit'] {
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

    input[type='submit']:hover {
      cursor: pointer;
      scale: 1.05;
    }
    .forgotpass{
        width: 55%;
        font-size: 2.5rem;
        font-weight: bolder;
    }
    img{
        width: 650px;
        position: relative;
        top: 2rem;
        left: 5rem;
    }
    </style>
</head>
<body>
    <form action="forget1.php" method="post">
        <div class="p-con">
            <div class="pl-con">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/022/347/555/small_2x/technology-security-shield-logo-3d-icon-of-lock-vpn-symbol-digital-authentication-and-proxy-server-connection-illustration-virtual-private-network-password-protection-free-vector.jpg" alt="">
            </div>
            <div class="pr-con">
                <div class="forgotpass">
                    <div class="forgot">
                        Forgot
                    </div>
                    <div class="pass">
                        Your Password?
                    </div>
                    <?php
                    echo "<div>".$_SESSION['change']."</div>";
                    ?>
                </div>
                <div class="passinp">
                    <input type="text" name="pass" placeholder="New Password">
                </div>
                <div class="cpassinp">
                    <input type="text" name="cpass" placeholder="Confirm Password">
                </div>
                <div class="chan-btn">
                <input type="submit" value="Change">
            </div>
        </div>
    </div>
</form>
</body>
</html>