INSERT INTO quiz(name, description) VALUE("Harry Potter", "Blabla");

--question 1--
INSERT INTO question(id_quiz, level, question, themes) VALUE(1,1,"Quel poste tient Harry Potter dans son équipe de quidditch ?", "Harry Potter");

--question 2--

INSERT INTO question(id_quiz, level, question, themes) VALUE (1,1,"Dans quelle école de sorcellerie Harry Potter a-t-il suivi ses enseignements ?","Harry Potter");

--question 3--

INSERT INTO question(id_quiz, level, question, themes) VALUE (1,1,"À quelle adresse habite la famille Dursley dans la saga « Harry Potter » ?","Harry Potter");

-- Reponse question 1--
INSERT INTO answer_question(id_question, answer, correct, point) VALUE (1,"Attrapeur",true, 1);
INSERT INTO answer_question(id_question, answer, correct, point) VALUE (1,"Batteur",false, 0 );
INSERT INTO answer_question(id_question, answer, correct, point) VALUE (1, "Poursuiveur", false, 0);
INSERT INTO answer_question(id_question, answer, correct, point) VALUE (1,"Lanceur",false,0 );

--Reponse question 2--
INSERT INTO answer_question(id_question, answer, correct, point) VALUE (2,"Poudlard",true, 1);
INSERT INTO answer_question(id_question, answer, correct, point) VALUE (2,"Oxford",false, 0 );
INSERT INTO answer_question(id_question, answer, correct, point) VALUE (2, "Cambridge", false, 0);
INSERT INTO answer_question(id_question, answer, correct, point) VALUE (2,"West Point",false,0 );

--Reponse question 3--
INSERT INTO answer_question(id_question, answer, correct, point) VALUE (3,"4 Privet Road",false, 0 );
INSERT INTO answer_question(id_question, answer, correct, point) VALUE (3, "4 Privet Avenue", false, 0);
INSERT INTO answer_question(id_question, answer, correct, point) VALUE (3,"4 Privet Square",false,0 );
INSERT INTO answer_question(id_question, answer, correct, point) VALUE (3,"4 Privet Drive",true, 1);