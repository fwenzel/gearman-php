gearman-php
===========

*gearman-php* is a convenience wrapper for the [Gearman](http://gearman.org) 
[PEAR Library](http://pear.php.net/package/Net_Gearman/).

With gearman-php, you can code workers as well as clients in PHP with minimal
overhead in your application. Server connections etc. all take place in
gearman-php and don't unnecessarily clog your application code.

Requirements
------------
You want to install the Net_Gearman library off PEAR (at the time of writing:
version 0.2.3):
    pear install Net_Gearman-0.2.3

Licensing
---------
This software is licensed under the [Mozilla Tri-License](http://www.mozilla.org/MPL/):

> ***** BEGIN LICENSE BLOCK *****
> Version: MPL 1.1/GPL 2.0/LGPL 2.1
> 
> The contents of this file are subject to the Mozilla Public License Version 
> 1.1 (the "License"); you may not use this file except in compliance with 
> the License. You may obtain a copy of the License at 
> http://www.mozilla.org/MPL/
> 
> Software distributed under the License is distributed on an "AS IS" basis,
> WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License
> for the specific language governing rights and limitations under the
> License.
> 
> The Original Code is gearman-php.
> 
> The Initial Developer of the Original Code is
> Frederic Wenzel <fwenzel@mozilla.com>.
> Portions created by the Initial Developer are Copyright (C) 2009
> the Initial Developer. All Rights Reserved.
> 
> Contributor(s):
> 
> Alternatively, the contents of this file may be used under the terms of
> either the GNU General Public License Version 2 or later (the "GPL"), or
> the GNU Lesser General Public License Version 2.1 or later (the "LGPL"),
> in which case the provisions of the GPL or the LGPL are applicable instead
> of those above. If you wish to allow use of your version of this file only
> under the terms of either the GPL or the LGPL, and not to allow others to
> use your version of this file under the terms of the MPL, indicate your
> decision by deleting the provisions above and replace them with the notice
> and other provisions required by the GPL or the LGPL. If you do not delete
> the provisions above, a recipient may use your version of this file under
> the terms of any one of the MPL, the GPL or the LGPL.
> 
> ***** END LICENSE BLOCK *****

