<?php
include ("Function_Backup.php");

echo backup_tables("34.28.70.255","root","","cepuns");
$fecha=date("Y-m-d");
header("Content-disposition: attachment; filename=db-backup-".$fecha.".sql");
header("Content-type: MIME");
readfile("backups/db-backup-".$fecha.".sql");