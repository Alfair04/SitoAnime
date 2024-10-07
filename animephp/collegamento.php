<?php

    header('Content-Type: application/json'); // Ensure the response is JSON

    $host = "sql7.freesqldatabase.com";
    $username = "sql7736067";
    $password = "KXpK3uylei";
    $dbname = "sql7736067";

    // Effettua la connessione
    $con = mysqli_connect($host, $username, $password, $dbname);

    if (mysqli_connect_errno()) {
        echo json_encode(array("message" => "Impossibile connettersi al database: " . mysqli_connect_error()));
        exit();
    }

    // Verifica se sono stati inviati dati tramite il metodo POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Leggi i dati inviati tramite il corpo della richiesta
        $data = json_decode(file_get_contents("php://input"), true);

        // Estrai i dati e controlla che siano presenti
        $titolo = isset($data['titolo']) ? $data['titolo'] : '';
        $descrizione = isset($data['descrizione']) ? $data['descrizione'] : '';  // Fix typo here
        $locandina = isset($data['locandina']) ? $data['locandina'] : '';
        $stato = isset($data['stato']) ? (int)$data['stato'] : 0;
        $dataDiUscita = isset($data['dataDiUscita']) ? $data['dataDiUscita'] : '';
        $numeroEp = isset($data['numeroEp']) ? (int)$data['numeroEp'] : 0;

        // Verifica che i campi obbligatori siano riempiti
        if (!empty($titolo) && !empty($stato)) {

            // Prepara la query di inserimento utilizzando prepared statements
            $stmt = $con->prepare("INSERT INTO `anime` (`titolo`, `descrizione`, `locandina`, `stato`, `dataDiUscita`, `numeroEp`) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssisi", $titolo, $descrizione, $locandina, $stato, $dataDiUscita, $numeroEp); // Make sure you bind the corrected variable

            // Esegui la query
            if ($stmt->execute()) {
                echo json_encode(array("message" => "Inserimento avvenuto con successo."));
            } else {
                echo json_encode(array("message" => "Errore durante l'inserimento: " . $stmt->error));
            }

            $stmt->close();

        } else {
            echo json_encode(array("message" => "Campi obbligatori mancanti."));
        }
    } else {
        // Se la richiesta non è stata fatta tramite il metodo POST
        echo json_encode(array("message" => "Metodo non consentito."));
    }

    mysqli_close($con);
?>
