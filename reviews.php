<?php
@include 'connect.php';
@include 'navbar.php';
echo $_SESSION['log'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_SESSION['log'] == "false") {
        echo "You need to Login First";
        header("Location: login.php");
        exit();
    } else {
        $rev = $_POST["revcon"];
        echo $rev;
        if ($rev) {
            $sql = "insert into reviews(review) values('$rev')";
            $result = mysqli_query($conn, $sql);
            header("Location: register.php");
            exit();
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <style>

      .notifications-container {
  width: 320px;
  height: auto;
  font-size: 0.875rem;
  line-height: 1.25rem;
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.flex {
  display: flex;
}

.flex-shrink-0 {
  flex-shrink: 0;
}

.success {
  padding: 1rem;
  height: 200px;
  border-radius: 0.375rem;
  background-color: #ECFDF5;
  border-radius: 15px;
  border: #065F46 4px solid;
  font-size: 1.1rem;
  font-weight: bolder;
}

.succes-svg {
  color: rgb(74 222 128);
  width: 1.25rem;
  height: 1.25rem;
}

.success-prompt-wrap {
  margin-left: 0.75rem;
}

.success-prompt-heading {
  font-weight: bold;
  color: rgb(22 101 52);
}

.success-prompt-prompt {
  margin-top: 0.5rem;
  color: rgb(21 128 61);
}

.success-button-container {
  display: flex;
  margin-top: 0.875rem;
  margin-bottom: -0.375rem;
  margin-left: -0.5rem;
  margin-right: -0.5rem;
}

.success-button-main {
  padding-top: 0.375rem;
  padding-bottom: 0.375rem;
  padding-left: 0.5rem;
  padding-right: 0.5rem;
  background-color: #ECFDF5;
  color: rgb(22 101 52);
  font-size: 0.875rem;
  line-height: 1.25rem;
  font-weight: bold;
  border-radius: 0.375rem;
  border: none
}

.success-button-main:hover {
  background-color: #D1FAE5;
}

.success-button-secondary {
  padding-top: 0.375rem;
  padding-bottom: 0.375rem;
  padding-left: 0.5rem;
  padding-right: 0.5rem;
  margin-left: 0.75rem;
  background-color: #ECFDF5;
  color: #065F46;
  font-size: 0.875rem;
  line-height: 1.25rem;
  border-radius: 0.375rem;
  border: none;
}
.revs-con{
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 2rem;
  padding: 2rem;
}
body{
  background-color: rgb(240 253 244);
}


    </style>
</head>

<body>
    <div class="inp-cover">

        <form method="post" action='reviews.php'>
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
  <input required="" class="inpz" placeholder="Add Review.." name="revcon" type="text" id="messageInput" />
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
$sql = "Select * from reviews";
$result = mysqli_query($conn, $sql);
// echo "<script>let k = document.querySelector('.revs-con');while(k.lastChild){k.removeChild(k.lastChild);};conosle.log(k)</script>";
if (mysqli_num_rows($result) > 0) {
    echo "<div class='revs-con'>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="notifications-container">
  <div class="success">
    <div class="flex">
      <div class="flex-shrink-0">
        
        <svg class="succes-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
        </svg>
      </div>
      <div class="success-prompt-wrap">
        <p class="success-prompt-heading">Review
        </p><div class="success-prompt-prompt">
          <p>'.$row['review'].'</p>
        </div>
      </div>
    </div>
  </div>
</div>';
        // echo "<div class='card'>";
        // // echo "<div>".$row[""]."";
        // echo "Review : ".$row["review"].".";
        // echo "</div>";
    }
    echo "</div>";
}
?>