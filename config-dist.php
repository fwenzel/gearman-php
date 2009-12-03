<?php
class Gearman_Config {
    /**
     * gearman server info. array of server configs.
     */
    public static $servers = array(
        'localhost:7003', // if port is undefined, 7003 is the default.
    );

    /**
     * Server connection timeout
     */
    public static $timeout = 1000;

    /**
     * Workers only:
     * Job path. Default is ./jobs/
     */
    public static $job_path = dirname(__FILE__).'/jobs';

    /**
     * Workers only:
     * Class prefix for jobs. Example: If prefix is 'Prefix_', job classes
     * need to be called 'Prefix_MyJob' insite $job_path/MyJob.php.
     */
    public static $class_prefix = '';

    /**
     * Workers only:
     * 'Abilities' are the job names you want this worker to execute.
     * Empty array means, all .php files in $job_path.
     */
    public static $abilities = array();
}
