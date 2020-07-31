<!DOCTYPE html>
<html>
<head>
	<title>countdown</title>
</head>
<body>
	<form>
		<input type="date" id="date" name="date" placeholder="Time">
		<input type="submit" name="timer" value="submit">
	</form>
	<table border=1 style="border-collapse: collapse; text-align: center; width: 50%; margin: 20px auto;">
		<tr style="background-color:green; color: white;">
			<th>Days</th>
			<th>Hours</th>
			<th>Minutes</th>
			<th>Seconds</th>
		</tr>
		<tr>
			<td id="days"></td>
			<td id="hours"></td>
			<td id="minutes"></td>
			<td id="seconds"></td>
		</tr>
	</table>
</body>
</html>



<script type="text/javascript">
	function countdown(){
		var now = new Date();
		var eventDate = new Date("2020, 4, 8 20:10:0");

		//current Time
		var currentTime = now.getTime();
		var eventTime = eventDate.getTime();
		//remaining Time
		var remTime = eventTime - currentTime;
		//converting the time from milliseconds
		var s = Math.floor(remTime / 1000);
		var m = Math.floor(s / 60);
		var h = Math.floor(m / 60);
		var d = Math.floor(h / 24);
		//finding the remaining time
		h %= 24;
		m %= 60;
		s %= 60;
		//assigning 0 when values go below 1
		d = (d < 1) ? "0" : d;
		h = (h < 10) ? "0" : h;
		m = (m < 10) ? "0" : m;
		s = (s < 10) ? "0" : s;

		document.getElementById("days").innerText = d;
		document.getElementById("hours").innerText = h;
		document.getElementById("minutes").innerText = m;
		document.getElementById("seconds").innerText = s;

		setTimeout(countdown, 1000);
	}
	countdown();
</script>