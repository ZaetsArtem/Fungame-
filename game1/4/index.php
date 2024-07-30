<?php
    //Запускаем сессию
    session_start();

    require_once("../../dbconnect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Гра найди відмінності</title>
<link href="style.css" rel="stylesheet" type="text/css" />

<!-- Call Jquery -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<!-- Clicking in image map areas -->
<script type="text/javascript">
$(document).ready(function() {
    var str='';     
    // When clicked, show difference
	$('#transparentmap AREA').click(function() { 
 
	var theDifference = '#'+$(this).attr('id')+'-diff';
	$(theDifference).css('display', 'inline');
      $(theDifference).data('clicked', true);
//       var str;
      if(str=='') {
        str = theDifference;
      } else {
        str = str + ';' + theDifference;
      }
      document.getElementById("range").value =  str;
     
	
	// When all differences selected/clicked, show login submission form
	if($('#a1-diff').data('clicked') && $('#a2-diff').data('clicked') && $('#a3-diff').data('clicked') && $('#a4-diff').data('clicked') && $('#a5-diff').data('clicked') && $('#a6-diff').data('clicked') && $('#a7-diff').data('clicked') && $('#a8-diff').data('clicked') && $('#a9-diff').data('clicked') && $('#a10-diff').data('clicked')) {
		$('#form_container').css('display', 'inline');

function addTwoNumberss() {
  var timer = document.getElementById("base-timer-label").innerHTML;
  document.getElementById("timergame").value=timer;
}
addTwoNumberss();
	}
	
	});
});
</script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function() {
  $('#myObj').click(function() {
    $('#counter').html(+$('#counter').html()+1);
  });
});
$(document).ready(function() {
  $('#myObj').click(function() {
function addTwoNumbers() {
  var number1, number2
  number1=parseFloat(document.getElementById("counter1").value);
  number2=parseFloat(1);
  //alert(number1+number2);
  document.getElementById("counter1").value=number1+number2;
}
addTwoNumbers();
  });
});
</script>
</head>
<body>
 <?php
                //перевірка, чи авторизований користувач
                if(!isset($_SESSION['login']) && !isset($_SESSION['password'])){
                    // якщо ні, то виводимо блок з посиланнями на реєстрацію і авторизацію
            ?>
<h3> ERROR </h3>
     <?php
                   }else{
                    //якщо користувач авторизований, то виводимо основну частину веб сайту
            ?>


<div id="wrapper">
<div id="different"></div>
<div id="transparentmap">
		<img class="transparentmap" src="contest_files/transparentmap.png" usemap="#photohunt"  id="myObj" style="border-style: solid;">
		<map name="photohunt">
			<area id="a1" shape ="circle" coords="34, 310, 21" />
			<area id="a2" shape ="circle" coords="306, 577, 22" />
			<area id="a3" shape ="circle" coords="36, 573, 17" />
			<area id="a4" shape ="circle" coords="358, 554, 27" />
			<area id="a5" shape ="circle" coords="369, 401, 22" />
	                <area id="a6" shape ="circle" coords="371, 319, 22" />
			<area id="a7" shape ="circle" coords="193, 327, 18" />
			<area id="a8" shape ="circle" coords="55, 85, 21" />
			<area id="a9" shape ="circle" coords="168, 24, 22" />
			<area id="a10" shape ="circle" coords="349, 32, 23" />
		</map>
	</div><!-- end transparent map -->
		<div id="a1-diff"></div>
		<div id="a2-diff"></div>
		<div id="a3-diff"></div>
		<div id="a4-diff"></div>
		<div id="a5-diff"></div>
	        <div id="a6-diff"></div>
		<div id="a7-diff"></div>
		<div id="a8-diff"></div>
		<div id="a9-diff"></div>
		<div id="a10-diff"></div>
		<center><h1>Гра знайди відмінності</h1></center>
				<div id="original">
<p>Шукати відмінності потрібно на правій фотографії! Зроблено хибних кліків: <text id="counter">0</text></p><br/>
<img src="contest_files/noriginal.png" style="margin-top: -8px;border-style: solid;">
		</div><!-- end original -->
	<form method="post" action="results.php">
<div id="form_container">
  <h1>Вітаємо, Ви знайшли всі 10 відмінностей!</h1>
  Щоб повернутись на головну сторінку натисніть на кнопку "Вихід"!<br><br>
<input name="range" type="hidden" id="range"  value="" />
        <input name="click" type="hidden" id="counter1"  value="0" />
        <input name="timer" type="hidden" id="timergame"  value="0" />
    <input type="submit" name="submit" id="submit" value="Вихід" /></p>
		<ul id="response" />
	</div><!--end main -->
	
</div><!-- end form container -->
</form>
</div></div><!-- end pagebg and main -->

<div id="app"></div>

<style>

body {
  font-family: sans-serif;
  display: grid;
  place-items: center;
}

.base-timer {
  margin-left: 1150px;
    position: relative;
    width: 300px;
    height: 300px;
}

.base-timer__svg {
  transform: scaleX(-1);
}

.base-timer__circle {
  fill: none;
  stroke: none;
}

.base-timer__path-elapsed {
  stroke-width: 7px;
  stroke: grey;
}

.base-timer__path-remaining {
  stroke-width: 7px;
  stroke-linecap: round;
  transform: rotate(90deg);
  transform-origin: center;
  transition: 1s linear all;
  fill-rule: nonzero;
  stroke: currentColor;
}

.base-timer__path-remaining.green {
  color: rgb(65, 184, 131);
}

.base-timer__path-remaining.orange {
  color: orange;
}

.base-timer__path-remaining.red {
  color: red;
}

.base-timer__label {
  position: absolute;
  width: 300px;
  height: 300px;
  top: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 48px;
  text-align: center;
}

</style>

<script>

const FULL_DASH_ARRAY = 283;
const WARNING_THRESHOLD = 10;
const ALERT_THRESHOLD = 5;

const COLOR_CODES = {
  info: {
    color: "green"
  },
  warning: {
    color: "orange",
    threshold: WARNING_THRESHOLD
  },
  alert: {
    color: "red",
    threshold: ALERT_THRESHOLD
  }
};

const TIME_LIMIT = 300;
let timePassed = 0;
let timeLeft = TIME_LIMIT;
let timerInterval = null;
let remainingPathColor = COLOR_CODES.info.color;

document.getElementById("app").innerHTML = `
<div class="base-timer">
  <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
    <g class="base-timer__circle">
      <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
      <path
        id="base-timer-path-remaining"
        stroke-dasharray="283"
        class="base-timer__path-remaining ${remainingPathColor}"
        d="
          M 50, 50
          m -45, 0
          a 45,45 0 1,0 90,0
          a 45,45 0 1,0 -90,0
        "
      ></path>
    </g>
  </svg>
  <span id="base-timer-label" class="base-timer__label">${formatTime(
    timeLeft
  )}</span>
</div>
`;

startTimer();

function onTimesUp() {
  clearInterval(timerInterval);
 alert('Нажаль час гри закінчився, вас буде повернено на головну сторінку!');
 location.href='lose.php';
}

function startTimer() {
  timerInterval = setInterval(() => {
    timePassed = timePassed += 1;
    timeLeft = TIME_LIMIT - timePassed;
    document.getElementById("base-timer-label").innerHTML = formatTime(
      timeLeft
    );
    setCircleDasharray();
    setRemainingPathColor(timeLeft);

    if (timeLeft === 0) {
      onTimesUp();
    }
  }, 1000);
}

function formatTime(time) {
  const minutes = Math.floor(time / 60);
  let seconds = time % 60;

  if (seconds < 10) {
    seconds = `0${seconds}`;
  }
  return `${minutes}:${seconds}`;
} 

function setRemainingPathColor(timeLeft) {
  const { alert, warning, info } = COLOR_CODES;
  if (timeLeft <= alert.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(warning.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(alert.color);
  } else if (timeLeft <= warning.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(info.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(warning.color);
  }
}

function calculateTimeFraction() {
  const rawTimeFraction = timeLeft / TIME_LIMIT;
  return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
}

function setCircleDasharray() {
  const circleDasharray = `${(
    calculateTimeFraction() * FULL_DASH_ARRAY
  ).toFixed(0)} 283`;
  document
    .getElementById("base-timer-path-remaining")
    .setAttribute("stroke-dasharray", circleDasharray);
}

</script>
 <?php
                }
            ?>
</body>
</html>