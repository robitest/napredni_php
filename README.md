### 7/Zadaca preko praznika

##### Zadaci su poredani po tezini IMO. Stoga nastojte rjesavati od prvog prema posljednjem buletu.

* u genres/show dodati listu filmova koji spadaju u taj zanr +
* dodati CRUD funkcionalnost za medije i cjenik 
* zavrsiti CRUD za filmove -> dodati show, update i delete (kod Delete podesiti bazu na ON DELETE CASCADE da se povezane kopije obrisu automatski)
* za movies/create -> movies/store dodati dodavanje kopija u istom POST requestu 
* napraviti dashboard na ruti /dashboard u kontroleru dashboard/index.php koji pokazuje tablicu aktivnih posudbi i mogucnost brzog kreiranja nove posudbe
* napraviti CRUD za posudbe -> stvara zapis u tablicama 'posudba' i 'kopija_posudba'
    - rentals/index - Slicno kao drugi dio dashboarda
    - rentals/show
    - rentals/create - Slicno kao prvi dio dashboarda
    - rentals/return  Hint: pritiskom na gumb Vrati na dashboardu
* rentals/edit - IMO nije potreban ali ako pokusate napraviti mozete nesto novo nauciti


### 6/Zadaca

- refaktorirati sva mjesta gdje koristimo new Database u novu singleton sintaksu -> Database::get()
- nadopuniti klasu Validator sa metodama po zelji (min, phone, ...)
- iskoristiti validator i pomocu istoga napraviti validaciju na svim formama koje smo do sada kreirali
- dodati funkcionalnost za brisanje pojedinog zanra



### 5/Zadaca

Za Clanove videoteke napraviti rute, kontrolere i poglede za:
- prikaz informacija o pojedinom clanu (show)
- izmjenu informacija o clanu (edit i update)



### 4/Zadaca

- napraviti members i movies po uzoru na predavanje sa custom rutama i kontrolerima i pogledima svrstanim po folderima



### 3/Zadaca

- napraviti members-create.php koristeci najblje prakse sa zadnjeg predavanja
- napraviti members.view.php po uzoru na genres.view.php



### 2/Zadaca

- u sidebar.php dodati 'aria-current="page"' samo za trenutnu stranicu
- promijeniti spoj na bazu u movies.php i members.php iz mysqli u PDO objekt kao u primjeru genres.php
- dadati stranicu za izlistavanje cjenika *
- dadati stranicu za izlistavanje mediji *
- dadati stranicu za izlistavanje posudbi -> samo aktivne posudbe -> posudba* + clan.ime + film * + tocna cijena, zakasnina (imamo taj upit u mysql dijelu predavanja)



### 1/Zadaca

- napraviti stranicu 'Zanrovi' -> geners.php + geners.view.php po uzoru na stanicu 'Clanovi'
- napraviti stranicu 'Filmovi' -> movies.php + movies.view.php po uzoru na stanicu 'Clanovi'
- dodati obje stranice kao linkove u Izbornik u sidebar
- namjestiti Apache server da mu je DocumentRoot /var/www/napredni_php
- izvrsiti /SQL/videoteka.sql na lokalnoj bazi na vasim racunalima kako bi svi imali istu bazu sa 56 filmova
