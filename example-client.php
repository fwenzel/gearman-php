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

$here = dirname(__FILE__);
require_once($here.'/config.php');
require_once($here.'/gearman-client.php');

// instantiate and run this example, if it was called from the CLI
if (defined('STDIN')) {
    $reversible = 'The quick brown fox jumped over the lazy dog.';

    try {
        echo "Instantiating new Client...\n";
        $client = new Gearman_Client();

        echo "Executing a new 'Example' Task:\n";
        echo "Reverse the string '{$reversible}'.\n";
        $client->execute('Example', array($reversible), 'complete');

    } catch (Net_Gearman_Exception $e) {
        echo $e->getMessage() . "\n";
        exit(1);
    }
} else {
    die("Please run me from the CLI!\n");
}

/**
 * Callback, executed on job completion
 * @param string $job job name, e.g. 'Example'
 * @param string $handle unique task handle
 * @param array $result job result
 */
function complete($job, $handle, $result) {
    echo "Received result from Job '$job':\n";
    foreach ($result as $line)
        echo "{$line}\n";
}

