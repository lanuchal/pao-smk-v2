<?php
function includeIfExists($filePath)
{
    if (file_exists($filePath)) {
        include $filePath;
    }
}
