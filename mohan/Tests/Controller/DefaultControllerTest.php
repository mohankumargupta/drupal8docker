<?php

/**
 * @file
 * Contains Drupal\mohan\Tests\DefaultController.
 */

namespace Drupal\mohan\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Provides automated tests for the mohan module.
 */
class DefaultControllerTest extends WebTestBase
{


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
