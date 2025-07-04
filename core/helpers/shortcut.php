<?php

function app(): \Core\Core\Application
{
    return \Core\Core\Application::getApp();
}

function view(): \Core\Core\View
{
    return app()->getView();
}

function session(): \Core\Session\Session
{
    return app()->getSession();
}

function request(): \Core\Http\Request
{
    return app()->getRequest();
}

function db(): \Core\Database\Database
{
    return \Core\Database\Database::getInstance();
}

function response(): \Core\Http\Response
{
    return app()->getResponse();
}