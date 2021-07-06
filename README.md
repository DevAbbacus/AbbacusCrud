# AbbacusCrud

Task:

You need to create a new database entity, with a CRUD (Create, Read, Update, Delete) from the admin panel, that can also be populated through an API.

Framework: Magento-2

Custom Module: Abbacus_Crud

Step to install Abbacus_Crud module

1. Paste package in the magento root directory
2. Run following commands
	php bin/magento setup:upgrade
	php bin/magento setup:di:compile
	php bin/magento cache:flush


--------------------------------------------------------------

Magento backend Path to access module:
Admin->Abbacus->click Project


APIs:

Insert: {BASE_URL}/V1/abbacus-crud/project
Method: save

Get List: {BASE_URL}/V1/abbacus-crud/project/search
Method: getList

Get by ID: {BASE_URL}/V1/abbacus-crud/project/:projectId
Method: get

Update by ID: {BASE_URL}/V1/abbacus-crud/project/:projectId
method: update

Delete by ID: {BASE_URL}/V1/abbacus-crud/project/:projectId
method: deleteById

----------------------------------------------------------------

What steps do you need to take to achieve that?

- We have created custom extension to create database entity and a CRUD from the admin panel.

Please describe the functionality of each archive and class - step by step

(e.g differences between routes.xml on adminhtml and frontend, db_schema vs Setup Scripts, ui components vs Admin block)

1. routes.xml on adminhtml and frontend

- The routes.xml file maps which module to use for a URL with a specific frontName and area. The location of the routes.xml file in a module, either etc/frontend or etc/adminhtml, specifies where those routes are active.

- etc/adminhtml admin Matches requests in the Magento admin area
- etc/frontend Matches requests in the Magento front area

2. db_schema vs Setup Scripts

2.1 db_schema

- Developers need to add, rename then change the type of the column in order to get the final result, which was not efficient and also time-consuming.
- The new declarative schema approach allows developers to declare the final desired state of the database and has the system adjust to it automatically, without performing redundant operations.
- Developers are no longer forced to write scripts for each new version.
- In addition, this approach allows data to be deleted when a module is uninstalled.
- When remove the entire table node from db_schema.xml then it remove or drop a table it self

2.2 Setup Scripts

- Setup script files used to perform some action on your data or table while installing or upgrading up your module.
- Setup scripts are certain classes inside your module which are executed, either once, or whenever your module version is updated
- All the setup scripts files are created under Setup folder.

Magento supports 4 kinds of setup scripts
- InstallSchema – Run once per module. Used to add new tables or modify existing table architecture in the database.
- InstallData – Run once per module. Used to add/edit/delete records (rows) from existing tables in the database.
- UpgradeSchema – Runs everytime the module version changes. Used to add new tables or modify existing table architecture in the database
- UpgradeData – Runs everytime the module version changes. Used to add/edit/delete records (rows) from existing tables in the database

3. ui components vs Admin block

3.1 Ui Components

- It's mostly configuration. So you write less code, so less code that can break
- you get a cool grid with show/hide columns, full text search, inline edit, export built in and maybe others.
- It can easily be extended with just another xml file in a different module
- any new feature magento rolls out for the grids you will get it automatically in your grid.
- Difficult to debug
- Difficult to build non standard grids
- Not very much control over what happens

3.2 Layout files and Admin block

- You got full control of what happens.
- Relatively easy to build non-standard grids.
- Easy to debug
- You can use your knowledge from M1 to do it.
- Grid is not that flexible or extensible.
- you need to write the same code over and over again.
- More code to test or that can break

------------------------------------------------------------------------------------

Questions:
What is the complexity of the given challenge?
- We didn't find any complexity in a given task.

What is the time frame estimate?
- It took 10 Hours to complete this task.

What improvements can you suggest to the task?
- Everything seems fine with the given task.
