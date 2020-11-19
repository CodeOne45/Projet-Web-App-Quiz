INSERT INTO quiz
    (name, description)
VALUE("Harry Potter",
"Blabla"
);

--questions 1--
INSERT INTO questions
    (id_quiz, level, question, themes)
VALUE(1,1,"Quel poste tient Harry Potter dans son équipe de quidditch ?",
"Harry Potter"
);

--questions 2--

INSERT INTO questions
    (id_quiz, level, question, themes)
VALUE
(1,1,"Dans quelle école de sorcellerie Harry Potter a-t-il suivi ses enseignements ?","Harry Potter"
);

--questions 3--

INSERT INTO questions
    (id_quiz, level, question, themes)
VALUE
(1,1,"À quelle adresse habite la famille Dursley dans la saga « Harry Potter » ?","Harry Potter"
);

-- Reponse questions 1--
INSERT INTO answer_question
    (id_question, answer, correct, point)
VALUE
(1,"Attrapeur",true,
1
);
INSERT INTO answer_question
    (id_question, answer, correct, point)
VALUE
(1,"Batteur",false,
0
);
INSERT INTO answer_question
    (id_question, answer, correct, point)
VALUE
(1,
"Poursuiveur",
false,
0
);
INSERT INTO answer_question
    (id_question, answer, correct, point)
VALUE
(1,"Lanceur",false,0
);

--Reponse questions 2--
INSERT INTO answer_question
    (id_question, answer, correct, point)
VALUE
(2,"Poudlard",true,
1
);
INSERT INTO answer_questions
    (id_questions, answer, correct, point)
VALUE
(2,"Oxford",false,
0
);
INSERT INTO answer_question
    (id_question, answer, correct, point)
VALUE
(2,
"Cambridge",
false,
0
);
INSERT INTO answer_question
    (id_question, answer, correct, point)
VALUE
(2,"West Point",false,0
);

--Reponse questions 3--
INSERT INTO answer_question
    (id_question, answer, correct, point)
VALUE
(3,"4 Privet Road",false,
0
);
INSERT INTO answer_question
    (id_question, answer, correct, point)
VALUE
(3,
"4 Privet Avenue",
false,
0
);
INSERT INTO answer_question
    (id_question, answer, correct, point)
VALUE
(3,"4 Privet Square",false,0
);
INSERT INTO answer_question
    (id_question, answer, correct, point)
VALUE
(3,"4 Privet Drive",true,
1
);