<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Defines the editing form for the aiessay question type.
 *
 * @package    qtype
 * @subpackage aiessay
 * @copyright  2024 Jesse Songok (YOURCONTACTINFO)

 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();


/**
 * aiessay question editing form definition.
 *
 * @copyright  2024 Jesse Songok (YOURCONTACTINFO)

 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class qtype_aiessay_edit_form extends question_edit_form {

    protected function definition_inner($mform) {
        //Add fields specific to this question type
        // Add the fields for the question prompt.
        $mform->addElement('textarea', 'questiontext', get_string('questiontext', 'qtype_aiessay'), array('rows' => 10, 'cols' => 80));
        $mform->setType('questiontext', PARAM_RAW);

        // Add any additional custom fields, like AI grading criteria.
        $mform->addElement('textarea', 'gradingcriteria', get_string('gradingcriteria', 'qtype_aiessay'), array('rows' => 5, 'cols' => 80));
        $mform->setType('gradingcriteria', PARAM_RAW);
        $mform->addHelpButton('gradingcriteria', 'gradingcriteria', 'qtype_aiessay');

        //remove any that come with the parent class you don't want
        
        // To add combined feedback (correct, partial and incorrect).
        $this->add_combined_feedback_fields(true);
        // Adds hinting features.
        $this->add_interactive_settings(true, true);
    }

    protected function data_preprocessing($question) {
        $question = parent::data_preprocessing($question);
        $question = $this->data_preprocessing_hints($question);

        return $question;
    }

    public function qtype() {
        return 'aiessay';
    }
}
