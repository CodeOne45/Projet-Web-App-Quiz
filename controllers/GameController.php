<?php
include_once '../models/QuizModel.php';
include_once 'LobbyController.php';

class GameController{
    private int $id_lobby;
    private int $id_quiz;
    private $quiz;
    private $questions;
    private $nbQuest;
    private int $currentQ = 0; //current question
    private $players = array();

    function __construct(int $id_lob) {
        if ($id_lob != NULL){
            $this->id_lobby = $id_lob;
            $lobby = (new LobbyController())->get_lobby($id_lob);
            $this->id_quiz = $lobby['id_quiz'];
        }
        else{
            error_log("Fail idQuiz && idGame\n");
            exit();
        }
        $this->quiz = (new QuizModel())->getQuiz($this->id_quiz);
        $this->questions = (new QuizModel())->getAllQuestions($this->id_quiz);
        $this->nbQuest = (new QuizModel)->getNbQuestion($this->id_quiz);
    }

    function getQuiz(){
        return $this->quiz;
    }

    function getQuestions(){
        return $this->questions;
    }

    function loadGame(){
        if($this->currentQ == $this->nbQuest){
            session_start();
            $_SESSION['gameSession'] = $this;
            $idPlayer = (new LobbyController())->get_idPlayer($this->id_lobby, $_SESSION['userId']);
            (new LobbyController())->update_Player($idPlayer['id_player'], $this->getPlayerScore($_SESSION["userId"]));
            header('location: score');
        }
        elseif(count($this->quiz) != 0 && count($this->questions) !== 0){ //check if quiz is valid and had questions
            session_start();
            $_SESSION['gameSession'] = $this;
            header('location: game?id_lobby='.$this->id_lobby);
        }
        else
            echo "error from loadGame"; //TODO a changer 
    }

    function endGameSession(){
        session_start();
        $_SESSION['gameSession'] = NULL;
    }

    function getCurrentQNb(){
        return $this->currentQ;
    }

    function getProgress(){ 
        $progress = $this->currentQ / $this->nbQuest * 100;
        return number_format($progress, 2);
    }

    function getQAnswers(int $id_question){
        return $answers = (new QuizModel)->getAllAnswerQuest($id_question);
    }

    function getLobbyId(){
        return $this->id_lobby;
    }

    function addPlayer($id, int $score){
        $this->players[$id] = $score;
    }

    function addPlayerAnswer(string $id, string $answer){
        $currentIdQuestion = $this->questions[$this->currentQ]["id_question"];
        $allAnswer = $this->getQAnswers($currentIdQuestion);
        if($answer === $allAnswer["goodAnswer"])
            $this->players[$id]++;
        $this->currentQ++;
    }

    function getPlayerScore(int $idPlayer){
        return $this->players[$idPlayer];
    }

    function getTotalNbQ(){
        return $this->nbQuest;
    }
}