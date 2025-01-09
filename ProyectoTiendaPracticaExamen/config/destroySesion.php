<?php
function closeSession(): void
{
    session_unset();
    session_abort();
    session_destroy();
    header('Location: ../../public/index.php?closedSession=1');
}
