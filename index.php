<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <title>Moje Hobby</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/header_styles.css">
        <link rel="stylesheet" href="styles/main_content_styles.css">
        <link rel="stylesheet" href="styles/footer.css">
        <link rel="stylesheet" href="styles/login.css">
        <link rel="icon" type="image/png" href="img/pixil-frame-0.png">
        <script defer src="script/brightness.js"></script>
        <script defer src="script/jquery.scrollme.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    </head>
    <body>
        <?php include 'header.php';?>
        <main>
            <div id="music-pointer" class="pointers"></div>
            <section id="music">
                <h1 class="content-title-l">Muzyka</h1>
                <div class="content-info-r">
                    <p>
                        Przygodę z <strong>muzyką</strong> zacząłem będąc <strong>małym dzieckiem.</strong><br>
                        W wieku <strong>sześciu lat</strong>, rodzice zapisali mnie do<br>
                        szkoły muzycznej w centrum Gdańska. <strong>Czemu tak wcześnie?</strong><br>
                        <strong>Edukacja muzyczna</strong> powinna być rozpoczęta <strong>jak najszybciej</strong> z uwagi<br>
                        na tempo <strong>rozwoju mózgu</strong> dziecka, które jest najszybsze<br>
                        właśnie <strong>na etapie wczesnoszkolnym</strong>.
                    </p>
                    <p>
                        Z początku <strong>nie byłem przekonany.</strong> Szkoła muzyczna zajmowała mi<br>
                        stanowczo <strong>za duzo czasu</strong>, który wolałem przeznaczyć<br>
                        na zabawy z kumplami ze szkoły. <strong>Rodzice byli jednak stanowczy</strong>,<br>
                        co poskutkowało moją nauką w <strong>pierwszym</strong>, a następnie <strong>drugim<br>
                        stopniu</strong> szkoły muzycznej w <strong>Gdańsku</strong>.
                    </p>
                    <p>
                        Oficjalnie <strong>edukację zakończyłem</strong> dopiero po <strong>10 latach</strong>.<br>
                        Nie był to jednak koniec mojej przygody z muzyką.
                    </p>
                </div>
            </section>
            <section class="photo-section scrollme">
                <h1 class="photo-box animateme" id="music-school"
                data-when="span"
                data-from="0.5"
                data-to="0.2"
                data-opacity="0"
                data-translatex="500"><img class="photo-element" src="img/content/szkola_muzyczna.png" alt="Budynek szkoły muzycznej"></h1>
            </section>
            <div id="band1-pointer" class="pointers"></div>
            <section id="band1" class="scrollme">
                <div class="content-info-l animateme" 
                    data-when="span"
                    data-from="0.55"
                    data-to="0.2"
                    data-opacity="0"
                    data-translatex="-1000">
                    <p>
                        W <strong>2017 roku</strong>, dwójka starych przyjaciół spotkała się na <strong>przystanku autobusowym.</strong><br>
                        Po krótkiej rozmowie, dowiedzieli się, że <strong>jeden z nich gra na gitarze</strong>,<br>
                        natomiast drugi kilka miesięcy wcześniej rozpoczął naukę <strong>gry na perkusji</strong>.<br>
                    </p>
                    <p>
                        Tak rozpoczęły się <strong>próby</strong>, na które, w pewnej chwili, <strong>również zostałem<br>
                        zaproszony</strong>. Po jakimś czasie okazało się, że nasza <strong>muzyka potrzebuje głosu</strong><br>
                    <strong>Wokalistką została</strong>, jak to zwykle bywa w takich sytuacjach, <strong>koleżanka</strong>.<br>
                        Tym sposobem, powstał <strong>pierwszy skład</strong>, jeszcze wtedy nienazwanego <strong>zespołu</strong>. 
                    </p>
                </div>
                <h1 class="content-title-r animateme"
                data-when="span"
                data-from="0.55"
                data-to="0.2"
                data-opacity="0"
                data-translatex="1000">Zespół</h1>
            </section>
            <section class="photo-section scrollme">
                <h1 class="photo-box animateme" id="band" 
                data-when="span"
                data-from="0.5"
                data-to="0.2"
                data-opacity="0"
                data-translatex="-500"><img src="img/content/zespol_4.png" alt="Zespół mzuyczny zdjęcie 1" class="photo-element"></h1>
            </section>
            <div id="concerts-pointer" class="pointers"></div>
            <section id="concerts" class="scrollme" >
                <h1 class="content-title-l animateme"
                    data-when="span"
                    data-from="0.55"
                    data-to="0.2"
                    data-opacity="0"
                    data-translatex="-1000">Koncerty</h1>
                <div class="content-info-r animateme"
                    data-when="span"
                    data-from="0.55"
                    data-to="0.2"
                    data-opacity="0"
                    data-translatex="1000">
                    <p>
                        W <strong>2017 roku</strong>, dwójka starych przyjaciół spotkała się na <strong>przystanku autobusowym.</strong><br>
                        Po krótkiej rozmowie, dowiedzieli się, że <strong>jeden z nich gra na gitarze</strong>,<br>
                        natomiast drugi kilka miesięcy wcześniej rozpoczął naukę <strong>gry na perkusji</strong>.<br>
                    </p>
                    <p>
                        Tak rozpoczęły się <strong>próby</strong>, na które, w pewnej chwili, <strong>również zostałem<br>
                        zaproszony</strong>. Po jakimś czasie okazało się, że nasza <strong>muzyka potrzebuje głosu</strong><br>
                    <strong>Wokalistką została</strong>, jak to zwykle bywa w takich sytuacjach, <strong>koleżanka</strong>.<br>
                        Tym sposobem, powstał <strong>pierwszy skład</strong>, jeszcze wtedy nienazwanego <strong>zespołu</strong>. 
                    </p>
                </div>
            </section>
            <table class="scrollme">
                <thead class="animateme"
                data-when="span"
                data-from="0.6"
                data-to="0.4"
                data-opacity="0"
                data-translatey="500">
                    <tr>
                        <th>L.p.</th>
                        <th>Data</th>
                        <th>Nazwa koncertu</th>
                    </tr>
                </thead>
                <tbody class="animateme"
                data-when="span"
                data-from="0.6"
                data-to="0.4"
                data-opacity="0"
                data-translatey="500">
                    <tr>
                        <th>1</th>
                        <td>17.03.2018</td>
                        <td>Przebi(j)śniegi</td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td>19.06.2018</td>
                        <td>I l.o. Jam Session V</td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td>26.09.2018</td>
                        <td>I l.o. Jam Session VI</td>
                    </tr>
                    <tr>
                        <th>4</th>
                        <td>25.01.2019</td>
                        <td>III l.o. Jam Session II</td>
                    </tr>
                    <tr>
                        <th>5</th>
                        <td>23.10.2019</td>
                        <td>Charytatywnie dla Darii</td>
                    </tr>
                    <tr>
                        <th>6</th>
                        <td>13.05.2021</td>
                        <td>Technikalia PG</td>
                    </tr>
                    <tr>
                        <th>7</th>
                        <td>4.09.2021</td>
                        <td>Imagine International</td>
                    </tr>
                    <tr>
                        <th>8</th>
                        <td>11.09.2021</td>
                        <td>Muzyka dla wszystkich</td>
                    </tr>
                    <tr>
                        <th>9</th>
                        <td>23.10.2021</td>
                        <td>Technikalia PG</td>
                    </tr>
                    <tr>
                        <th>10</th>
                        <td>15.06.2022</td>
                        <td>Rajd Elektronika</td>
                    </tr>
                    <tr>
                        <th>11</th>
                        <td>27.08.2022</td>
                        <td>Stacja FoodHall Metropolia</td>
                    </tr>
                </tbody>
                
            </table>
            <section class="photo-section scrollme">
                <h1 class="photo-box animateme" id="concert-photo"
                    data-when="span"
                    data-from="0.5"
                    data-to="0.2"
                    data-opacity="0"
                    data-translatex="500">
                <img src="img/content/koncert_fh.jpg" alt="Zdjęcie z koncertu na stacji food hall galerii Matropolia we Wrzeszczu" class="photo-element"></h1>
            </section>
            <section id="go-to-gallery" class="scrollme">
                <h3 class="animateme"
                data-when="span"
                data-from="0.5"
                data-to="0.2"
                data-opacity="0"
                data-scale="2">Zapraszamy do następnych sekcji strony.</h3>
            </section>
        </main>
        <?php include 'footer.php';?>
    </body>
</html>
