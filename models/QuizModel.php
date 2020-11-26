<?php
include_once '../usersClass/data.class.php';

class QuizModel extends Data { //a changer, pas d'extends

    public function getAllQuizs(string $filter){
        $mysqli = $this->connect(); //changer par $stmt = new data()->getData();
        if(empty($filter))
            $sql = 'SELECT * FROM quiz';
        else{
//            $sql = "SELECT * FROM quiz WHERE name='$filter'";
            $sql = "SELECT * FROM quiz WHERE name=?";
        }
        //==========================================
        $stmt = $mysqli->stmt_init();
        if(!$stmt->prepare($sql)){
            error_log("Fail during preparation of statement\n");
            exit(); //TODO better to throw a error
        }
        if(!(empty($filter)))
            $stmt->bind_param("s", $filter);
        $stmt->execute();
        $results = $stmt->get_result();
        if(!$results){
            error_log("Error in query : " . $sql. "\n");
            exit(); //TODO better to throw a error
        }
        //==========================================
//        $results = $mysqli->query($sql);
//        if(!$results){
//            error_log("Error in query : " . $sql);
//            exit(); //TODO better to throw a error
//        }
        //==========================================

        $allQuiz = [];
        $compteur = 0;
        while($row = $results->fetch_assoc()){
            $allQuiz[] = $row;
            $allQuiz[$compteur]['nbQuestion'] = $this->getNbQuestion($row['id_quiz']);
            $allQuiz[$compteur]['themes'] = $this->getAllThemes($row['id_quiz']);
            $allQuiz[$compteur]['level'] = $this->getLevel($row['id_quiz']);
            $compteur += 1;
        }
        $results->free();
        $mysqli->close();
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

    public function getAllThemes(int $quizId) : string{
        $allQuestions = $this->getAllQuestions($quizId);
        if(count($allQuestions) == 0)
            return "None";
        $themeList = [];
        foreach ($allQuestions as $question){
            $tmp = explode(";", $question['themes']);
            foreach ($tmp as $theme){
                if (!(in_array($theme, $themeList))){ //check if theme is not already in the themeList
                    $themeList[] = $theme;
                }
            }
        }
        return implode("; ", $themeList);
    }

    public function getLevel(int $quizId){
        $allQuestions = $this->getAllQuestions($quizId);
        if(count($allQuestions) == 0)
            return "Unknow";
        $somme = 0;
        foreach ($allQuestions as $question){
            $somme += (int) $question['level'];
        }
        return round($somme/count($allQuestions), 2);
    }
}