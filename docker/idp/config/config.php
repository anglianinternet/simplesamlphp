<?php

/**
 * SimpleSAMLphp IdP — Anglian Internet Docker (see ../docker-compose.yml).
 * Default public URL: http://localhost:8088/simplesaml/ (host port SAML_IDP_PORT, default 8088).
 * NOTE: TESTING CONFIGURATION ONLY
 */

$config = [
    'baseurlpath' => 'simplesaml/',

    'application' => [
        'baseURL' => 'http://localhost:8088',
    ],

    'cachedir' => '/tmp/simplesamlphp-cache',
    'certdir' => '/var/repositories/simplesamlphp/cert',
    'metadatadir' => '/var/repositories/simplesamlphp/metadata',
    'metadata.sources' => [
        ['type' => 'flatfile', 'directory' => '/var/repositories/simplesamlphp/metadata'],
    ],

    'technicalcontact_name' => 'Admin',
    'technicalcontact_email' => 'admin@example.com',

    'secretsalt' => 'CHANGE_THIS_RANDOMLY',
    'auth.adminpassword' => 'secret',
    'admin.protectmetadata' => false,
    'admin.checkforupdates' => false,

    'trusted.url.domains' => ['localhost', '127.0.0.1'],
    'trusted.url.regex' => false,
    'enable.http_post' => true,

    'time.skew' => 300,
    'assertion.allowed_clock_skew' => 300,

    'showerrors' => true,
    'errorreporting' => true,
    'debug' => [
        'saml' => false,
        'backtraces' => true,
        'validatexml' => false,
    ],

    'logging.level' => SimpleSAML\Logger::DEBUG,
    'logging.handler' => 'file',
    'logging.dir' => '/var/repositories/simplesamlphp/data/log/',
    'logging.logfile' => 'simplesamlphp.log',
    'logging.processname' => 'simplesamlphp',
    'statistics.out' => [],

    'enable.saml20-idp' => true,
    'enable.adfs-idp' => false,

    'module.enable' => [
        'core' => true,
        'admin' => true,
        'saml' => true,
        'exampleauth' => true,
    ],

    'session.duration' => 8 * 3600,
    'session.datastore.timeout' => 4 * 3600,
    'session.state.timeout' => 3600,
    // Distinct from comms-billing and API SP cookies on localhost (all ports share host cookies).
    'session.cookie.name' => 'IDPSAMLSessionID',
    'session.cookie.lifetime' => 0,
    'session.cookie.path' => '/',
    'session.cookie.domain' => '',
    'session.cookie.secure' => false,
    'session.cookie.samesite' => null,
    'session.phpsession.cookiename' => 'IDPSAML',
    'session.phpsession.savepath' => null,
    'session.phpsession.httponly' => true,
    'session.authtoken.cookiename' => 'IDPSAMLAuthToken',
    'session.rememberme.enable' => false,
    'session.rememberme.checked' => false,
    'session.rememberme.lifetime' => 14 * 86400,

    'store.type' => 'phpsession',

    'language.default' => 'en',
    'language.available' => ['en'],
    'theme.use' => 'default',
    'template.auto_reload' => true,
    'production' => false,

    'metadata.sign.enable' => false,
    'metadata.sign.privatekey' => null,
    'metadata.sign.privatekey_pass' => null,
    'metadata.sign.certificate' => null,

    'authproc.idp' => [
        30 => 'core:LanguageAdaptor',
        50 => 'core:AttributeLimit',
        99 => 'core:LanguageAdaptor',
    ],

    'idpdisco.enableremember' => true,
    'idpdisco.rememberchecked' => true,
    'idpdisco.validate' => true,
    'idpdisco.extDiscoveryStorage' => null,
    'idpdisco.layout' => 'dropdown',
];
