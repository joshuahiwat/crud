# crud
A dynamic CRUD(Create,Read,Update,Delete) PHP:OOP script/plugin

A plugin/script that make it easy to create an crud module by yourself. 

The only thing what you need to do is:
1. Copy and paste the files into your root of your system.
2. Create a form or something that you want to crud.
3. Add 
          require_once('query_connector.class.php');

          $postFile = new QueryConnector();
          $postFile->processing('type_crud', 'table_name', ['column_key' => 'Column_value']);
          
4. Create a database.
5. Add things to crud with your form.

# Information for function call examples:

Read: processing('read', '#tabel_name', ['#column_name_one', '#column_name_two']);


Create: processing('create', '#tabel_name', ['#column_name_one' => '#column_record_value']);


Update: processing('update', '#tabel_name', ['#column_name_one' => '#column_record_value', '#column_primary_key' => '#column_primary_key_value']);


Delete: processing('delete', '#tabel_name', ['#column_primary_key' => '#column_primary_key_value']);


Change the names and delete the # before the example names. This above is an example, don't use for production!

