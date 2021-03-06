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
require_once('Net/Gearman/Client.php');

class Gearman_Client extends Net_Gearman_Client {
    /**
     * Constructor: connect to servers from config file
     */
    public function __construct($servers = null, $timeout = null) {
        if (!$servers && count(Gearman_Config::$servers))
            $servers = Gearman_Config::$servers;

        if (!$timeout && Gearman_Config::$timeout)
            $timeout = Gearman_Config::$timeout;
        else
            $timeout = $this->$timeout;

        return parent::__construct($servers, $timeout);
    }

    /**
     * Convenience wrapper for running a task.
     * @param string $job name of job to be ran
     * @param array $args arguments for the job
     * @param callback $complete PHP callback to be executed on completion
     *        (needs to accept: $job, $handle, $result)
     * @return void
     */
    public function execute($job, $args=array(), $complete=null) {
        $task = new Net_Gearman_Task($job, $args);
        if (is_callable($complete))
            $task->attachCallback($complete, Net_Gearman_Task::TASK_COMPLETE);

        $set = new Net_Gearman_Set();
        $set->addTask($task);

        $this->runSet($set);
    }
}
