<?php

try {
    echo $x; // Notice: Undefined variable: x

    trigger_error("This is a user warning", E_USER_WARNING); //  Warning

    trigger_error("This is a user notice", E_USER_NOTICE); //  Notice

    trigger_error("This is a user error", E_USER_ERROR); //  Error

} catch (Throwable $e) {
    echo "<strong>Error:</strong> " . $e->getMessage() . " in " . $e->getFile() . " on line " . $e->getLine() . "<br>";
} finally {
    
}
?>
