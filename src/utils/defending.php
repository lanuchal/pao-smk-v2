<?php


function defending($data)
{
   // Perform sanitization to prevent potential SQL injection
   $data = trim($data); // Remove leading/trailing whitespaces
   $data = stripslashes($data); // Remove backslashes
   $data = htmlspecialchars($data); // Convert special characters to HTML entities
   return $data;
}

