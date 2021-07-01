# ProgettoWeb
Progetto d'esame per un sito riguardante la gestione di una polisportiva

##Installazione
Per testare il progetto è necessario scaricare il file sql contenente il database caricato nei file
del progetto e inserirlo in MySQL.
Per l'inserimento creare un DB chiamato 'progettoweb' e importare il file scaricato per la creazione delle tabelle.
###Accesso al DB
L'accesso al DB viene eseguito con username: 'root' e password: ''.
Se si vogliono modificare le credenziali di accesso con quelle della propria macchina locale modificare
il file config.php nella cartella Foundation.

##Cron jobs
È stato necessario scrivere un Cron Job per l'eliminazione dei gruppi scaduti.
Quest'ultimo è presente in scriptCron.php.
Deve essere eseguito ogni 2 ore dalle 8 alle 18, per ogni giorno.


