<?php
function isLoggedin()
{
    if (isset($_SESSION['UserName']) && $_SESSION['UserName'] !== '')
    {
        return true;
    } else {
        false;
    }
}

function isAdmin()
{
    if (isset($_SESSION['UserName']) && $_SESSION['UserName'] !== '' && ($_SESSION['UserName'] == 'lotus' || $_SESSION['UserName'] == 'janwil'))
    {
        return true;
    } else {
        false;
    }
}

function hasError()
{
    if (isset($_SESSION['error']) && $_SESSION['error'] !== '')
    {
        return true;
    } else {
        false;
    }
}

function avtarUrl()
{

}

function logout()
{
    fullydestroysession();
    session_destroy();
    session_unset();
}