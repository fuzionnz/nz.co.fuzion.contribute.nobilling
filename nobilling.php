<?php

require_once 'nobilling.civix.php';

/**
 * Implementation of hook_civicrm_config
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function nobilling_civicrm_config(&$config) {
  _nobilling_civix_civicrm_config($config);
}

/**
 * Implementation of hook_civicrm_xmlMenu
 *
 * @param $files array(string)
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function nobilling_civicrm_xmlMenu(&$files) {
  _nobilling_civix_civicrm_xmlMenu($files);
}

/**
 * Implementation of hook_civicrm_install
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function nobilling_civicrm_install() {
  return _nobilling_civix_civicrm_install();
}

/**
 * Implementation of hook_civicrm_uninstall
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function nobilling_civicrm_uninstall() {
  return _nobilling_civix_civicrm_uninstall();
}

/**
 * Implementation of hook_civicrm_enable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function nobilling_civicrm_enable() {
  return _nobilling_civix_civicrm_enable();
}

/**
 * Implementation of hook_civicrm_disable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function nobilling_civicrm_disable() {
  return _nobilling_civix_civicrm_disable();
}

/**
 * Implementation of hook_civicrm_upgrade
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed  based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function nobilling_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _nobilling_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implementation of hook_civicrm_managed
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function nobilling_civicrm_managed(&$entities) {
  return _nobilling_civix_civicrm_managed($entities);
}

/**
 * Implementation of hook_civicrm_caseTypes
 *
 * Generate a list of case-types
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function nobilling_civicrm_caseTypes(&$caseTypes) {
  _nobilling_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implementation of hook_civicrm_alterSettingsFolders
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function nobilling_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _nobilling_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implementation of hook_civicrm_buildForm.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC40/CiviCRM+hook+specification#CiviCRMhookspecification-hook_civicrm_buildForm
 */
function nobilling_civicrm_buildForm($formName, &$form) {
  switch ($formName) {
    case 'CRM_Contribute_Form_Contribution_Main':
    case 'CRM_Event_Form_Registration_Register':
      CRM_Core_Resources::singleton()->addScriptFile('nz.co.fuzion.contribute.nobilling', 'js/nobilling.js', TRUE);
      $fields_not_required = array(
        'billing_first_name',
        'billing_middle_name',
        'billing_last_name',
        'billing_street_address-5',
        'billing_city-5',
        'billing_state_province_id-5',
        'billing_postal_code-5',
        'billing_country_id-5',
      );
      foreach ($fields_not_required as $field) {
        $form->_paymentFields[$field]['is_required'] = FALSE;
      }
      break;
  }
}
