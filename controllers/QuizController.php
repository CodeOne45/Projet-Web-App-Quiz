<?php
include_once '../models/QuizModel.php';

/**
 * Class QuizController
 */
class QuizController{
    private QuizModel $quizModel;
    private string $filter;

    /**
     * QuizController constructor.
     * @param string|null $search
     */
    function __construct(?string $search = null) { // search is a string and is nullable
        $this->quizModel = new QuizModel();
        $this->filter = ($search != null) ? $search : "";
    }

    /**
     * @return array
     */
    function getAllQuizs(){
        return $this->quizModel->getAllQuizs($this->filter);
    }
}