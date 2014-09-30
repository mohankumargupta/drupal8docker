BMJ Quality Docker container
============================

What it expects
---------------

- settings.php (BMJ Quality Drupal settings file
- database.sql (mySQL dump of a BMJ Quality database)
- quality.make
- drupal-org-core.make
- supervisord.conf

...and that tom.dev.quality-bmj-com.internal.bmjgroup.com points to 127.0.0.1

Gotchas
-------

The Dockerfile script has to download a lot of files from various Ubuntu repositories and Drupal. Since websense gets in the way I have to proxy port 80 through bream.internal.bmjgroup.com (10.1.204.38). This is all sorts of bad, but then so is Websense? Suggestions welcome.
