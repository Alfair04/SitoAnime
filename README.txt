Conclusioni attuali 08/10/2024 sui databases in uso il primo con https://cockroachlabs.cloud/ non ne tempo limite ne spazio incredibbilmente almeno per ora,
fa appoggio a google cloud e non è online 24 ore su 24 ma sempra attivarsi appena ricevuta una richiesta (dopo la prima richesta bisogna aspettare un po che si avvii)
e dopo un tot di tempo si spegne, purtroppo funziona solo con postgress e ha bisogno di un server a parte che tenga disponibili le api,
server che viene attulamente hostato da https://dashboard.render.com/ sito che purtroppo ha un tempo totale gratuito limitato e scaduto quello non è più utilizzabile.

Il secondo database hatempo illimitato e è online 24 ore su 24 ma è lento è ha uno spazio massimo di 5Mb che è troppo poco ma funziona con php in quanto è in SQL,
è modificabile con http://www.phpmyadmin.co/ il che lo rende molto comodo attualmente è diponibile una versione del sito con questo database a http://listaanime.000.pe/animephp


Conclusioni finali: servirebbe o un altro sito di hosting di database o riscire a usare postgress su php, anche se attualmente non sembra possibile.

 Altrimenti trovare un altro sito di hosting per il server in nodejs o facendo rientrare tutto in 5Mb con il secondo database.
