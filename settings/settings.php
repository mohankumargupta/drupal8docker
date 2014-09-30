<?php
$conf['build_env'] = 'dev';

$databases = array (
  'default' =>
  array (
    'default' =>
    array (
      'database' => 'quality',
      'username' => 'quality',
      'password' => 'quality',
      'host' => 'localhost',
      'port' => '',
      'driver' => 'mysql',
      'prefix' => '',
    ),
  ),
);

$update_free_access = TRUE;
$drupal_hash_salt = 'DbnOHpTNHNdH3HHvaE0Z5WN1JS7scM4iMzGy8V-qAgQ';

$base_url = 'http://tom.dev.quality-bmj-com.internal.bmjgroup.com';  // NO trailing slash!
$conf['base_url'] = 'http://@apache.servername@';  // NO trailing slash!

# Enable external staging
if ($_SERVER['HTTP_HOST'] == 'staging.quality-bmj-com.external.bmjgroup.com') {
  $base_url = 'http://staging.quality-bmj-com.external.bmjgroup.com';  // NO trailing slash!
  $conf['base_url'] = 'http://staging.quality-bmj-com.external.bmjgroup.com';  // NO trailing slash!
}

$conf['ics_base_url']  = 'http://dev.myaccount-bmj-com.internal.bmjgroup.com';
$conf['ics_api_url']   = 'http://dev.myaccount-bmj-com.internal.bmjgroup.com/myaccount/restService-v4.0';
$conf['ics_reset_url'] = $conf['ics_base_url'] . '/email-password.html';

$conf['myaccount_url'] = 'http://dev.myaccount-bmj-com.internal.bmjgroup.com/myaccount';
$conf['myaccount_password_url'] = 'http://dev.myaccount-bmj-com.internal.bmjgroup.com/myaccount/email-password.html';
$conf['myaccount_registration_url'] = 'http://dev.myaccount-bmj-com.internal.bmjgroup.com/myaccount/signup.html';

$conf['portfolio_base_url'] = 'http://dev.portfolio-bmj-com.internal.bmjgroup.com';

$cookie_domain = '.internal.bmjgroup.com';

$conf['reverse_proxy'] = FALSE;
$conf['reverse_proxy_addresses'] = array();

$conf['404_fast_paths_exclude'] = '/\/(?:styles)\//';
$conf['404_fast_paths'] = '/\.(?:txt|png|gif|jpe?g|css|js|ico|swf|flv|cgi|bat|pl|dll|exe|asp)$/i';
$conf['404_fast_html'] = '<html xmlns="http://www.w3.org/1999/xhtml"><head><title>404 Not Found</title></head><body><h1>Not Found</h1><p>The requested URL "@path" was not found on this server.</p></body></html>';

ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 100);
ini_set('session.gc_maxlifetime', 200000);
ini_set('session.cookie_lifetime', 2000000);

error_reporting(E_ALL);
ini_set('display_errors', '1');


