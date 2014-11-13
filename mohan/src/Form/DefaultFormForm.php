<?php

/**
 * @file
 * Contains Drupal\mohan\Form\DefaultFormForm.
 */

namespace Drupal\mohan\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Entity\EntityManager;

class DefaultFormForm extends ConfigFormBase
{

  /**
   * Drupal\Core\Entity\EntityManager definition.
   *
   * @var Drupal\Core\Entity\EntityManager
   */
  protected $entity_manager;

  public function __construct(
    ConfigFactoryInterface $config_factory,
    EntityManager $entity_manager
  ) {
    parent::__construct($config_factory);
    $this->entity_manager = $entity_manager;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('entity.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormID() {
    return 'default_form_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('mohan.default_form_form_config');
    $form['boo'] = [
      '#type' => 'textfield',
      '#title' => $this->t('boo'),
      '#description' => $this->t(''),
      '#default_value' => $config->get('boo'),
    ];
    $form['moo'] = [
      '#type' => 'datetime',
      '#title' => $this->t('moo'),
      '#description' => $this->t(''),
      '#default_value' => $config->get('moo'),
    ];
    $form['lastname'] = [
      '#type' => 'textfield',
      '#title' => $this->t('lastname'),
      '#description' => $this->t(''),
      '#default_value' => $config->get('lastname'),
    ];
    $form['telephone'] = [
      '#type' => 'tel',
      '#title' => $this->t('Telephone'),
      '#description' => $this->t(''),
      '#default_value' => $config->get('telephone'),
    ];
    $form['color'] = [
      '#type' => 'color',
      '#title' => $this->t('Color'),
      '#description' => $this->t(''),
      '#default_value' => $config->get('color'),
    ];
    $form['dontknow'] = [
      '#type' => 'range',
      '#title' => $this->t('dontknow'),
      '#description' => $this->t(''),
      '#default_value' => $config->get('dontknow'),
    ];
    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('email'),
      '#description' => $this->t(''),
      '#default_value' => $config->get('email'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    return parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('mohan.default_form_form_config')
          ->set('boo', $form_state->getValue('boo'))
          ->set('moo', $form_state->getValue('moo'))
          ->set('lastname', $form_state->getValue('lastname'))
          ->set('telephone', $form_state->getValue('telephone'))
          ->set('color', $form_state->getValue('color'))
          ->set('dontknow', $form_state->getValue('dontknow'))
          ->set('email', $form_state->getValue('email'))
        ->save();
  }
}
