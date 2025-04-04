<?php
/**
 * Set env variables and enable error reporting in local environment
 */
require_once(__DIR__ . "/lib/env.php"); // sets global env variables (database configuration)
require_once(__DIR__ . "/lib/error_reporting.php"); // enables error reporting locally

/**
 * Start user session
 */
session_start();

/**
 * Require routing library
 *  allows handling request for different URL routes, i.e. /users, /products, etc.
 */
require_once(__DIR__ . "/lib/Route.php");

/**
 * Require routes
 *  Defines the routes that our application will ned
 */
require_once(__DIR__ . "/routes/index.php");
require_once(__DIR__ . "/routes/user.php");
require_once(__DIR__ . "/routes/pages.php");
require_once(__DIR__ . "/routes/login.php");
require_once(__DIR__ . "/routes/register.php");
require_once(__DIR__ . "/routes/reservation.php");
require_once(__DIR__ . "/routes/admin.php");
require_once(__DIR__ . "/routes/contact.php");
require_once(__DIR__ . '/routes/api.php');
require_once(__DIR__ . '/routes/review.php');

// Start the router, enabling handling requests
Route::run();
