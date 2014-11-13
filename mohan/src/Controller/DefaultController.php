<?php

/**
 * @file
 * Contains Drupal\mohan\Controller\DefaultController.
 */

namespace Drupal\mohan\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\contact\Access\ContactPageAccess;
use Drupal\Core\Utility\Token;
use Drupal\Core\Path\AliasManager;

class DefaultController extends ControllerBase implements ContainerInjectionInterface {

  /**
   * Drupal\contact\Access\ContactPageAccess definition.
   *
   * @var Drupal\contact\Access\ContactPageAccess
   */
  protected $access_check_contact_personal;

  /**
   * Drupal\Core\Utility\Token definition.
   *
   * @var Drupal\Core\Utility\Token
   */
  protected $token;

  /**
   * Drupal\Core\Path\AliasManager definition.
   *
   * @var Drupal\Core\Path\AliasManager
   */
  protected $path_alias_manager;

  public function __construct(ContactPageAccess $access_check_contact_personal, Token $token, AliasManager $path_alias_manager) {
    $this->access_check_contact_personal = $access_check_contact_personal;
    $this->token = $token;
    $this->path_alias_manager = $path_alias_manager;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('access_check.contact_personal'),
      $container->get('token'),
      $container->get('path.alias_manager')
    );
  }

  /**
   * Hello.
   *
   * @return string
   *   Return Hello string.
   */
  public function hello($name) {
    return "Hello " . $name . " !";
  }
}
