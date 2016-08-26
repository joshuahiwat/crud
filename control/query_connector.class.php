<?php
require_once('config.php');

	class QueryConnector {

		protected function getDatabase() {
			global $config;
			$dbh = NULL;

			try {
				$dbh = new PDO('mysql:host=' . $config['database']['host'] . ';dbname=' . $config['database']['dbname'], $config['database']['username'], $config['database']['password']);
				$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException $e) {
				die('DATABASE ERROR: ' . $e->getMessage());
			}

			return $dbh;

		}	

		protected function QueryType($type)	{

			switch ($type) {
				case 'create':
					$query_type = 'INSERT INTO';
					break;
				case 'read':
					$query_type = 'SELECT';
					break;
				case 'update':
					$query_type = 'UPDATE';
					break;
				case 'delete':
					$query_type = 'DELETE FROM';
					break;
			
			}
			return $query_type;
		}

		public function processing($type, $table, $column = null) {
			$dbh = $this->getDatabase();
			$query = $this->QueryType($type);


			if($type == 'read') {

				$columns = implode(", ",$column);

				$query = ''.$query.' '.$columns.' FROM '.$table.'';

				$dbh_query = $dbh->prepare($query);

				$dbh_query->execute();

				$dbh_querys = $dbh_query->fetchAll();


				return $dbh_querys;


			}elseif($type == 'create') {

				$columns = array_keys($column);
				$col_value = implode(", :",$columns);
				$col_prepare = implode(", ",$columns);

				$query = ''.$query.' '.$table.' ('.$col_prepare.') VALUES (:'.$col_value.')';

				$dbh_query = $dbh->prepare($query);

				$dbh_query->execute($column);	


				return $dbh_query;

			}elseif($type == 'update') {

				$columns = array_keys($column);
				$col_set = implode(",",$columns);

				$query_array = [];

				foreach ($column as $key => $value):

					if($key == 'id'):
						$query_array_id = $key.' = :'.$key;
					else:
						$query_array[] = $key.' = :'.$key;
					endif;

				endforeach;

				$query = ''.$query.' '.$table.' SET '.implode(", ",$query_array).' WHERE '.$query_array_id.'';

				$dbh_query = $dbh->prepare($query);

				$dbh_query->execute($column);


				return $dbh_query;

			}elseif($type == 'delete') {

				$columns = array_keys($column);
				$col_set = implode(",",$columns);

				$query = ''.$query.' '.$table.' WHERE '.$col_set.'= :'.$col_set.'';

				$dbh_query = $dbh->prepare($query);

				$dbh_query->execute($column);


				return $dbh_query;
			}
		}
	}
