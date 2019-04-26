<?php #haha https://tuneshop.online/general
startprotectedsession();

function startprotectedsession()
{
    $sessionsettings = array();
    
    #see for my security choices: https://stackoverflow.com/a/5081453 && http://php.net/manual/en/session.security.ini.php && https://www.simonholywell.com/post/2013/04/three-things-i-set-on-new-servers/
    if (version_compare(PHP_VERSION, '7.1.0') >= 0)
    {
        ini_set('session.sid_bits_per_character','6'); #replacement for hash_function
        ini_set('session.sid_length','256');
        $sessionsettings += array(
            'sid_bits_per_character'=> '6',
            'sid_length'=>'256');
    }
    else if (version_compare(PHP_VERSION, '5.3.0') >= 0)
    {
        ini_set('session.hash_function','SHA512'); # 5 = (see http://php.net/manual/en/function.hash-algos.php)
        ini_set('session.hash_bits_per_character','6'); #Removed from PHP7.1.0
        $sessionsettings += array(
            'hash_function'=> 'SHA512',
            'hash_bits_per_character'=>'6');
    } 
    else if (version_compare(PHP_VERSION, '5.0.0') >= 0)
    {
        ini_set('session.hash_function','1'); # 0 (MD5 128 bits) / 1 (SHA-1 160 bits) See https://stackoverflow.com/q/40805079
        $sessionsettings += array('session.hash_function'=>'1');
    }
    else
    {
        
    }

    # not include the identifier in the URL, and not to read the URL for identifiers.
    session_name('Tuneshop');
    ini_set('session.name', 'Tuneshop');
    ini_set('session.use_trans_sid','0'); # When use_trans_sid is enabled, PHP will pass the session ID via the URL. This makes the application more vulnerable to session hijacking attacks. Session hijacking is basically a form of identity theft wherein a hacker impersonates a legitimate user by stealing his session ID. When the session token is transmitted in a cookie, and the request is made on a secure channel (that is, it uses SSL), the token is secure.
    ini_set('session.use_strict_mode', '1');
    ini_set('session.cookie_httponly', '1'); # XSS beveiliging https://www.simonholywell.com/post/2013/05/improve-php-session-cookie-security/
    ini_set('session.use_only_cookies', '1'); # Make sure that PHP only uses cookies for sessions and disallow session ID passing as a GET parameter
    ini_set('session.entropy_file', '/dev/urandom');  // better session id's
    ini_set('session.entropy_length', 512); // and going overkill with entropy length for maximum security
    ini_set('session.cookie_secure','1'); # Ensuring session cookies are only sent over secure connections
    ini_set('expose_php','off'); # When the expose_php directive is enabled, PHP includes the following line in the HTTP response header when a PHP page is requested (X-Powered-By: PHP VERSIONNUJMBER)
    $sessionsettings += array(
        'name' => 'Tuneshop',
        'use_trans_sid' => '0',
        'use_strict_mode' => '1',
        'cookie_httponly' => '1',
        'use_only_cookies' => '1',
        'entropy_file' => '/dev/urandom',
        'entropy_length' => 512,
        'cookie_secure' => '1'
    );

    session_name('Tuneshop');
    session_start($sessionsettings);

    if (isset($_SESSION['forgetsession']) && $_SESSION['forgetsession'])
    {
        ini_set('session.cookie_lifetime','0'); #only set cookie for this browser session
        session_set_cookie_params(0);
        $sessionsettings += array(
            'cookie_lifetime' => 0,
            'gc_maxlifetime' => 0);
    }
else
    {
        $lifetime = 604800;
        ini_set('session.cookie_lifetime', $lifetime); # 1 week (client-site) https://stackoverflow.com/a/16965363
        ini_set('gc_maxlifetime', $lifetime); #set cookie garbage collection to 1 week (server-side)
        session_set_cookie_params($lifetime);
        $sessionsettings += array(
            'cookie_lifetime' => $lifetime,
            'gc_maxlifetime' => $lifetime);
    }

    session_regenerate_id(true); # https://stackoverflow.com/a/33652905 and https://www.owasp.org/index.php/Session_fixation
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

