<?php
class block_intrigueview_edit_form extends block_edit_form {
  
  protected function specific_definition($mform) {
    // Get the header that relates to the language
    $mform->addElement('header', 'configheader', get_string('blocksettings','block'));
    
    // Add Configurations
    $mform->addElement('text', 'config_text', get_string('feedInputHead', 'block_intrigueview'));
    $mform->setDefault('config_text', 'FEED');
    $mform->setType('config_text', PARAM_RAW);
  }
  
}

?>
