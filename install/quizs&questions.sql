#--Création de Quiz--
INSERT INTO quiz (name, description) VALUE('Harry Potter','Blabla'); #1
INSERT INTO quiz (name, description) VALUE('Dessin Animée','Blibli'); #2
INSERT INTO quiz (name, description) VALUE('Séries Américaines','Bloblo'); #3
INSERT INTO quiz (name, description) VALUE('Héros Marvel','Bleble'); #4
INSERT INTO quiz (name, description) VALUE('Héros de Star Wars','Blublu'); #5

#--Harry Potter--

#--Level 1--


#--Harry Potter : questions 1--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3, imageURL)
VALUE (1,1,'Quel poste tient Harry Potter dans son équipe de quidditch ?',
       'Harry Potter','Attrapeur','Batteur','Poursuiveur','Lanceur','Harry_potter1');
#--Harry Potter : questions 2--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (1,1,'Dans quelle école de sorcellerie Harry Potter a-t-il suivi ses enseignements ?',
       'Harry Potter','Poudlard','Oxford','Cambridge','West Point','Harry_potter1');
#--Harry Potter : questions 3--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (1,1,'À quelle adresse habite la famille Dursley dans la saga « Harry Potter » ?',
       'Harry Potter', '4 Privet Road','4 Privet Avenue','4 Privet Square',' 4 Privet Drive','Harry_potter1');
#--Harry Potter : questions 4--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (1,1,'Qui a succédé à Armando Dippet comme directeur de Poudlard dans « Harry Potter » ?',
       'Harry Potter', 'Albus Dumbledore', 'Ron Weasley', 'Severus Rogue', 'Lord Voldemort','Harry_potter1');

#--Level 2--

#--Harry Potter : questions 5--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (1,2,'Comment se prénomment les parents du jeune Harry Potter ?',
       'Harry Potter', 'James et Lily', 'Olivia et Tom', 'Hermione et Ron', 'Laurena et Victor','Harry_potter2');
#--Harry Potter : questions 6--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (1,2,'Quelle est la marque du balai de course utilisé par Harry Potter ?',
       'Harry Potter', 'Nimbus 2000', 'Brossdur 5', 'Comète 260', 'Étoile Filante','Harry_potter2');
#--Harry Potter : questions 7--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (1,2,'Quel est le nom du dragon appartenant à Hagrid dans la saga « Harry Potter » ?',
       'Harry Potter', 'Norbert', 'Errol', 'Crockdur', 'Aragog','Harry_potter2');

#--Level 3--

#--Harry Potter : questions 8--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (1,3,'Quelle est la formule du sortilège de mort dans la saga « Harry Potter » ?',
       'Harry Potter', 'Avada Kedavra ', 'Mortibus Rem', 'Machina Fino', 'Post Mortem ','Harry_potter3');
#--Harry Potter : questions 9--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (1,3,'Quels prénoms portent les jumeaux Weasley dans « Harry Potter » ?',
       'Harry Potter', 'Fred et George', 'Bill et George', 'Charlie et Bill', 'Lou et Cédric','Harry_potter3');
#--Harry Potter : questions 10--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (1,3,'Dans la saga « Harry Potter », qui est le prince de sang mêlé ?',
       'Harry Potter', 'Severus Rogue', 'Dumbledore', 'Voldemort', 'Drago Malefoy','Harry_potter3');

#--Dessin Animée--

#--Level 1--

#--Dessin Animée : questions 1--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
    VALUE (2,1,'Qui est le héros principal du « Livre de la jungle » de Rudyard Kipling ?',
           'Dessin Animée','Mowgli', 'Teddy', 'Buldeo', 'Machua','Dessin_Animee1');
#--Dessin Animée : questions 2--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
    VALUE (2,1,"Quel est le prénom de Mr. Krabs dans Bob l'éponge ?",
              'Dessin Animée','Eugène','Sheldon','Sandy','Pearl','Dessin_Animee1');
#--Dessin Animée : questions 3--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
    VALUE (2,1,'Quel marin imaginaire tire sa force des épinards en boîte ?',
           'Dessin Animée','Popeye', 'Grimmy', 'Sappo', 'Barnaby','Dessin_Animee1');
#--Dessin Animée : questions 4--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
    VALUE (2,1,'Avec lequel des garçons de sa bande fait habituellement équipe Scoubidou ?',
           'Dessin Animée','Sammy', 'Samuel', 'Sam', 'Patrick','Dessin_Animee1');

#--Level 2--

#--Dessin Animée : questions 5--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
    VALUE (2,2,'Quel célèbre détective se cache souvent sous une apparence malhabile ?',
           'Dessin Animée','Columbo', 'Bayard', 'Japp', 'Duflair','Dessin_Animee2');
#--Dessin Animée : questions 2--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
    VALUE (2,2,'Qui est le créateur de la série « Les Simpson » ?',
           'Dessin Animée','Matt Groening','Homer Simpson','Dan Castellaneta','Donald Trump','Dessin_Animee2');
#--Dessin Animée : questions 7--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
    VALUE (2,2,"Quel commissaire de fiction, héros de romans policiers, fume souvent la pipe ?",
           'Dessin Animée','Maigret', 'Hercule Poirot', 'Simon Templar', 'Sam Spade','Dessin_Animee2');

#--Level 3--

#--Dessin Animée : questions 8--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
    VALUE (2,3,'Quel super-héros parcourt le ciel new-yorkais à la poursuite des malfaiteurs ?',
           'Dessin Animée','Superman', 'Flash', 'Batman', 'Cyborg','Dessin_Animee3');
#--Dessin Animée : questions 9--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
    VALUE (2,3,"Que chien de fiction est apparu aux côtés d\'Hercule, son ennemi intime ?",
            'Dessin Animée','Pif', 'Idéfix', 'Scooby-Doo', 'Bolivar','Dessin_Animee3');
#--Dessin Animée : questions 10--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
    VALUE (2,3,"Qui a masqué à sa femme les cadavres de ses huit précédentes épouses ?",
            'Dessin Animée','Barbe-Bleue', 'Tom Pouce', 'Raiponce', 'Perceval','Dessin_Animee3');

#--Séries américaines--

#--Level 1--

#--Séries américaines : questions 1--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
    VALUE (3,1,'Quelle est la couleur du maillot des sauveteurs de la série « Alerte à Malibu » ?',
           'Série','Rouge','Verte','Bleue','Jaune','Series_americaines1');
#--Séries américaines : questions 2--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
    VALUE (3,1,'Qui est le plus costaud des héros télévisés de la célèbre « Agence tous risques »',
           'Série','Barracuda', 'Hannibal', 'Futé', 'Looping','Series_americaines1');
#--Séries américaines : questions 3--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
    VALUE (3,1,'Qui détient le rôle principal dans la série télévisée américaine « Dr House » ?',
           'Série','Hugh Laurie', 'Thomas Sarbacher', 'Matthew Fox', 'Kiefer Sutherland','Series_americaines1');
#--Séries américaines : questions 4--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
    VALUE (3,1,'Dans quelle série télévisée Wentworth Miller incarne-t-il Michael Scofield ?',
           'Série','« Prison Break »', '« Dr House »', '« Lost »', '« Friends »','Series_americaines1');

#--Level 2--

#--Séries américaines : questions 5--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
    VALUE (3,2,'Quel est le nom de la célèbre voiture que David Hasselhoff pilotait dans « K2000 » ?',
           'Série','Kitt', 'Kate', 'Kytie', 'Katy','Series_americaines2');
#--Séries américaines : questions 6--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
    VALUE (3,2,'Qui joua le rôle de Donna Martin dans la série télévisée « Beverly Hills 90210 » ?',
           'Série','Tori Spelling', 'Jenny Garth', 'Hillary Swank', 'Carol Potter','Series_americaines2');
#--Séries américaines : questions 7--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
    VALUE (3,2,'Dans quelle série Aaron Hotchner perce-t-il les pensées des tueurs en série ?',
           'Série','« Esprits criminels »', '« Person of Interest »', '« Mentalist »', '« The Walking Dead »','Series_americaines2');

#--Level 3--

#--Séries américaines : questions 8--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (3,3,'Qui joue le rôle du Président Bartlet dans la série télévisée « À la Maison Blanche » ?',
           'Série','Martin Sheen', 'Rob Lowe', 'John Spencer', 'Gary Cole','Series_americaines3');
#--Séries américaines : questions 9--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (3,3,'Qui incarne Isabel Evans dans la série télévisée américaine « Roswell » ?',
           'Série','Katherine Heigl', 'Shiri Appleby', 'Majandra Delfino', 'Poppy Montgomery','Series_americaines3');
#--Séries américaines : questions 10--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (3,3,'Dans la série « X-Files », quel est le prénom de la soeur de Fox Mulder ?',
           'Série','Samantha', 'Sarah', 'Ann', 'Catherine','Series_americaines3');
       
#--Héros Marvel--

#--Level 1--

#--Héros Marvel : questions 1--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3, imageURL)
VALUE (4,1,'Dans quelles aventures retrouve-t-on les personnages de Loïs et Clark ?',
       'Héros Marvel','Superman','Spider-Man','Batman','Hulk','Marvel1');
#--Héros Marvel : questions 2--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (4,1,'Dans les X-Men, quelle substance constitue le squelette principal de Wolverine ?',
       'Héros Marvel','Adamantium','Vibranium','Cavorite','Neutronium','Marvel1');
#--Héros Marvel : questions 3--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (4,1,'Quel est le nom de Spider-Man, apparu pour la première fois en 1962 ?',
       'Héros Marvel', 'Peter Parker','John Parker','Tom Parker',' Alan Parker','Marvel1');
#--Héros Marvel : questions 4--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (4,1,'Quel super-héros ne se sépare jamais de son marteau forgé par les nains ?',
       'Héros Marvel','Thor', 'Venom', 'Flash', 'Bizarro','Marvel1');

#--Level 2--

#--Héros Marvel : questions 5--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (4,2,'Qui est Logan dans la bande dessinée de Marvel Comics « X-Men » ?',
       'Héros Marvel','Wolverine', 'Caliban', 'Cyclope', 'Colossus','Marvel2');
#--Héros Marvel : questions 6--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (4,2,'De quel groupe de super-héros Mr Fantastique est-il membre ?',
       'Héros Marvel','Quatre Fantastiques', 'X-Men', 'Thunderbolts', 'Illuminati','Marvel2');
#--Héros Marvel : questions 7--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (4,2,'Quel humain devient surpuissant grâce à une armure de haute technologie ?',
       'Héros Marvel', 'Iron Man', 'Thor', 'Wolverine', 'Cyclope','Marvel2');

#--Level 3--

#--Héros Marvel : questions 8--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (4,3,'Quel super-héros créé par Marvel Comics est aveugle de naissance ?',
       'Héros Marvel','Stick', 'Cyclope', 'Flash', 'Thor','Marvel3');
#--Héros Marvel : questions 9--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (4,3,'Combien compte-t-on environ de héros dans les Comics de Marvel ?',
       'Héros Marvel','5 000', '4 000', '3 000', '2 000','Marvel3');
#--Héros Marvel : questions 10--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (4,3,'Quelle héroïne de Daredevil est une tueuse professionnelle ?',
       'Héros Marvel', 'Elektra', 'Wonder Woman', 'Catwoman', 'Ultron','Marvel3');

#--Héros de Star Wars--

#--Level 1--

#--Héros de Star Wars : questions 1--

INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (5,1,'Quel est le nom du vaisseau spatial du contrebandier Han Solo ?',
       'Héros de Star Wars','Faucon Millenium','Aigle Solitaire','B-Wing','Speeder','Star_Wars1');
#--Héros de Star Wars : questions 2--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (5,1,'Quel métier est exercé par Jango Fett, humain originaire de Concord Dawn ?',
       'Héros de Star Wars','Chasseur de primes','Sénateur','Vendeur de droïdes','Musicien','Star_Wars1');
#--Héros de Star Wars : questions 3--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (5,1,'Quel est le lien de parenté entre Luke Skywalker et la Princesse Leia ?',
       'Héros de Star Wars', 'Frère et soeur','Cousin et cousine','Oncle et tante',' Mari et femme','Star_Wars1');
#--Héros de Star Wars : questions 4--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (5,1,'Quel célèbre personnage de « Star Wars » a été élevé par son oncle et sa tante ?',
       'Héros de Star Wars', 'Luke Skywalker', 'Han Solo', 'Chewbacca', 'Plo Koon','Star_Wars1');

#--Level 2-

#--Héros de Star Wars : questions 5--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (5,2,'Quel personnage de « Star Wars » a été conçu comme un alien ressemblant à une limace ?',
       'Héros de Star Wars','Jabba le Hutt', 'Dark Maul', 'Mace Windu', 'Lando Calrissian','Star_Wars2');
#--Héros de Star Wars : questions 6--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (5,2,'Qui a enregistré un message dans les circuits intégrés de R2-D2 dans « Un Nouvel Espoir » ?',
       'Héros de Star Wars','La Princesse Leia', 'Anakin', 'Chewbacca', 'Obi-Wan','Star_Wars2');
#--Héros de Star Wars : questions 7--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (5,2,'Quelle est la couleur du sabre laser de Mace Windu, créateur de la technique du Vaapad ?',
       'Héros de Star Wars', 'Violette', 'Rouge', 'Verte', 'Bleue','Star_Wars2');

#--Level 3--

#--Héros de Star Wars : questions 8--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (5,3,'Après avoir imposé le respect auprès des maîtres Jedi, à quel âge Yoda est-il mort ?',
       'Héros de Star Wars','900 ans', '2 200 ans', '1 200 ans', '750 ans','Star_Wars3');
#--Héros de Star Wars : questions 9--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (5,3,'Apparu dans les épisodes II et III, comment le comte Dooku est-il également appelé ?',
       'Héros de Star Wars','Dark Tyranus', 'Dark Sidious', 'Dark Malak', 'Dark Vador','Star_Wars3');
#--Héros de Star Wars : questions 10--
INSERT INTO question (id_quiz, level, text, themes, goodAnswer, badAnswer, badAnswer2, badAnswer3,imageURL)
VALUE (5,3,'Quel autre nom est utilisé pour désigner Leia Amidala Skywalker, soeur de Luke ?',
       'Héros de Star Wars', 'Leia Organa', 'Leia Amidala', 'Leia Windu', 'Leia Solo','Star_Wars3');