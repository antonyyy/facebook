1. Unesite unesite podatke za pristup bazi podataka
		application/config/database.php

2. Kreirajte tablicu

CREATE TABLE IF NOT EXISTS `entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
)



Opis:

1.Imamo Controllers koji generira po�etnu stranicu i u kojoj se nalazi Like button,
te koja nam ispisiva Login, te nakon �to se logiramo ispisiva podatke korisnika ime,prezime spol i sliku.

Controllers
		controllers/home.php
View 
		view/facebook/view.blade.php
		
2.Te ispod toga nalazi se link "Add image and personal text"  koji sadr�i formu unosa svih navedenih  podataka u bazu.

Controllers
		controllers/new.php
View 
		view/new/new.blade.php
		
		Ovdje se nalazi javascript koji provjerava dali je korisnik Lajkao stranicu, 
		ako nije skriven mu je Submit button te ga onemogu�ava da se forma posta i jo� se umjesto submit-a ispi�e upozorenje crvenim slovima kako stranicu nije lajkana.
		
		Naravno ako je sve uspije�no obavljeno korisnika se preusmjerava na stranicu koja ispisva podatke koje se nalaze u bazi.

3.I jo� ispod svega se nalazi link "Click to see data of all users" kako bi mogli pregledat sve podatke koji su ve� upisani u bazu
Controllers
		controllers/viewdatas.php
View 
		view/viewdatas/index.blade.php
