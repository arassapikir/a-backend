<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>5 ýyllyk TRIP</title>
    <style>
        body {
            text-align: center;
            font-family: "Monaco", "Lucida Console", monospace;
        }
    </style>
</head>
<body>
<h5>5 ýyla çeken trip</h5>
<p id="countDown" style="font-size: 18px; font-weight: bold;"></p>
<span style="font-size: 12px;"> 01.09.2016 - 01.07.2021</span>
<br/>
<span style="font-size: 7px;"> #wagtgeçenok #gaýratet #soňunda #azgaldy #günsanaýan </span>

<script>
    // Set the date we're counting down to
    var countDownDate = new Date("July 1, 2021 09:00:00").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("countDown").innerHTML = days + " gün " + hours + " sag "
            + minutes + " min " + seconds + " sek ";

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countDown").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>
</body>
</html>
