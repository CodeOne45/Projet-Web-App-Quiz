<?php
include_once '../views/header.php';
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

<div id= "Question"class = "numerodelaquestion" style="padding-left : 85%; " >
    2/4
</div> 

<div>
<article class="game_box">
    <img src="../views/Images/HarryPotter.jpg" alt="Photo de harry potter">
    <div class="quiz_question">
       <p>Bla bla bla ?</p>
    </div>
</article>
</div>



<div class ="answer_box">
<table>
    <tr>
        <th><a href="game">Reponse 1</a></th>
        <th><a href="game">Reponse 2</a></th>
    </tr>
    <tr>
        <th><a href="game">Reponse 3</a></th>
        <th><a href="game">Reponse 4</a></th>
    </tr>
</table>
<br>
    <button type="button" onclick="location.href='quiz'">Quitter le jeu</button>
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

var startTime = 0
var start = 0
var end = 0
var diff = 0
var timerID = 0
window.onload = chronoStart;
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

	document.getElementById("chronotime").value = min + ":" + sec
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
	document.getElementById("chronotime").value = "00:00"
	start = new Date()
}
function chronoStopReset(){
	document.getElementById("chronotime").value = "00:00"
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
<form name="chronoForm" style = "padding-left : 80% ; margin-top: 10%;" >
  <input type="text" name="chronotime" id="chronotime" value="00:00"/>
    <input type="button" name="startstop" value="start!" onClick="chronoStart()" style="visibility: hidden;"/>
    <input type="button" name="reset" value="reset!" onClick="chronoReset()" style="visibility: hidden;" />
</form>






<?php
include_once '../views/footer.php';
?>