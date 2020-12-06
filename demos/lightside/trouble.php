<?php
echo("This file is intended to crash for demo purposes.");

function bad_operation(int $val)
{
    return $val / 0;
}

echo(bad_operation(7));
?>