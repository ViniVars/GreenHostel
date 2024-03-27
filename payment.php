<?php
@include 'connect.php';
// @include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dropdown Example</title>
<style>
     body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(to bottom, #4e54c8, #8f94fb);
    /* Gradient background from a purpleish tone to a bluish tone */
    min-height: 100vh; /* Ensure the background covers the entire viewport height */
    display: flex; /* Enable flexbox to vertically center the container */
    align-items: center; /* Vertically center the container */
    justify-content: center; /* Horizontally center the container */
}
    .container {
        max-width: 600px;
        height: 70vh;
        margin: 100px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
        color: #333;
        text-align: center;
    }
    label {
        font-weight: bold;
        color: #666;
    }
    select, input {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    select {
        font-weight: bolder;
        background-color: #3498db;
        color: #fff;
    }
    select:focus {
        outline: none;
    }
    input {
        font-weight: bolder;
        background-color: #fff;
        color: #333;
    }
    option{
        /* background-color: red; */
        padding: 2rem;
        height: 10vh;
    }
    .mode-cover{
        height: 50%;
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        /* background-color: red; */
        gap: 2rem;
    }
    .mode1-cover, .mode2-cover{
        height: 50%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-size: 1.1rem;
        font-weight: bolder;
        /* background-color: red; */
        gap: 1rem;
    }
    img{
        width: 50px;
    }
    .qr{
        width: 150px;
    }
    .mode-cover > *{
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 1rem;
        font-size: 1.1rem;
        font-weight: bolder;
        cursor: pointer;
    }
    .card-number-cover{
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 1rem;

    }
    .expcvv-cover{
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.5rem;
    }
    .back{
        cursor: pointer;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Payment</h2>
    <label for="options">Type of Payment:</label>
    <select id="options" onchange="updateInput(this)">
        <option value="7000">Full Payment</option>
        <option value="3000">Mess Payment</option>
        <option value="4000">Room Payment</option>
        <!-- <option value="40">Option 4</option> -->
    </select>
    <label for="value">Money To Pay:</label>
    <input type="text" id="value" value="7000" disabled readonly>
    <div class="mode-cover">
        <div class="phone-pay-cover" onclick="toggle(0)">
            <div class="phonepay-img"><img src="data:image/png;base64,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" alt=""></div>
            <div class="phonepay">PhonePay</div>
        </div>
        <div class="phone-pay-cover" onclick="toggle(2)">
            <div class="phonepay-img"><img src="data:image/png;base64,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" alt=""></div>
            <div class="phonepay">Card</div>
        </div>
    </div>
    <div class="mode1-cover">
        <div class="qr-scanner">
            <img class="qr" src="data:image/png;base64,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" alt="">
        </div>
        <div class="back" onclick="back()">Back</div>
    </div>
    <div class="mode2-cover">
        <div class="card-number-cover">
            <div class="card-number">Card Number : </div>
            <div class="card-number-inp">
                <input type="text" placeholder="Card Number" >
            </div>
        </div>
        <div class="expcvv-cover">
            <div class="exp-cover">
                <div class="exp-name">Expires</div>
                <div class="exp-inp">
                    <input type="text" placeholder='Month'>
                    <input type="text" placeholder='year'>
                </div>
            </div>
            <div class="cvv-cover">
                <div class="cvv-name">CVV</div>
                <div class="cvv-inp">
                    <input type="text" placeholder='CVV'>
                </div>
            </div>
        </div>
        <div class="back" onclick="back1()">Back</div>
    </div>
</div>

<script>
    document.querySelector('.mode1-cover').style.display = 'none';
    document.querySelector('.mode2-cover').style.display = 'none';
    function updateInput(select) {
        var valueInput = document.getElementById("value");
        valueInput.value = select.value;
    }
    function toggle(p){
        document.querySelector('.mode-cover').style.display = 'none';
        if(p == 0){
            document.querySelector('.mode1-cover').style.display = 'flex';
        }
        else{

            document.querySelector('.mode2-cover').style.display = 'flex';
        }
    }
    function back(){
        document.querySelector('.mode-cover').style.display = 'flex';
        document.querySelector('.mode1-cover').style.display = 'none';
    }
    function back1(){
        document.querySelector('.mode-cover').style.display = 'flex';
        document.querySelector('.mode2-cover').style.display = 'none';
    }
</script>
</body>
</html>
