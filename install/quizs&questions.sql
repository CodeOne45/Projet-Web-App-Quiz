#--Création de Quiz--
INSERT INTO quiz (name, description) VALUE('Harry Potter','Blabla'); #1
INSERT INTO quiz (name, description) VALUE('Dessin Animée','Blibli'); #2
INSERT INTO quiz (name, description) VALUE('Séries américaines','Bloblo'); #3

#--Harry Poter : questions 1--
INSERT INTO question (id_quiz, level, text, themes, prop1, prop2, prop3, prop4, answer)
VALUE (1,1,'Quel poste tient Harry Potter dans son équipe de quidditch ?',
       'Harry Potter','Attrapeur','Batteur','Poursuiveur','Lanceur','1');
#--Harry Poter : questions 2--
INSERT INTO question (id_quiz, level, text, themes, prop1, prop2, prop3, prop4, answer)
VALUE (1,1,'Dans quelle école de sorcellerie Harry Potter a-t-il suivi ses enseignements ?',
       'Harry Potter','Poudlard','Oxford','Cambridge','West Point','1');
#--Harry Poter : questions 3--
INSERT INTO question (id_quiz, level, text, themes, prop1, prop2, prop3, prop4, answer)
VALUE (1,1,'À quelle adresse habite la famille Dursley dans la saga « Harry Potter » ?',
       'Harry Potter', '4 Privet Road','4 Privet Avenue','4 Privet Square',' 4 Privet Drive','1');

#--Dessin Animée : questions 1--
INSERT INTO question (id_quiz, level, text, themes, prop1, prop2, prop3, prop4, answer)
    VALUE (2,2,'Avec lequel des garçons de sa bande fait habituellement équipe Scoubidou ?',
           'Dessin Animée','Sammy', 'Samuel', 'Sam', 'Patrick','1');
#--Dessin Animée : questions 2--
INSERT INTO question (id_quiz, level, text, themes, prop1, prop2, prop3, prop4, answer)
    VALUE (2,2,'Quel est le prénom de Mr. Krabs dans Bob l\'éponge ?',
           'Dessin Animée','Eugène','Sheldon','Sandy','Pearl','1');
#--Dessin Animée : questions 3--
INSERT INTO question (id_quiz, level, text, themes, prop1, prop2, prop3, prop4, answer)
    VALUE (2,1,'Qui est le créateur de la série « Les Simpson » ?',
           'Dessin Animée','Matt Groening','Homer Simpson','Dan Castellaneta','Donald Trump','1');

#--Séries américaines : questions 1--
INSERT INTO question (id_quiz, level, text, themes, prop1, prop2, prop3, prop4, answer)
    VALUE (3,1,'Quelle est la couleur du maillot des sauveteurs de la série « Alerte à Malibu » ?',
           'Série','Rouge','Verte','Bleue','Jaune','1');
#--Séries américaines : questions 2--
INSERT INTO question (id_quiz, level, text, themes, prop1, prop2, prop3, prop4, answer)
    VALUE (3,3,'Dans quelle série télévisée Wentworth Miller incarne-t-il le personnage principal ?',
           'Série','Prison Break','Brooklin 99','Breaking Bad','Lost','1');
#--Séries américaines : questions 3--
INSERT INTO question (id_quiz, level, text, themes, prop1, prop2, prop3, prop4, answer)
    VALUE (3,2,'Combien de saisons compte la série télévisée « Community » créée par Dan Harmon',
           'Série','6','7','8','5','1');