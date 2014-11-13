<?php

/**
 * @file
 * Contains Drupal\mohan\Form\DefaultEntityForm.
 */

namespace Drupal\mohan\Form;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;

class DefaultEntityForm extends EntityForm
{

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $default_entity = $this->entity;
    $form['label'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $default_entity->label(),
      '#description' => $this->t("Label for the DefaultEntity."),
      '#required' => TRUE,
    );

    $form['id'] = array(
      '#type' => 'machine_name',
      '#default_value' => $default_entity->id(),
      '#machine_name' => array(
        'exists' => 'default_entity_load',
      ),
      '#disabled' => !$default_entity->isNew(),
    );

    // You will need additional form elements for your custom properties.

    return $form;
  }

  /**
  * {@inheritdoc}
  */
  public function save(array $form, FormStateInterface $form_state) {
    $default_entity = $this->entity;
    $status = $default_entity->save();

    if ($status) {
      drupal_set_message($this->t('Saved the %label DefaultEntity.', array(
        '%label' => $default_entity->label(),
      )));
    }
    else {
      drupal_set_message($this->t('The %label DefaultEntity was not saved.', array(
        '%label' => $default_entity->label(),
      )));
    }
    $form_state->setRedirect('default_entity.list');
  }
}
