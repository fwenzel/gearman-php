<?php
/* ***** BEGIN LICENSE BLOCK *****
 * Version: MPL 1.1/GPL 2.0/LGPL 2.1
 *
 * The contents of this file are subject to the Mozilla Public License Version
 * 1.1 (the "License"); you may not use this file except in compliance with
 * the License. You may obtain a copy of the License at
 * http://www.mozilla.org/MPL/
 *
 * Software distributed under the License is distributed on an "AS IS" basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License
 * for the specific language governing rights and limitations under the
 * License.
 *
 * The Original Code is gearman-php.
 *
 * The Initial Developer of the Original Code is
 * Frederic Wenzel <fwenzel@mozilla.com>.
 * Portions created by the Initial Developer are Copyright (C) 2009
 * the Initial Developer. All Rights Reserved.
 *
 * Contributor(s):
 *
 * Alternatively, the contents of this file may be used under the terms of
 * either the GNU General Public License Version 2 or later (the "GPL"), or
 * the GNU Lesser General Public License Version 2.1 or later (the "LGPL"),
 * in which case the provisions of the GPL or the LGPL are applicable instead
 * of those above. If you wish to allow use of your version of this file only
 * under the terms of either the GPL or the LGPL, and not to allow others to
 * use your version of this file under the terms of the MPL, indicate your
 * decision by deleting the provisions above and replace them with the notice
 * and other provisions required by the GPL or the LGPL. If you do not delete
 * the provisions above, a recipient may use your version of this file under
 * the terms of any one of the MPL, the GPL or the LGPL.
 *
 * ***** END LICENSE BLOCK ***** */

require_once(dirname(__FILE__).'/config.php');
require_once('Net/Gearman/Worker.php');

class Gearman_Worker extends Net_Gearman_Worker {
    /**
     * Constructor: connect to servers from config file
     */
    public function __construct($servers = null, $id = null) {
        if (!$servers && count(Gearman_Config::$servers))
            $servers = Gearman_Config::$servers;

        parent::__construct($servers, $id);

        $this->_registerAbilities();
    }

    /**
     * registers abilities as specified in the config file
     */
    private function _registerAbilities() {
        $abilities = Gearman_Config::$abilities;
        if (empty($abilities)) {
            $abilities = array();
            if ($handle = opendir(NET_GEARMAN_JOB_PATH)) {
                while (false !== ($file = readdir($handle))) {
                    if (substr($file, -4) === '.php') {
                        $abilities[] = substr($file, 0, -4);
                    }
                }
                closedir($handle);
            }
        }
        foreach ($abilities as $ability) {
            echo "Adding ability '{$ability}'\n";
            if (is_array($ability))
                $this->addAbility($ability[0], $ability[1]);
            else
                $this->addAbility($ability);
        }
    }
}

// instantiate and run this worker, if it was called from the CLI
if (defined('STDIN')) {
    try {
        $gearman_worker = new Gearman_Worker();
        echo "Starting to work...\n";
        $gearman_worker->beginWork();
    } catch (Net_Gearman_Exception $e) {
        echo $e->getMessage() . "\n";
        exit(1);
    }
}

