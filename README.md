

## Descrizione

Il progetto è stato realizzato con Laravel 8, Bootstrap 4 e [Fullcalendar](https://fullcalendar.io) (implementato come pacchetto laravel), si è deciso di usare questi strumenti per velocizzare lo sviluppo, inoltre laravel fornisce un sistema di autenticazione già pronto, che viene abilitato con l'installazione di un sistema di scaffolding (Bootstrap o Vue).

In home page viene mostrato il calendario senza autenticazione, nel momento in cui si vuole creare un'evento viene richiesto il login se l'utente non è autenticato; è anche possibile effettuare la registrazione.



## Installazione

Spacchettare lo zip sulla web root del proprio server web, settare nel file `.env` i parametri di connessione al db. 

Il database può essere:
 - mysql 5.7+
 - postgresql 9.6+
 - sqlite 3.8.8+
 - sql server 2017+
 
 Aggiungere un virtual host nel server web, se necessario, come nell'esempio:
 ```
 <VirtualHost *:80>
     DocumentRoot "PERCORSO_ROOT_SERVER_WEB/calendario_prex/public"
     ServerName calendar
     ServerAlias calendar
     php_value magic_quotes_gpc  0
 	
 	<Directory "PERCORSO_ROOT_SERVER_WEB/calendario_prex/public">
         AllowOverride All
 	</Directory>
 </VirtualHost>
 ```
 
 A questo punto aprire un terminale ed installare le dipendenze necessarie al progetto, lanciando questi comandi dalla cartella calendario_prex:
 
 
 `composer install`
 
 e poi:
 
  `npm install`
 
ed infine:

`php artisan migrate`

Il sito dovrebbe ora essere raggiungibile al percorso http://calendar, se installato in ambiente locale

