; The Drush Make API version. This should always be 2.
api = 2

; The version of Drupal the profile is built for. Although you can leave this
; as '7.x', it's better to be precise and define the exact version of core your
; distribution works with.
core = 7.x

projects[drupal][type] = core
projects[drupal][version] = 7.23

;patch for ...
;projects[drupal][patch][] = http://drupal.org/files/issues
