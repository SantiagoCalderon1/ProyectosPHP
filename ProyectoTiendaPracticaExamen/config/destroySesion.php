<?php
function closeSession(): void
{
    session_unset();

    session_destroy();
}
