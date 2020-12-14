<?php
include_once 'Database.php';
class QuizModel { //a changer, pas d'extends

    public function getAllQuizs(string $filter){
        $mysqli = Database::getInstance();
        if(empty($filter))
            $sql = 'SELECT * FROM quiz';
        else{
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
        return $allQuiz;
    }

    public function getQuiz(string $id){
        $mysqli = Database::getInstance();
        $sql = "SELECT * FROM quiz WHERE id_quiz=?";
        //==========================================
        $stmt = $mysqli->stmt_init();
        if(!$stmt->prepare($sql)){
            error_log("Fail during preparation of statement\n");
            exit(); //TODO better to throw a error
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $results = $stmt->get_result();
        if(!$results){
            error_log("Error in query : " . $sql. "\n");
            exit(); //TODO better to throw a error
        }
        $row = $results->fetch_assoc();
        $results->free();
        return $row;
    }

    public function getAllQuestions(int $quizId){ //Retourne tous les questions d'un quiz
        $stmt = Database::getInstance();
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
        return $allQuestions;
    }

    public function getNbQuestion(int $quizId){ //Retourne le nombre de questions d'un quiz
        return count($allQuestions = $this->getAllQuestions($quizId));
    }

    public function getAllAnswerQuest(int $questionId){
        $mysqli = Database::getInstance();
        $sql = "SELECT goodAnswer, badAnswer, badAnswer2, badAnswer3 FROM question WHERE id_question=?";
        $stmt = $mysqli->stmt_init();
        if(!$stmt->prepare($sql)){
            error_log("Fail during preparation of statement\n");
            exit(); //TODO better to throw a error
        }
        $stmt->bind_param("i", $questionId);
        $stmt->execute();
        $results = $stmt->get_result();
        if(!$results){
            error_log("Error in query : " . $sql. "\n");
            exit(); //TODO better to throw a error
        }
        $row = $results->fetch_assoc();
        $results->free();
        return $row;
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