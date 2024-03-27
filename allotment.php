<?php
@include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #EAF7E3;
        }
        .room-con{
  width: 70vw;
  height: 100vh;
  /* background-color: blue; */
  padding: 2rem 1rem;
  display: grid;
  gap: 2rem;
  grid-template-columns: repeat(3, 1fr);

}
.open{
  display: flex;
  width: 20vw;
  height: 20vh;
  gap: 0.2rem;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  font-size: 1.1rem;
    font-weight: bolder;
    /* font-style: italic; */
}

.allm-con{
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 0.2rem;
    font-size: 1rem;
    font-weight: bolder;
    font-style: none;

    /* align-items: center; */
}
/* .Green{
    background-color: #00C1B6;
} */

    </style>

</head>
<body>
<div class="inp-cover">

<form method="post" action='allotment.php'>
<div class="messageBox">
<div class="fileUploadWrapper">
<label for="file">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 337 337">
<circle
  stroke-width="20"
  stroke="#6c6c6c"
  fill="none"
  r="158.5"
  cy="168.5"
  cx="168.5"
></circle>
<path
  stroke-linecap="round"
  stroke-width="25"
  stroke="#6c6c6c"
  d="M167.759 79V259"
></path>
<path
  stroke-linecap="round"
  stroke-width="25"
  stroke="#6c6c6c"
  d="M79 167.138H259"
></path>
</svg>
<span class="tooltip">Add Review</span>
</label>
<input type="file" id="file" name="file" />
</div>
<input required="" placeholder="Search Profile" name="ainp" type="text" id="messageInput" />
<button id="sendButton">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 664 663">
<path
fill="none"
d="M646.293 331.888L17.7538 17.6187L155.245 331.888M646.293 331.888L17.753 646.157L155.245 331.888M646.293 331.888L318.735 330.228L155.245 331.888"
></path>
<path
stroke-linejoin="round"
stroke-linecap="round"
stroke-width="33.67"
stroke="#6c6c6c"
d="M646.293 331.888L17.7538 17.6187L155.245 331.888M646.293 331.888L17.753 646.157L155.245 331.888M646.293 331.888L318.735 330.228L155.245 331.888"
></path>
</svg>
</button>
</div>

        </form>
    </div>

</body>
</html>

<?php
@include 'connect.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $ainp = $_POST['ainp'];
    $sql = "SELECT * from login where sno = '$ainp'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        echo "<div class='container'>
        <div class='form_area'>
            <p class='title'>STUDENT DETAILS</p>
            <form>
                <div class='form_group'>
                    <label class='sub_title' for='name'>Name</label>
                    <input placeholder='Enter your full name' disabled class='form_style' type='text' value=".$row['name'].">
                </div>
                <div class='form_group'>
                    <label class='sub_title' for='email'>Email</label>
                    <input placeholder='Enter your email' disabled id='email' class='form_style' type='email' value=".$row['email'].">
                </div>
                <div class='form_group'>
                    <label class='sub_title' for='password'>Age</label>
                    <input placeholder='Enter your password' disabled id='password' class='form_style' type='text' value=".$row['age'].">
                </div>
                <div class='form_group'>
                    <label class='sub_title' for='password'>Location</label>
                    <input placeholder='Enter your password' disabled id='password' class='form_style' type='text' value=".$row['location'].">
                </div>
                <div class='form_group'>
                    <label class='sub_title' for='password'>Phone Number</label>
                    <input placeholder='Enter your password' disabled id='password' class='form_style' type='text' value=".$row['phone'].">
                </div>
                <div class='form_group'>
                    <label class='sub_title' for='password'>Room Number</label>
                    <input placeholder='Enter your password' disabled id='password' class='form_style' type='text' value=".$row['room'].">
                </div>
                <div class='form_group'>
                    <label class='sub_title' for='password'>Hostel Roll Number</label>
                    <input placeholder='Enter your password' disabled id='password' class='form_style' type='text' value=".$row['sno'].">
                </div>
                </div>";

        // echo $row['name'];

    }
    else{
        echo "Invalid";
    }

}
else{

    $sql = "SELECT * from Rooms";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        echo "<div class='room-con'>";
        while($row = mysqli_fetch_assoc($result)){
            if($row['memb'] == 3){
    
                echo "<div class='cell open Red' id = ".$row['room'].">";
                echo "<div class='r-cover'>";
                echo "Room Number : ".$row['room'];
                echo "</div>";
                echo "<div class='m-con'>";
                echo "Members : ".$row['memb'];
                echo "</div>";
                echo "<div class='allm-con'>";
                if($row["m1"]){
                echo "<div>";
                echo "Member 1 : ".$row['m1'];
                echo "</div>";
                }
                if($row["m2"]){
                echo "<div>";
                echo "Member 2 : ".$row['m2'];
                echo "</div>";
                }
                if($row["m3"]){
                echo "<div>";
                echo "Member 3 : ".$row['m3'];
                echo "</div>";
                }
                echo "</div>";
                echo "</div>";
            }
            else{
                
                echo "<div class='cell open Green' id = ".$row['room'].">";
                echo "<div class='r-cover'>";
                echo "Room Number : ".$row['room'];
                echo "</div>";
                echo "<div class='m-con'>";
                echo "Members : ".$row['memb'];
                echo "</div>";
                echo "<div class='allm-con'>";
                if($row["m1"]){
                echo "<div>";
                echo "Member 1 : ".$row['m1'];
                echo "</div>";
                }
                if($row["m2"]){
                echo "<div>";
                echo "Member 2 : ".$row['m2'];
                echo "</div>";
                }
                if($row["m3"]){
                echo "<div>";
                echo "Member 3 : ".$row['m3'];
                echo "</div>";
                }
                echo "</div>";
                echo "</div>";
            }
        }
        echo "</div>";
    }
}

?>