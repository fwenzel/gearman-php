<?php
/**
 * Workers only:
 * Job path. Default is ./jobs/
 */
define('NET_GEARMAN_JOB_PATH', dirname(__FILE__).'/jobs');
/**
 * Workers only:
 * Class prefix for jobs. Example: If prefix is 'Prefix_', job classes
 * need to be called 'Prefix_MyJob' insite $job_path/MyJob.php.
 */
define('NET_GEARMAN_JOB_CLASS_PREFIX', 'Job_');

class Gearman_Config {
    /**
     * gearman server info. array of server configs.
     */
    static $servers = array(
        'localhost:4730', // if port is undefined, 4730 is the default.
    );

    /**
     * Server connection timeout
     */
    static $timeout = 1000;

    /**
     * Workers only:
     * 'Abilities' are the job names you want this worker to execute.
     * Null means, all .php files in $job_path are considered jobs.
     */
    static $abilities = null;
        //array(
        /* to add a job without a timeout: */
        // 'MyJob',

        /* to add a job with a timeout: */
        // array('MyJob', 1000),
        //);

}

