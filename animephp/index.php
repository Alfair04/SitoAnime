<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Anime Randomizer</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f4;
            }

            .navbar {
                display: flex;
                justify-content: center;
                background-color: #333;
                position: relative;
            }

            .navbar a {
                color: white;
                text-decoration: none;
                padding: 25px 45px; 
                display: inline-block;
                transition: background-color 0.3s ease;
            }

            .navbar a:hover {
                background-color: #575757; 
            }
            
            .impostazioni i {
                font-size: 22px;
            }

            .impostazioni:hover i.fa-gear {
                animation: spin 1s infinite linear;
            }

            @keyframes spin {
                100% {
                    transform: rotate(360deg);
                }
            }

            .content {
                display: flex;
                justify-content: space-between;
                padding: 20px;
            }

            /* Left column - Search and Filters */
            .filters {
                width: 20%;
                background-color: white;
                padding: 15px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-right:3px solid gray;
            }

            .filters h3, .filters label {
                font-size: 18px;
            }

            .filters input[type="text"], .filters input[type="date"] {
                width: 100%;
                padding: 8px;
                margin-bottom: 10px;
            }

            /* Center grid for anime slots */
            .anime-grid {
                margin-top: 50px; /* Elimina il margine superiore */
                width: 50%;
                display: grid;
                grid-template-columns: repeat(5, 1fr);
                grid-auto-rows: 250px; /* Imposta un'altezza fissa per le righe */
                row-gap: 70px; /* Riduce lo spazio tra le righe */
                column-gap: 10px; /* Spazio tra le colonne */
            }

            .anime-grid .slot {
                background-color: white;
                border: 2px dashed #ccc;
                padding: 0; /* Assicura che non ci sia padding interno */
                height: 250px; /* Altezza fissa per ogni slot */
                display: flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .slot img {
                width: 94%;  /* L'immagine occupa il 100% della larghezza del div */
                height: 94%; /* L'immagine occupa il 100% dell'altezza del div */
                object-fit: cover; /* Ritaglia l'immagine per riempire il div, mantenendo le proporzioni */
            }

            .anime-grid .slot:hover {
                background-color: #e6e6e6;
            }

            .anime-grid .slot img {
                max-width: 100%;
                height: auto;
            }

            /* Right column - Randominator */
            .randominator {
                margin-top: 100px;
                width: 350px;
                height: 500px;
                background: linear-gradient(135deg, #cfd1d0, #9ea2a3, #e2e4e5, #6c7378);
                background-size: 300% 300%;
                background-position: center;
                padding: 15px;
                text-align: center;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                border-radius: 5%;
                border: 5px solid black;
                animation: metallicShine 3s ease-in-out infinite;
            }



            .randominator img {
                width: 100px;
                height: 100px;
                margin-bottom: 15px;
                border: 4px solid black;
                border-radius: 2%;
                -webkit-user-drag: none;  
            }

            .randominator button {
                background: linear-gradient(90deg, #1a1a1a, #4b4b4b); /* Gradiente dal verde chiaro al verde scuro */
                color: white;
                border: none;
                border-radius: 25px; /* Bordi arrotondati */
                padding: 10px 20px;
                font-size: 16px;
                font-weight: bold;
                cursor: pointer;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
                transition: all 0.3s ease;
                margin-top:10px;
            }

            .randominator button:hover {
                background: linear-gradient(90deg, #4b4b4b, #1a1a1a); /* Cambia il gradiente al passaggio del mouse */
                box-shadow: 0 6px 8px rgba(0, 0, 0, 0.3);
                transform: translateY(+2px); /* Leggero sollevamento del bottone */
            }

            .randominator h3 {
                font-size: 36px;
                color: #dddddd; /* Colore bianco per contrastare lo sfondo */
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Ombra per far risaltare il testo */
                font-weight: bold;
                margin-top: 0;
                margin-bottom: 20px;
                letter-spacing: 2px; /* Aggiunge un po' di spazio tra le lettere */
            }

            .metallic-text {
                font-size: 28px;
                font-weight: bold;
                background: linear-gradient(90deg, #b8c6db 0%, #f5f7fa 50%, #b8c6db 100%);
                background-clip: text;
                -webkit-background-clip: text;
                color: transparent;
                text-shadow: 0 2px 4px rgba(0, 0, 0, 0.4),
                            0 4px 8px rgba(0, 0, 0, 0.3),
                            0 8px 16px rgba(0, 0, 0, 0.2);
                margin-bottom: 10px;
                margin-top: 15px;
            }

            @keyframes metallicShine {
                0% {
                    background-position: 0% 50%;
                }
                50% {
                    background-position: 100% 50%;
                }
                100% {
                    background-position: 0% 50%;
                }
            }

        </style>
    </head>
    <body>

        <div class="navbar">
            <a href="http://listaanime.000.pe" class="Navbar-Sections">Home</a>
            <a href="#" class="Navbar-Sections">My List</a>
            <a href="http://listaanime.000.pe/anime" class="Navbar-Sections">Anime</a>
            <a href="#" class="Navbar-Sections">Users</a>
            <a href="#" class="impostazioni">
                <i class="fa fa-gear"></i>
            </a>
        </div>

        <!-- Main Content -->
        <div class="content">

            <!-- Left Column - Filters -->
            <div class="filters">
                <h3>Filtri</h3>
                <label for="search">Cerca:</label>
                <input style="width: 95%;"type="text" id="search" placeholder="Cerca anime...">
                
                <h4>Data di uscita</h4>
                da <input style="width: 38%;display: inline-block;"type="date"> a <input style="width: 38%;display: inline-block;"type="date">
                
                
                <h4>Stato</h4>
                <label><input type="checkbox"> In corso</label><br>
                <label><input type="checkbox"> Stagionale</label><br>
                <label><input type="checkbox"> Terminato</label><br>
                
                <h4>Generi</h4>
                <label><input type="checkbox"> Fantasy</label><br>
                <label><input type="checkbox"> Action</label><br>
                <label><input type="checkbox"> Comedy</label><br>
                <label><input type="checkbox"> Comedy</label><br>
                <label><input type="checkbox"> Comedy</label><br>
                <label><input type="checkbox"> Comedy</label><br>
                <label><input type="checkbox"> Comedy</label><br>
                <label><input type="checkbox"> Comedy</label><br>
                <label><input type="checkbox"> Comedy</label><br>
                <label><input type="checkbox"> Comedy</label><br>
                <label><input type="checkbox"> Comedy</label><br>
                <label><input type="checkbox"> Comedy</label><br>
                <label><input type="checkbox"> Comedy</label><br>
                <label><input type="checkbox"> Comedy</label><br>
                <label><input type="checkbox"> Comedy</label><br>
                <label><input type="checkbox"> Comedy</label><br>
                <label><input type="checkbox"> Comedy</label><br>
                <label><input type="checkbox"> Comedy</label><br>
                <label><input type="checkbox"> Comedy</label><br>
                <label><input type="checkbox"> Comedy</label><br>
                <label><input type="checkbox"> Comedy</label><br>
                <label><input type="checkbox"> Comedy</label><br>
                <label><input type="checkbox"> Comedy</label><br>
            </div>

            <!-- Center Grid - Anime Slots -->
            <div class="anime-grid" id="grid">
                <a href="http://listaanime.000.pe/animephp/collegamentophp.html">
                    <div class="slot">
                        <span><i style="color:gray; font-size:24px" class="fa-duotone fa-solid fa-plus"></i></span>
                    </div>
                </a>

                <?php
                    $host = "sql7.freesqldatabase.com"; // Modifica questo con l'host del tuo database
                    $username = "sql7736067"; // Modifica questo con il tuo nome utente del database
                    $password = "KXpK3uylei"; // Modifica questo con la tua password del database
                    $dbname = "sql7736067"; // Modifica questo con il nome del tuo database

                    // Connessione al database
                    $con = mysqli_connect($host, $username, $password, $dbname);

                    // Verifica la connessione
                    if (!$con) {
                        die("Connessione al database fallita: " . mysqli_connect_error());
                    }

                    // Query per selezionare tutti i dati dalla tabella 'anime'
                    $query = "SELECT * FROM `anime`;";

                    // Esegui la query
                    $result = mysqli_query($con, $query);

                    // Verifica se ci sono risultati
                    if (mysqli_num_rows($result) > 0) {
                        // Estrai ogni riga come array associativo
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Stampa i risultati
                            echo "<div id=".$row["id"]."><div class='slot'><img src='https://img.animeworld.so/locandine/cSYmm.jpg' alt='Anime 1'></div>".$row["titolo"]." - ".$row["numeroEp"]." episodi</div>";
                        }
                    } else {
                        echo "Nessun risultato trovato.";
                    }

                    // Chiudi la connessione
                    mysqli_close($con);


                    //INSERT INTO `anime` (`id`, `titolo`, `descrizione`, `stato`, `dataDiUscita`, `numeroEp`) VALUES (NULL, 'text', 'suca', '2', '2024-10-16', '12');
                ?>
            </div>

            <!-- Right Column - Randominator -->
            <div class="randominator">
                <h3 class="metallic-text">Randominator</h3>
                <img src="https://i.imgur.com/X8gCgrb.gif" alt="Mascotte" style="height:55%; width:75%">
                <button onclick="generateRandomAnime()" class="randombutton">Genera Anime</button>   
            </div>

        </div>

        

        <!-- Script for random anime generation -->
        <script>

            function generateRandomAnime(){
                // Qui potresti aggiungere un'API o database call per ottenere un anime casuale
                alert("Un anime casuale è stato selezionato!");
                // Ad esempio, cambiando l'immagine del Randominator
                document.querySelector('.randominator img').src = "random_anime_image.jpg";
            }

        </script>

    </body>
</html>
