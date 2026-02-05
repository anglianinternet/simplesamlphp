<?php
// _bootstrap.php — set SIMPLESAMLPHP_UPSTREAM in .user.ini (env var) to repo root
$upstream = getenv('SIMPLESAMLPHP_UPSTREAM') ?: ($_SERVER['SIMPLESAMLPHP_UPSTREAM'] ?? '');
$base = $upstream !== '' ? (realpath($upstream) ?: rtrim($upstream, '/\\')) : realpath(__DIR__ . '/..');
define('SIMPLESAMLPHP_UPSTREAM', $base);
