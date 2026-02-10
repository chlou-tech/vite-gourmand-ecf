<?php

function isLoggedIn()
{
    return isset($_SESSION['user']);
}

function hasRole($roleId)
{
    return isset($_SESSION['user']) && $_SESSION['user']['role'] == $roleId;
}

function requireLogin()
{
    if (!isLoggedIn()) {
        header('Location: index.php?page=login');
        exit;
    }
}

function requireMinRole($roleMin)
{
    requireLogin();

    if ($_SESSION['user']['role'] < $roleMin) {
        echo "Accès refusé";
        exit;
    }
}
