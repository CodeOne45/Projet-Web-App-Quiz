<?php

class SQLiteCreateTable {

/**
 * PDO object
 * @var \PDO
 */
private $pdo;

/**
 * connect to the SQLite database
 */
public function __construct($pdo) {
    $this->pdo = $pdo;
}

/**
 * create tables 
 */
public function createTables() {
    $commands = [
        
        'CREATE TABLE IF NOT EXISTS participants (
                    id_participant   INTEGER PRIMARY KEY,
                    nom_participant VARCHAR(30) NOT NULL,
                    prenom_participant VARCHAR(15) NOT NULL,
                    login_participant VARCHAR(30) NOT NULL,
                    password_participant VARCHAR(15) NOT NULL,
                    score_partcicipant INTEGER,
                    ''temps_debut DATATIME,
                    ''temps_fin DATATIME

                  )',
        'CREATE TABLE IF NOT EXISTS quiz (
                id_quiz INTEGER PRIMARY KEY,
                nom_quiz  VARCHAR (30) NOT NULL,
                description_quiz TEXT)',
                'FOREIGN KEY (project_id)
                REFERENCES projects(project_id) ON UPDATE CASCADE
                                                ON DELETE CASCADE)'
        'CREATE TABLE IF NOT EXISTS questions (
            id_question INTEGER PRIMARY KEY,
            id_quiz INTEGER,
            FOREIGN KEY (id_quiz)
                REFERENCES quiz(id_quiz) ON UPDATE CASCADE ON DELETE CASCADE,
            question TEXT,)',

        'CREATE TABLE IF NOT EXISTS reponses_questions (
            id_reponse_question INTEGER PRIMARY KEY,
            id_question, INTEGER NOT NULL,
            FOREIGN KEY (id_question) REFERENCES questions(id_question) ON UPDATE CASCADE ON DELETE CASCADE,
            reponse_question VARCHAR(25) NOT NULL,
            reponsecorrecte_question INTEGER NOT NULL,
            )',
        
        'CREATE TABLE IF NOT EXISTS reponses_participants (
            id_reponse_participant  INTEGER PRIMARY KEY,
            id_quiz INTEGER NOT NULL,
            FOREIGN KEY (id_quiz) REFERENCES quiz(id_qui) ON UPDATE CASCADE ON DELETE CASCADE,
            id_question INTEGER NOT NULL,
            FOREIGN KEY (id_question) REFERENCES questions(id_question) ON UPDATE CASCADE ON DELETE CASCADE,
            id_participant INTEGER NOT NULL,
            FOREIGN KEY(id_participant) REFERENCES participants(id_participant) ON UPDATE CASCADE ON DELETE CASCADE,
            id_reponse_question INTEGER NOT NULL,
            FOREIGN KEY(id_reponse_question) REFERENCES reponses_questions(id_reponse_question) ON UPDATE CASCADE ON DELETE CASCADE,
            ''question_temps_debut DATATIME,
            ''question_temps_fin DATATIME,
            )',
            
                                ];
    // execute the sql commands to create new tables
    foreach ($commands as $command) {
        $this->pdo->exec($command);
    }
}

/**
 * get the table list in the database
 */
public function getTableList() {

    $stmt = $this->pdo->query("SELECT name
                               FROM sqlite_master
                               WHERE type = 'table'
                               ORDER BY name");
    $tables = [];
    while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
        $tables[] = $row['name'];
    }

    return $tables;
}
}

