CREATE TABLE Profil
(
	id INT PRIMARY KEY NOT NULL,
	nom_profil varchar(100),
	email_profil varchar(250),
	mdp_profil varchar(100),
	nom_user varchar(100),
	prenom_user varchar(100),
	gender_user varchar(100),
	bio_user text(1000)
)

CREATE TABLE Picture
(
	pic_name varchar(100),
	pic_place varchar(100),
	pic_date date,
	pic_comment text(250),
	pic_id int PRIMARY KEY NOT NULL,
	id_user int NOT NULL
)

