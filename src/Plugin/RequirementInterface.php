<?php

/**
 * Copyright 2019 Google LLC
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License version 2 as published by the
 * Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public
 * License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc., 51
 * Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 */

namespace Drupal\requirement\Plugin;

use Drupal\Core\Form\FormStateInterface;

/**
 * Defines an interface for the requirement plugin.
 */
interface RequirementInterface {

  /**
   * Returns the ID of the plugin.
   *
   * @return string
   *   The plugin ID.
   */
  public function getId(): string;

  /**
   * Returns the requirement group this belongs to.
   *
   * @return \Drupal\requirement\Plugin\RequirementGroupInterface|null
   */
  public function getGroup():? RequirementGroupInterface;

  /**
   * Returns the label for the requirement.
   *
   * @return string
   *   The requirement label.
   */
  public function getLabel(): string;

  /**
   * Returns the description for the requirement.
   *
   * @return string
   *   The requirement description.
   */
  public function getDescription(): string;

  /**
   * Returns the form for the requirement.
   *
   * @return string|null
   *   The form class for the requirement.
   */
  public function getForm(): ?string;

  /**
   * Returns the label for the action button.
   *
   * @return string|null
   *   The label for the action button.
   */
  public function getActionButtonLabel(): ?string;

  /**
   * A renderable array for the action button.
   *
   * @return array
   *   A renderable array for the action button.
   */
  public function getActionButton(): array;

  /**
   * Returns the severity of the requirement.
   *
   * @return string
   *   The severity of the requirement.
   */
  public function getSeverity(): string;

  /**
   * Returns the dependencies for this requirement.
   *
   * @return array
   *   An array of dependencies.
   */
  public function getDependencies(): array;

  /**
   * Returns the configuration form array for the plugin.
   *
   * @param array $form
   *   The form array.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The form state.
   *
   * @return array
   *   A form array.
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state): array;

  /**
   * Submit callback for the configuration form.
   *
   * @param array $form
   *   The form array.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The form state.
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state);

  /**
   * Callback to determine if the requirement is applicable.
   *
   * @return bool
   *   TRUE is the requirement is applicable. FALSE otherwise.
   */
  public function isApplicable(): bool;

  /**
   * Returns TRUE if the requirement is met.
   *
   * @return bool
   *   TRUE if the requirement is met.
   */
  public function isCompleted(): bool;

  /**
   * Determines if the requirement can be resolved.
   *
   * @return bool
   *   TRUE if requirement can be resolved. FALSE otherwise.
   */
  public function isResolvable(): bool;

}
