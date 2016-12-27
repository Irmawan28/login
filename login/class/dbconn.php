<?php
class DbConn
{
    private $db_name;
    private $host;
    private $username;
    private $password;
    /**
    * PDO Connection object
    * @var object
    */
    protected $conn;
    /**
     * Database Table Prefix
     * @var string
     */
    protected $tbl_prefix;
    /**
    * Table where basic user data is stored
    * @var string
    */
    protected $tbl_members;
    /**
    * Table where user profile info is stored
    * @var string
    */
    protected $tbl_memberinfo;
    /**
    * Admin table
    * @var string
    */
    protected $tbl_admins;
    /**
    * Table where login attempts are logged
    * @var string
    */
    protected $tbl_attempts;
    /**
    * Table where deleted users are stored temporarily
    * @var string
    */
    protected $tbl_deleted;
    /**
    * Table that JWT tokens are validated against
    * @var string
    */
    protected $tbl_tokens;
    /**
    * Table that cookies are stored and validated against
    * @var string
    */
    protected $tbl_cookies;
    /**
    * Table where main application configuration is stored
    * @var string
    */
    protected $tbl_appConfig;

    function __construct()
    {
    /**
    * Pulls tables from
    **/
        $up_dir = realpath(__DIR__ . '/..');

        if (file_exists('dbconf.php')) {
            require 'dbconf.php';
        } else {
            require $up_dir.'/dbconf.php';
        }
        $this->tbl_prefix = $tbl_prefix;
        $this->tbl_members = $tbl_members;
        $this->tbl_memberinfo = $tbl_memberinfo;
        $this->tbl_admins = $tbl_admins;
        $this->tbl_attempts = $tbl_attempts;
        $this->tbl_deleted = $tbl_deleted;
        $this->tbl_tokens = $tbl_tokens;
        $this->tbl_cookies = $tbl_cookies;
        $this->tbl_appConfig = $tbl_appConfig;

        // Connect to server and select database
        try {
            $this->conn = new PDO('mysql:host='.$host.';dbname='.$db_name.';charset=utf8', $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {

            die($e->getMessage());

        }
    }
}