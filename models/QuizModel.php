<?php
include_once 'Database.php';

/**
 * Class QuizModel : Use the Database class to manage the Quiz page
 */
class QuizModel {
    /**
     * @param string $filter for show only quiz which match with the , if empty, show all quiz
     * @return array return all quiz and his informations in an associative array from the database
     */
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
            exit();
        }
        if(!(empty($filter)))
            $stmt->bind_param("s", $filter);
        $stmt->execute();
        $results = $stmt->get_result();
        if(!$results){
            error_log("Error in query : " . $sql. "\n");
            exit();
        }

        $allQuiz = [];
        $compteur = 0;
        while($row = $results->fetch_assoc()){
            $allQuiz[] = $row;
            $allQuiz[$compteur]['nbQuestion'] = $this->getNbQuestion($row['id_quiz']);  //add additional info
            $allQuiz[$compteur]['themes'] = $this->getAllThemes($row['id_quiz']);       //add additional info
            $allQuiz[$compteur]['level'] = $this->getLevel($row['id_quiz']);            //add additional info
            $compteur += 1;
        }
        $results->free();
        return $allQuiz;
    }

    /**
     * @param string $id quiz id
     * @return array|null return in an associative array all information about a quiz from the database
     */
    public function getQuiz(string $id){
        $mysqli = Database::getInstance();
        $sql = "SELECT * FROM quiz WHERE id_quiz=?";
        //==========================================
        $stmt = $mysqli->stmt_init();
        if(!$stmt->prepare($sql)){
            error_log("Fail during preparation of statement\n");
            exit();
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $results = $stmt->get_result();
        if(!$results){
            error_log("Error in query : " . $sql. "\n");
            exit();
        }
        $row = $results->fetch_assoc();
        $results->free();
        return $row;
    }

    /**
     * @param int $quizId
     * @return array Returns all the questions of a quiz in an associative array
     */
    public function getAllQuestions(int $quizId){
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

    /**
     * @param int $quizId
     * @return int Returns the number of questions in a quiz
     */
    public function getNbQuestion(int $quizId){
        return count($allQuestions = $this->getAllQuestions($quizId));
    }

    /**
     * @param int $questionId
     * @return array|null Returns all the answers of a question in an associative array
     */
    public function getAllAnswerQuest(int $questionId){
        $mysqli = Database::getInstance();
        $sql = "SELECT goodAnswer, badAnswer, badAnswer2, badAnswer3 FROM question WHERE id_question=?";
        $stmt = $mysqli->stmt_init();
        if(!$stmt->prepare($sql)){
            error_log("Fail during preparation of statement\n");
            exit();
        }
        $stmt->bind_param("i", $questionId);
        $stmt->execute();
        $results = $stmt->get_result();
        if(!$results){
            error_log("Error in query : " . $sql. "\n");
            exit();
        }
        $row = $results->fetch_assoc();
        $results->free();
        return $row;
    }

    /**
     * @param int $quizId
     * @return string return in a string all themes of a quiz
     */
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

    /**
     * @param int $quizId
     * @return float|string return in a string the level of a quiz
     */
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