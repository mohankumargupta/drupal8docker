<?php

/**
 * @file
 * Contains Drupal\mohan\Tests\DefaultController.
 */

namespace Drupal\mohan\Tests;

use Drupal\simpletest\WebTestBase;
use Drupal\contact\Access\ContactPageAccess;
use Drupal\Core\Utility\Token;
use Drupal\Core\Path\AliasManager;

/**
 * Provides automated tests for the mohan module.
 */
class DefaultControllerTest extends WebTestBase
{

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


  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return array(
      'name' => "mohan DefaultController's controller functionality",
      'description' => 'Test Unit for module mohan and controller DefaultController.',
      'group' => 'Other',
    );
  }

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
  }

  /**
   * Tests mohan functionality.
   */
  public function testDefaultController() {
    // Check that the basic functions of module mohan.
    $this->assertEqual(TRUE, TRUE, 'Test Unit Generated via App Console.');
  }
}
