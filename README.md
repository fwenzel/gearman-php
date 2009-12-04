# gearman-php #

*gearman-php* is a convenience wrapper for the [Gearman](http://gearman.org)
[PEAR Library](http://pear.php.net/package/Net_Gearman/).

With gearman-php, you can code workers as well as clients in PHP with minimal
overhead in your application. Server connections etc. all take place in
gearman-php and don't unnecessarily clog your application code.

## Requirements ##
You want to install the Net_Gearman library off PEAR (at the time of writing:
version 0.2.3):
    pear install Net_Gearman-0.2.3

## Using gearman-php ##
### As a client ###
Take a look at example-client.php -- this example works out of the box. If you
edit the config file and start the gearman worker (see below), you can (in
another shell) simply execute
    php example-client.php
to see gearman-php in action.

In your own application, using the gearman client is as simple as:
    function complete($job, $handle, $result) {
        echo "Finished $job:\n";
        print_r($result);
    }
    require_once('/path/to/gearman-php/gearman-client.php');
    $client = new Gearman_Client();
    $client->execute('MyJob', array('my input'), 'complete');

### As a worker ###
Put a checkout of gearman-php somewhere convenient on your worker box and edit
the config file. Place some worker jobs into the jobs/ directory. For an example
on how to code a Job, look at jobs/Example.php.

When this is done, just run:
    php gearman-worker.php

The script will connect to the server(s), wait for input, and process work as it
comes along. As the script will keep running (waiting for and processing work),
you want to run it in a *screen* session or similar.

## Licensing ##
This software is licensed under the [Mozilla Tri-License](http://www.mozilla.org/MPL/):

    ***** BEGIN LICENSE BLOCK *****
    Version: MPL 1.1/GPL 2.0/LGPL 2.1

    The contents of this file are subject to the Mozilla Public License Version
    1.1 (the "License"); you may not use this file except in compliance with
    the License. You may obtain a copy of the License at
    http://www.mozilla.org/MPL/

    Software distributed under the License is distributed on an "AS IS" basis,
    WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License
    for the specific language governing rights and limitations under the
    License.

    The Original Code is gearman-php.

    The Initial Developer of the Original Code is
    Frederic Wenzel <fwenzel@mozilla.com>.
    Portions created by the Initial Developer are Copyright (C) 2009
    the Initial Developer. All Rights Reserved.

    Contributor(s):

    Alternatively, the contents of this file may be used under the terms of
    either the GNU General Public License Version 2 or later (the "GPL"), or
    the GNU Lesser General Public License Version 2.1 or later (the "LGPL"),
    in which case the provisions of the GPL or the LGPL are applicable instead
    of those above. If you wish to allow use of your version of this file only
    under the terms of either the GPL or the LGPL, and not to allow others to
    use your version of this file under the terms of the MPL, indicate your
    decision by deleting the provisions above and replace them with the notice
    and other provisions required by the GPL or the LGPL. If you do not delete
    the provisions above, a recipient may use your version of this file under
    the terms of any one of the MPL, the GPL or the LGPL.

    ***** END LICENSE BLOCK *****

