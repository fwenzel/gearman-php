<?php
class Gearman_Config {
    /**
     * gearman server info. array of server configs.
     */
    public $servers = array(
        'localhost:4730', // if port is undefined, 4730 is the default.
    );

    /**
     * Server connection timeout
     */
    public $timeout = 1000;

    /**
     * Workers only:
     * Job path. Default is ./jobs/
     */
    public $job_path = null;

    /**
     * Workers only:
     * Class prefix for jobs. Example: If prefix is 'Prefix_', job classes
     * need to be called 'Prefix_MyJob' insite $job_path/MyJob.php.
     */
    public $class_prefix = '';

    /**
     * Workers only:
     * 'Abilities' are the job names you want this worker to execute.
     * Null means, all .php files in $job_path are considered jobs.
     */
    public $abilities = null;
        //array(
        /* to add a job without a timeout: */
        // 'MyJob',

        /* to add a job with a timeout: */
        // array('MyJob', 1000),
        //);

    /**
     * some defaults. Don't edit this.
     */
    public function __construct() {
        if (!empty($this->job_path)) $this->job_path = dirname(__FILE__).'/jobs';
    }
}
