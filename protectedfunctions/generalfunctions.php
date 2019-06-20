<?php #haha https://tuneshop.online/general
startprotectedsession();

function startprotectedsession()
{
    session_start();
}

function fullydestroysession()
{
#https://doc.bccnsoft.com/docs/php-docs-7-en/function.session-destroy.html

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
// Unset all of the session variables.
    $_SESSION = array();

// Finally, destroy the session.
    session_destroy();
}

function resetsession()
{
    $_SESSION = array();
}