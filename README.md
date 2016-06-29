# crud
A dynamic CRUD(Create,Read,Update,Delete) PHP:OOP script/plugin

A plugin/script that make it easy to create an crud module by yourself. 

The only thing what you need to do is:
1. Copy and paste the files into your root of your system.
2. Create a form or something that you want to crud.
3. Add 
          require_once('query_connector.class.php');

          $postFile = new QueryConnector();
          $postFile->processing('type_crud', 'table_name', array('column_key' => 'Column_value'));
          
4. Create a database.
5. Add things to crud with your form.

