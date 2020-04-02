<?php
function updateHtaccess($value){
  // write .htaccess
  // $Htaccess = file_get_contents('../.htaccess');
  if($value==1) {
    // enable www yes
    $Htaccess = 'RewriteEngine On
Options -Indexes
<IfModule mod_headers.c>
  Header set Access-Control-Allow-Origin "*"
</IfModule>

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_URI} (.+)/$
RewriteRule ^ %1 [R=301,L]

RewriteCond %{REQUEST_FILENAME} !-d 
RewriteCond %{REQUEST_FILENAME}\.php -f 
RewriteRule ^(.*)$ $1.php

RewriteCond %{THE_REQUEST} ^[A-Z]{3,}\s([^.]+)\.php [NC]
RewriteRule ^ %1 [R,L]

RewriteRule ^([0-9a-zA-Z-_-]+)$ user.php?seller_user_name=$1

RewriteCond %{HTTP_HOST} !=localhost
RewriteCond %{HTTP_HOST} !^www\.
RewriteRule (.*) https://www.%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

#Now, rewrite to HTTPS:
RewriteCond %{HTTPS} off
RewriteCond %{HTTP_HOST} !=localhost
RewriteRule (.*) https://www.%{HTTP_HOST}%{REQUEST_URI} [L,R=301]';
  }elseif($value==0){
    // enable www no
    $Htaccess = 'RewriteEngine On
Options -Indexes
<IfModule mod_headers.c>
  Header set Access-Control-Allow-Origin "*"
</IfModule>

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_URI} (.+)/$
RewriteRule ^ %1 [R=301,L]

RewriteCond %{REQUEST_FILENAME} !-d 
RewriteCond %{REQUEST_FILENAME}\.php -f 
RewriteRule ^(.*)$ $1.php

RewriteCond %{THE_REQUEST} ^[A-Z]{3,}\s([^.]+)\.php [NC]
RewriteRule ^ %1 [R,L]

RewriteRule ^([0-9a-zA-Z-_-]+)$ user.php?seller_user_name=$1

#Now, rewrite to HTTPS:
RewriteCond %{HTTPS} off
RewriteCond %{HTTP_HOST} !=localhost
RewriteRule (.*) https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]';
  }
  if(file_put_contents('../.htaccess', $Htaccess)){
    return true;
  }
}