<?php


include "getdatareservehistory.php"; 
include "../html_include/top.phtml";

include "reservehistory.phtml";
echo (file_get_contents("../html_include/bot.html"));
