<?php
/*
  This is an example of attaching multiple files to a single email. After the email is sent the file
  attachment list is cleared so this same object could be used again for a new email.
*/

# include the class and create a new object of the class
require 'class.email-query-results-as-csv-file.php';
$emailCSV = new EmailQueryResultsAsCsv('localhost:3306','RiskManagement','root','root');

# -----
# Attach Multiple Files To One Email
# you can attach multiple files by setting them up using the object method "setMultiFile()"
# pass in this information: (a) File Name for this attachment, (b) Query
# repeat as needed, method can be called once or multiple times before sending the email
$emailCSV->setMultiFile("file_one.csv", "SELECT * FROM RiskRegister2");
$emailCSV->setMultiFile("file_two.csv", "SELECT * FROM Incidents");
$emailCSV->setMultiFile("file_three.csv", "SELECT * FROM file");

# send the email
$emailCSV->sendEmail("janinelucien.cahoon@gmail.com","janinelucien.cahoon@gmail.com","MySQL Query Results as CSV Attachment");
?>
