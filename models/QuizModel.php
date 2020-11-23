<?php
include_once '../usersClass/data.class.php';

class QuizModel extends Data { //a changer, pas d'extends

    public function getAllQuizs(string $filter){
        $stmt = $this->connect(); //changer par $stmt = new data()->getData();
        $sql = "SELECT * FROM quiz"; //TODO sécuriter l'insertion par bind (optionnel)
        $results = $stmt->query($sql);
        if(!$results){
            error_log("Error in query : " . $sql);
        }

        $allQuiz = [];
        $compteur = 0;
        while($row = $results->fetch_assoc()){
            $allQuiz[] = $row;
            $allQuiz[$compteur]['nbQuestion'] = $this->getNbQuestion($row['id_quiz']);
            $allQuiz[$compteur]['themes'] = $this->getNbQuestion($row['themes']);
            $compteur += 1;
        }
        $results->free();
        $stmt->close();
        return $allQuiz;
    }

    public function getAllQuestions(int $quizId){ //Retourne tous les questions d'un quiz
        $stmt = $this->connect();   //TODO redondance
        $sql = "SELECT * FROM question WHERE id_quiz = $quizId";
        $results = $stmt->query($sql);
        if(!$results){
            error_log("Error in query : " . $sql);
        }

        $allQuestions = [];
        while($row = $results->fetch_assoc()){
            $allQuestions[] = $row;
        }
        $results->free();
        $stmt->close();
        return $allQuestions;
    }

    public function getNbQuestion(int $quizId){ //Retourne le nombre de questions d'un quiz
        return count($allQuestions = $this->getAllQuestions($quizId));
    }

    public function getAllThemes(int $quizId){
        $allQuestions = $this->getAllQuestions($quizId);
        $themes = [];
        foreach ($allQuestions as $question){
            $tmp[] = explode(";", $question['themes']);
            foreach ($tmp as $theme){
                if (in_array($theme, $themes)){

                }
            }
        }
        return $themes;
    }
}