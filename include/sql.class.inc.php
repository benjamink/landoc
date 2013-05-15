<?php
require_once('DB.php');

/**
 * SQL methods
 *
 * @package SQL
 * @author Benjamin Krein <superbenk@superk.org>
 */
class SQL_Tools
{
	var $dsn;
	var $options;
	var $db;
	var $qcachedir;
	var $qcacheexp;
		
    /**
     * SQL_Tools - Class constructor
     * 
     * Constructor requires an array ($dsn) that must be passed
     * to create a connection.  Options can be added in addition
     * through the optional $options array.
     *
     * @param array $dsn Connection parameters for building a DSN
     * @param array $options (Optional) Additional DB connection parameters
     */
	function SQL_Tools($dsn, $options=null)
	{
		$this->dsn = $dsn;
		$this->options = $options;
		$this->dbConnect();
	}
	
	/**
	 * Generic DB connection method
	 *
	 * Takes parameters for DSN and optional options
	 * and creates a DB connection object using Pear's 
	 * DB class.
	 *
	 * @global array $dsn Connection parameters for building a DSN
	 * @global array $options (Optional) Additional DB connection parameters
	 * @return object $db DB connection object
	 */
	function dbConnect()
	{
		$db =& DB::connect($this->dsn, $this->options);

		if(DB::isError($db)) {
			$this->db_conn = 1;
			return $db->getMessage();
		}

		$this->db = $db;
		return $this->db;
	}
	
	/**
	 * Query error checking
	 *
	 * Check the results of a query request.  If the query was run
	 * successfully, return ERRORCODE 0, else die with an error
	 * message.
	 *
	 * @param array $res Query result to test
	 * @return string Error message if query failed
	 */
	function dbChkError($res)
	{
		if(DB::isError($res)) {
			echo $res->getMessage();
			die;
		}
		return 0;
	}
	
	/**
	 * Instantiate query cache
	 *
	 * @param string $qdir Directory path to the query cache
	 * @param int $exp Expiration (in seconds) for the cache file
	 */
	function useCache($qdir, $exp=300)
	{
		$this->qcachedir = $qdir;
		$this->qcacheexp = $exp;	
	}
	
	/**
	 * Cache query results to/from a file
	 *
	 * Serialize the results of a query and cache the results
	 * to a local file if the cache does not exist or is expired.
	 * If the cache exists and is still valid, return the results of the
	 * cache instead.
	 *
	 * @param string $fname Name for the cache file
	 * @param object $db DB connection object
	 * @param string $query Query to pass
	 * @return array $res The results of the query either from the DB or cache
	 */
	function qCache($fname,$query,$mode=DB_FETCHMODE_OBJECT)
	{
		$file = $this->qcachedir.$fname;
		
		if($this->db_conn > 0 || (file_exists($file) && filemtime($file) > (time() - $this->qcacheexp))) {
			$res = unserialize(file_get_contents($file));
		} else {
			$res = $this->db->getAll($query,$mode);

			$this->dbChkError($res);
			
			$out = serialize($res);
			$fp = fopen($file, 'w');
			fputs($fp, $out);
			fclose($fp);
		}
		return $res;		
	}
}
?>