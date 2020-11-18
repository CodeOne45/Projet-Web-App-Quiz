<?php
include_once 'header.php';
?>


<body><center>
    

<h2>Game</h2>
<div id="search_bar"> <!-- TODO : Relier à la db -->
     <form action="quiz.php" method="get">
        <input type="text" name="search" placeholder="Search Quiz...">
        <button type="submit">Search</button> 
    </form>
    <br>
</div>

<div>
<article class="game_box">
    <img src="th.jpg" alt="Photo de harry potter">
    <div class="quiz_question">
       <p>Bla bla bla ?</p>
    </div>
</article>
</div>


<div class ="answer_box">
<table>
    <tr>
        <th><a href="game.php">Reponse 1</a></th>
        <th><a href="game.php">Reponse 2</a></th>
    </tr>
    <tr>
        <th><a href="game.php">Reponse 3</a></th>
        <th><a href="game.php">Reponse 4</a></th>
    </tr>
</table>
<br>
    <button type="button" onclick="location.href='quiz.php'">Quitter le jeu</button>
</div>

<div id= "Question"class = "numerodelaquestion" >
    2/4
</div>

   
</center></body>
    <div classe ="identifiant" style="width: 100px;  padding-top:10px; padding-bottom:10px;border: 3px solid Black; text-align: center;background: white;"> <right>
        <table>
            <tr>
                <th>Player 1</th>
            </tr>
            <tr>
                <th>Player 2</th>
            </tr>
                <th>Player 3</th>
            </tr>
        </table>
    </right></div>

<script language="JavaScript">
<!--
var startTime = 0
var start = 0
var end = 0
var diff = 0
var timerID = 0
function chrono(){
	end = new Date()
	diff = end - start
	diff = new Date(diff)
	var sec = diff.getSeconds()
	var min = diff.getMinutes()
	if (min < 10){
		min = "0" + min
	}
	if (sec < 10){
		sec = "0" + sec
	}

	document.getElementById("chronotime").innerHTML =min + ":" + sec;
	timerID = setTimeout("chrono()", 10)
}
function chronoStart(){
	document.chronoForm.startstop.value = "stop!"
	document.chronoForm.startstop.onclick = chronoStop
	document.chronoForm.reset.onclick = chronoReset
	start = new Date()
	chrono()
}
function chronoContinue(){
	document.chronoForm.startstop.value = "stop!"
	document.chronoForm.startstop.onclick = chronoStop
	document.chronoForm.reset.onclick = chronoReset
	start = new Date()-diff
	start = new Date(start)
	chrono()
}
function chronoReset(){
	document.getElementById("chronotime").innerHTML = "00:00"
	start = new Date()
}
function chronoStopReset(){
	document.getElementById("chronotime").innerHTML = "00:00"
	document.chronoForm.startstop.onclick = chronoStart
}
function chronoStop(){
	document.chronoForm.startstop.value = "start!"
	document.chronoForm.startstop.onclick = chronoContinue
	document.chronoForm.reset.onclick = chronoStopReset
	clearTimeout(timerID)
}
//-->
</script>
<span id="chronotime">00:00</span>
<form name="chronoForm">
    <input type="button" name="startstop" value="start!" onClick="chronoStart()" />
    <input type="button" name="reset" value="reset!" onClick="chronoReset()" />
</form>






<?php
include_once 'footer.php';
?>