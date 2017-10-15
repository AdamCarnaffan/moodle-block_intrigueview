<?php
class block_intrigueview_edit_form extends block_edit_form {

  protected function specific_definition($mform) {
    // Get the header that relates to the language
    $mform->addElement('header', 'configheader', get_string('blocksettings','block'));

    // Add Configurations
    // Block Title
    $mform->addElement('text', 'config_title', get_string('feedTitleConfig', 'block_intrigueview'));
    $mform->setDefault('config_title', get_string('defaultTitle', 'block_intrigueview'));
    $mform->setType('config_title', PARAM_RAW);
    // Feed URL
    $mform->addElement('text', 'config_url', get_string('feedURLConfig', 'block_intrigueview'));
    $mform->setDefault('config_url', '');
    $mform->setType('config_url', PARAM_RAW);
    // Site URL (to view the display site)
    $mform->addElement('text', 'config_site', get_string('feedSiteConfig', 'block_intrigueview'));
    $mform->setDefault('config_site', '');
    $mform->setType('config_site', PARAM_RAW);
  }

}

?>
