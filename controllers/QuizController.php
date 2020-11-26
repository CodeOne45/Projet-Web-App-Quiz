<?php
include_once '../models/QuizModel.php';

class QuizController{
    private QuizModel $quizModel;
    private string $filter;

    function __construct(?string $search = null) { // search is a string and is nullable
        $this->quizModel = new QuizModel();
        $this->filter = ($search != null) ? $search : "";

    }

    function getAllQuizs(){
        return $this->quizModel->getAllQuizs($this->filter);
    }
}