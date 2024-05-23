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
 * Event observer to add SSO username
 *
 * @package    auth_jwt
 * @copyright  2024 Milt Reder <milt@yetanalytics.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace auth_jwt\observer;

defined('MOODLE_INTERNAL') || die();

class observer {

    public static function all_events(\core\event\base $event) {
        global $SESSION;

        // Check if SSO data is available in the session
        if (isset($SESSION->sso_username)) {
            // Inject SSO data into the event's other property
            $event->other['sso_username'] = $SESSION->sso_username;
        }

        // Log the event or do additional processing
        self::process_event($event);
    }

    private static function process_event(\core\event\base $event) {
        // Example processing of the event
        // You can log the event or handle it as needed
        // return $event;
    }
}
