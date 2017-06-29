<?php
# minimum code use example
# see example.php for more options that you can use, and for trouble shooting tips
require 'class.email-query-results-as-csv-file.php';
$emailCSV = new EmailQueryResultsAsCsv('localhost:3306','RiskManagement','root','root');
$emailCSV->setQuery("SELECT * FROM RiskRegister2 WHERE Priority = 'High'");
$emailCSV->sendEmail("janinelucien.cahoon@gmail.com","janinelucien.cahoon@gmail.com","MySQL Query Results as CSV Attachment");
?>
