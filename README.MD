# ***Web Devlopment with php and SQL***
XAMPP
X: Cross-platform (works on Windows, Linux, and macOS)
A: Apache HTTP Server
M: MariaDB (previously MySQL for database management)
P: PHP (server-side scripting language)
P: Perl (also a server-side scripting language)

It allows developers to create a local web server environment on their own machine.

Cross-Platform: XAMPP runs on different operating systems (Windows, Linux, macOS).
Apache Web Server: Hosts web pages and serves them to browsers.
MariaDB/MySQL: Manages databases for dynamic websites. XAMPP comes with MariaDB (a MySQL fork). 
PHP/Perl: Allows for server-side scripting and dynamic web page generation.
Easy to Install: Comes with a user-friendly control panel to manage Apache, MySQL, and other components.


MariaDB 10.4.32 is a type of SQL database management system. It is a fork of MySQL and is fully compatible with it, meaning that most MySQL commands and applications will work with MariaDB without modification.

# ***[PHP version: 8.2.12](https://www.apachefriends.org/download.html)***
```
D:\xampp\htdocs\PHP43
SQL 3306
```

```bash
D:
cd xampp\mysql\bin
dir
30-10-2023  18:28         3,784,616 mysql.exe
mysql.exe -V
```

```bash
cd C:\Program Files\MySQL\MySQL Server 8.0\bin
mysql -V
mysql  Ver 8.0.38 for Win64 on x86_64 (MySQL Community Server - GPL)
# Installed separately, likely via the MySQL Installer or MySQL Workbench
```

```bash
MySQL 8.0.38 (installed separately via MySQL Workbench)
MariaDB 10.4.32 (installed with XAMPP)
# This version is installed with XAMPP, which bundles it with other components like Apache and PHP for easy web development.

# Both can be used depending on the environment you're working in!
# MySQL and MariaDB typically use the same default port (3306).
```

Using MySQL Workbench with XAMPP’s MariaDB
Even though MySQL Workbench is designed for MySQL, it also works with MariaDB (which is what XAMPP uses). You can configure MySQL Workbench to connect to the MariaDB instance in XAMPP.
When setting up the connection in MySQL Workbench:
Host: localhost
Port: 3306
Username: root
Password: (Leave it blank if you're not using one, or use the one you set in XAMPP)
You’ll be able to use MySQL Workbench as usual.

Ownership: MySQL is owned by Oracle, while MariaDB is a A fork of MySQL developed by the developers of MySQL after concerns about Oracle's acquisition of MySQL.
Features and Improvements: MariaDB may include features and optimizations that are not found in MySQL.
Licensing: While MySQL has both open-source and commercial licenses, MariaDB is entirely open-source.

```
D:\xampp\mysql\bin>wmic cpu get name, NumberOfCores, NumberOfLogicalProcessors
Name                                     NumberOfCores  NumberOfLogicalProcessors
Intel(R) Pentium(R) CPU G3258 @ 3.20GHz  2              2


D:\xampp\mysql\bin>systeminfo | findstr /C:"Total Physical Memory"
Total Physical Memory:     8,131 MB

D:\xampp\mysql\bin>wmic logicaldisk get size,freespace,caption
Caption  FreeSpace     Size
C:       7210328064    94190432256
D:       116642254848  119898370048
E:       9025986560    15502147584


D:\xampp\mysql\bin>systeminfo | findstr /C:"OS Name" /C:"OS Architecture"
OS Name:                   Microsoft Windows 10 Enterprise

```

```
Based on the information you provided, here’s an evaluation of your system's capabilities to run MySQL, MariaDB, and MongoDB:

System Specifications
CPU:

Model: Intel Pentium G3258
Cores: 2
Logical Processors: 2
RAM:

Total Physical Memory: 8 GB
Disk Space:

C: ~ 6.7 GB free out of ~ 88.5 GB
D: ~ 108.5 GB free out of ~ 111.5 GB
E: ~ 8.4 GB free out of ~ 14.5 GB
Operating System:

OS Name: Microsoft Windows 10 Enterprise
```

```
Limited CPU cores (only 2 cores/2 threads)
Moderate RAM (8 GB is decent, but might be pushed under heavier loads).

RAM can lead to increased disk swapping, which slows down performance.
```

```
D:\xampp\mysql\bin>wmic cpu get loadpercentage
LoadPercentage
21 D:\xampp\mysql\bin>systeminfo | findstr /C:"Total Physical Memory" /C:"Available Physical Memory"
Total Physical Memory:     8,131 MB
Available Physical Memory: 3,830 MB D:\xampp\mysql\bin>wmic logicaldisk get size,freespace,caption
Caption  FreeSpace     Size
C:       6573154304    94190432256
D:       116642254848  119898370048
E:       9025986560    15502147584

CPU Load Percentage
Current Load Percentage: 21%
This indicates that your CPU is currently at 21% utilization, which is relatively low. This suggests that your CPU has some capacity left for additional tasks.
2. Memory Status
Total Physical Memory: 8,131 MB (or ~8 GB)
Available Physical Memory: 3,830 MB (or ~3.8 GB)
You have approximately 3.8 GB of free RAM available for use, which is a decent amount for running multiple database servers. However, it may become a limitation under heavier workloads.
```

```Markdown
## C:\data\db>ls
WiredTiger: MongoDB uses the WiredTiger storage engine by default. These files are related to how MongoDB stores data internally using this engine.
*.wt files: These are the data files for collections and indexes. Each collection-* file corresponds to a MongoDB collection, while index-* files store index information.
journal folder: This contains the journal files MongoDB uses for data recovery in case of crashes.
mongod.lock: A lock file that indicates whether MongoDB is running or was shut down correctly.
_mdb_catalog.wt: Contains the catalog of databases and collections.
storage.bson: Stores information related to storage configuration.
All the data for your MongoDB collections and indexes is stored in this directory, managed by the WiredTiger engine. You generally won’t interact directly with these files; MongoDB uses them internally to manage the data stored in your collections.
```
FileZilla is an FTP (File Transfer Protocol) server that allows you to transfer files (like HTML, CSS, images, etc.) to your server from a local machine and from your server. It provides a way to upload and manage files on your web server using FTP.
FileZilla: Files are typically stored on your own server or hosting environment.
FileZilla: Mainly used for any type of files you want to manage on your server.
If you’re primarily working with PHP and MySQL, you may not need these modules enabled. They are more relevant if you are working with FTP or Java web applications.

Apache Tomcat is a web server and servlet container which is necessary if you're working with Java-based web applications. It supports Java Servlets and JavaServer Pages (JSP), which are essential for developing Java web applications.

`it's fine to leave them disabled to keep your XAMPP environment simpler and potentially reduce resource usage.`

```
"Server connection: SSL is not being used" typically indicates that your MySQL server is not set up to use SSL (Secure Sockets Layer) for encrypted connections. 
```

 SSL is Secure Sockets Layer. It's a standard security technology that establishes an encrypted link between a web server and a browser, ensuring that all data transmitted remains private and integral.

```
PHP extension: mysqli Documentation curl Documentation mbstring Documentation
```
## [`mysqli`](https://www.php.net/manual/en/book.mysqli.php)
The mysqli (MySQL Improved) extension allows you to interact with MySQL databases. It provides an object-oriented interface, as well as a procedural one

## [`curl`](https://www.php.net/manual/en/book.curl.php)
The curl extension is used for making HTTP requests from your PHP scripts. It allows you to connect and communicate with different types of servers using various protocols (HTTP, FTP, etc.), which is useful for APIs and web scraping.

## [`mbstring`](https://www.php.net/manual/en/book.mbstring.php)
The mbstring extension provides support for multibyte character encoding in PHP, which is essential for handling non-ASCII text properly. It includes functions for string manipulation and encoding conversions, particularly useful for working with UTF-8 and other multibyte encodings.

These extensions are commonly used in PHP development, especially when working with databases, web APIs, and handling internationalized text.

D:\xampp\htdocs\PHP43

Execution process

Web Server Setup
You have XAMPP installed, which includes Apache, a web server that can serve your PHP files. When you start Apache from the XAMPP control panel, it listens for requests on a specific port (usually port 80 for HTTP).
File Placement
The htdocs folder is the root directory for your web server, meaning it serves as the starting point for accessing web content.
Accessing the File
When you entered http://localhost/PHP43/01php/index.php in your web browser, it sent an HTTP request to the Apache server running on your machine. The localhost refers to your own computer, and the rest of the URL specifies the path to the file you want to access.
Server Processing
The Apache server received the request and located your index.php file in the specified directory.
Apache is configured to handle PHP files by passing them to the PHP interpreter. It processes the PHP code within your file.
6. Sending Response to Browser
After processing all the PHP code, Apache sends the generated HTML (and any other output) back to your web browser.
The browser renders the HTML content and displays it to you.

Here's a cheat sheet with essential MySQL Workbench commands for various tasks, including database management, table manipulation, querying, and more:

---

## **Database Management**
### Create Database
```sql
CREATE DATABASE database_name;
```

### Select Database
```sql
USE database_name;
```

### Drop Database
```sql
DROP DATABASE database_name;
```

### Show Databases
```sql
SHOW DATABASES;
```

---

## **Table Management**
### Create Table
```sql
CREATE TABLE table_name (
    column1 datatype [constraints],
    column2 datatype [constraints],
    ...
);
```

### Drop Table
```sql
DROP TABLE table_name;
```

### Alter Table (Add Column)
```sql
ALTER TABLE table_name
ADD column_name datatype;
```

### Alter Table (Modify Column)
```sql
ALTER TABLE table_name
MODIFY column_name new_datatype;
```

### Alter Table (Drop Column)
```sql
ALTER TABLE table_name
DROP COLUMN column_name;
```

### Rename Table
```sql
RENAME TABLE old_table_name TO new_table_name;
```

### Show Tables
```sql
SHOW TABLES;
```

---

## **Basic Data Manipulation**
### Insert Data
```sql
INSERT INTO table_name (column1, column2, ...)
VALUES (value1, value2, ...);
```

### Select Data
```sql
SELECT column1, column2, ...
FROM table_name
WHERE condition;
```

### Select All Data
```sql
SELECT * FROM table_name;
```

### Update Data
```sql
UPDATE table_name
SET column1 = value1, column2 = value2, ...
WHERE condition;
```

### Delete Data
```sql
DELETE FROM table_name
WHERE condition;
```

---

## **Indexes and Keys**
### Create Index
```sql
CREATE INDEX index_name
ON table_name (column1, column2, ...);
```

### Drop Index
```sql
DROP INDEX index_name
ON table_name;
```

### Add Primary Key
```sql
ALTER TABLE table_name
ADD PRIMARY KEY (column_name);
```

### Add Foreign Key
```sql
ALTER TABLE table_name
ADD FOREIGN KEY (fk_column)
REFERENCES parent_table(parent_column);
```

---

## **Constraints**
### Add Unique Constraint
```sql
ALTER TABLE table_name
ADD CONSTRAINT constraint_name UNIQUE (column_name);
```

### Drop Constraint
```sql
ALTER TABLE table_name
DROP CONSTRAINT constraint_name;
```

---

## **Joins**
### Inner Join
```sql
SELECT column1, column2, ...
FROM table1
INNER JOIN table2
ON table1.column = table2.column;
```

### Left Join
```sql
SELECT column1, column2, ...
FROM table1
LEFT JOIN table2
ON table1.column = table2.column;
```

### Right Join
```sql
SELECT column1, column2, ...
FROM table1
RIGHT JOIN table2
ON table1.column = table2.column;
```

---

## **Aggregate Functions**
### Count
```sql
SELECT COUNT(column_name)
FROM table_name;
```

### Sum
```sql
SELECT SUM(column_name)
FROM table_name;
```

### Average
```sql
SELECT AVG(column_name)
FROM table_name;
```

### Max
```sql
SELECT MAX(column_name)
FROM table_name;
```

### Min
```sql
SELECT MIN(column_name)
FROM table_name;
```

---

## **Other Useful Commands**
### Show Columns of a Table
```sql
SHOW COLUMNS FROM table_name;
```

### Describe Table Structure
```sql
DESCRIBE table_name;
```

### Create View
```sql
CREATE VIEW view_name AS
SELECT column1, column2, ...
FROM table_name
WHERE condition;
```

### Drop View
```sql
DROP VIEW view_name;
```

---

You can modify SQL commands like `CREATE`, `DROP`, and `ALTER` with conditions such as `IF NOT EXISTS` or `IF EXISTS` to ensure they only execute when necessary. Here's how you can incorporate these conditions:

---

## **Conditional Table Creation**
Ensure the table is only created if it doesn't already exist.
```sql
CREATE TABLE IF NOT EXISTS table_name (
    column1 datatype [constraints],
    column2 datatype [constraints],
    ...
);
```

---

## **Conditional Database Creation**
Create the database only if it does not already exist.
```sql
CREATE DATABASE IF NOT EXISTS database_name;
```

---

## **Conditional Table Deletion**
Drop the table only if it exists.
```sql
DROP TABLE IF EXISTS table_name;
```

---

## **Conditional Database Deletion**
Drop the database only if it exists.
```sql
DROP DATABASE IF EXISTS database_name;
```

---

## **Conditional Column Addition**
Add a column to a table only if it doesn't already exist. (Note: MySQL doesn't have direct support for checking if a column exists in `ALTER` commands, so you'd typically run an additional check first using a query.)
```sql
ALTER TABLE table_name
ADD COLUMN IF NOT EXISTS column_name datatype;
```
However, this may need to be implemented using stored procedures or script logic, as MySQL doesn't natively support `IF NOT EXISTS` for columns.

---

## **Conditional Index Creation**
Create the index only if it doesn't already exist.
```sql
CREATE INDEX IF NOT EXISTS index_name
ON table_name (column1, column2, ...);
```

---

## **Conditional Index Deletion**
Drop the index only if it exists.
```sql
DROP INDEX IF EXISTS index_name
ON table_name;
```

---

## **Conditional Foreign Key Addition**
To add a foreign key only if it doesn't already exist, you would typically check for the foreign key using `information_schema` and then create it if it's not found. Unfortunately, MySQL doesn't support `IF NOT EXISTS` for foreign keys directly.
```sql
ALTER TABLE table_name
ADD CONSTRAINT IF NOT EXISTS fk_name FOREIGN KEY (fk_column)
REFERENCES parent_table(parent_column);
```


<!-- 

PS C:\Windows\system32> Get-TPM


TpmPresent                : False
TpmReady                  : False
ManufacturerId            : 0
ManufacturerIdTxt         :
ManufacturerVersion       :
ManufacturerVersionFull20 :
ManagedAuthLevel          : Full
OwnerAuth                 :
OwnerClearDisabled        : True
AutoProvisioning          : NotDefined
LockedOut                 : False
LockoutHealTime           :
LockoutCount              :
LockoutMax                :
SelfTest                  :

 -->