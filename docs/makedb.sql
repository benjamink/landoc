BEGIN TRANSACTION;
CREATE TABLE users(
	u_id INTEGER PRIMARY KEY,
	added TIMESTAMP DEFAULT '0000-00-00 00:00:00',
	modified TIMESTAMP DEFAULT '0000-00-00 00:00:00',
	u_name VARCHAR(150) NOT NULL UNIQUE DEFAULT '',
	u_fname VARCHAR(255) NOT NULL DEFAULT '',
	u_lname VARCHAR(255) NOT NULL DEFAULT '',
	u_pass VARCHAR(255) NOT NULL DEFAULT ''
);

CREATE TABLE groups(
	g_id INTEGER PRIMARY KEY,
	added TIMESTAMP DEFAULT '0000-00-00 00:00:00',
	modified TIMESTAMP DEFAULT '0000-00-00 00:00:00',
	g_name VARCHAR(150) NOT NULL UNIQUE DEFAULT '',
	g_desc VARCHAR(255) NOT NULL DEFAULT '' 
);

CREATE TABLE usr_grp_join(
	ug_id INTEGER PRIMARY KEY,
	added TIMESTAMP DEFAULT '0000-00-00 00:00:00',
	modified TIMESTAMP DEFAULT '0000-00-00 00:00:00',
	u_name INTEGER NOT NULL DEFAULT '',
	g_name INTEGER NOT NULL DEFAULT ''
);

CREATE TABLE ent_obj_join(
	eo_id INTEGER PRIMARY KEY,
	added TIMESTAMP DEFAULT '0000-00-00 00:00:00',
	modified TIMESTAMP DEFAULT '0000-00-00 00:00:00',
	e_name VARCHAR(150) NOT NULL DEFAULT '',
	o_name VARCHAR(150) NOT NULL DEFAULT '',
	e_type VARCHAR(150) NOT NULL DEFAULT '',
	permission INTEGER DEFAULT '1'
);

CREATE TABLE seclevel(
	l_name VARCHAR(150) NOT NULL UNIQUE PRIMARY KEY DEFAULT '',
	added TIMESTAMP DEFAULT '0000-00-00 00:00:00',
	modified TIMESTAMP DEFAULT '0000-00-00 00:00:00',
	l_desc VARCHAR(255) NOT NULL DEFAULT '',
	l_level INTEGER UNIQUE DEFAULT ''
);

CREATE TABLE prefs( 
	user_id VARCHAR(150) NOT NULL PRIMARY KEY, 
	pref_id VARCHAR(50) NOT NULL DEFAULT '',
	pref_value TEXT NOT NULL DEFAULT ''
);

CREATE TRIGGER usr_mod_date
AFTER UPDATE ON users
BEGIN
	UPDATE users
	SET modified = DATETIME('NOW', 'LOCALTIME')
	WHERE u_id = new.u_id;
END;

CREATE TRIGGER grp_mod_date
AFTER UPDATE ON groups
BEGIN
	UPDATE groups
	SET modified = DATETIME('NOW', 'LOCALTIME')
	WHERE g_id = new.g_id;
END;

-- INSERT INTO groups (added, g_name, g_desc) VALUES(DATETIME('NOW', 'LOCALTIME'), 'everyone', 'Anonymous users - Users can read anonymous-level documents -no login required');
-- INSERT INTO groups (added, g_name, g_desc) VALUES(DATETIME('NOW', 'LOCALTIME'), 'user', 'General user - Users can write/read user-level documents - login required');
-- INSERT INTO groups (added, g_name, g_desc) VALUES(DATETIME('NOW', 'LOCALTIME'), 'editor', 'Editor user - Users can write/read/approve/reject up to editor-level documents - login required');
-- INSERT INTO groups (added, g_name, g_desc) VALUES(DATETIME('NOW', 'LOCALTIME'), 'administrator', 'Administrator user - Users can write/read/approve/reject all documents - Users can administer other users - login required');
-- INSERT INTO groups (added, g_name, g_desc) VALUES(DATETIME('NOW', 'LOCALTIME'), 'developer', 'Developer user - Users have full access to all aspects of the software - login required');

COMMIT;
