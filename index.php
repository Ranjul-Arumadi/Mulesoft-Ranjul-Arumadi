<?php
/*
Author: Ranjul Arumadi
Date of creation: 30-10-21
*/

// connecting to the db
$host = "localhost";
$username = "root";
$password = "";
$dbname = "mulesoft";
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno()) {
  echo "Connection failed!" . mysqli_connect_error();
  exit();
}
else{
	echo("Connected to mulesoft db"."</br>");
}

/*
Objective: create a database, store your interesting movie names with the names of lead actor, actress, year of release and the director name. Once you have stored the details, then use any programming language of your choice to retrieve the details.
*/

// creating table
$create_table_query = "CREATE TABLE `interesting_movies` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `movieName` text NOT NULL,
  `leadActor` text NOT NULL,
  `leadActress` text NOT NULL,
  `yearOfRelease` int(11) NOT NULL,
  `directorName` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
$execute_query = mysqli_query($conn, $create_table_query);

// Code to see if table is created
$exists = mysqli_query($conn, "select 1 from interesting_movies");
if($exists !== FALSE){
   echo("Table creation successfull.");
}
else{
   echo("Table creation unsuccessfull.");
}

// Inserting into table
$insert_query = "INSERT INTO interesting_movies (movieName, leadActor, leadActress, yearOfRelease, directorName) VALUES
('Batman Begins','Christian Bale','Katie Holmes','2005','Christopher Nolan'), 
('Transformers','Shia LaBeouf','Megan Fox','2007','Michael Bay'),
('La La Land','Ryan Gosling','Emma Stone','2016','Damien Chazelle')";
$execute_query = mysqli_query($conn, $insert_query);

// Querying data
/*
Objectives: Querying data from Movies table with or without parameters – after having the movies data in the table, you need to query the movie details (name, actor, actress, director, year of release) using a SELECT statement. You will need to write a program to issue a simple SELECT statement to query all rows from the Movies table, as well as use a query with parameter like actor name to select movies based on the actor's name.
*/

// simple select without parameter
echo "<br>"."simple select without parameter"."</br>";
$print_query = "SELECT * FROM interesting_movies";
$execute_query = mysqli_query($conn, $print_query);

while($row = mysqli_fetch_array($execute_query)) {
    echo "</br>".$row[0]." ".$row[1]." ".$row[2]." ".$row[3]." ".$row[4]." ".$row[5]." "."</br>";
}

// select using parameters 1
echo "<br>"."select using parameters 1"."</br>";
$print_query = "SELECT * FROM interesting_movies WHERE yearOfRelease=2005";
$execute_query = mysqli_query($conn, $print_query);

while($row = mysqli_fetch_array($execute_query)) {
    echo "</br>".$row[0]." ".$row[1]." ".$row[2]." ".$row[3]." ".$row[4]." ".$row[5]." "."</br>";
}

// select using parameters 2
echo "<br>"."select using parameters 2"."</br>";
$print_query = "SELECT * FROM interesting_movies WHERE leadActor='Ryan Gosling'";
$execute_query = mysqli_query($conn, $print_query);

while($row = mysqli_fetch_array($execute_query)) {
    echo "</br>".$row[0]." ".$row[1]." ".$row[2]." ".$row[3]." ".$row[4]." ".$row[5]." "."</br>";
}

// closing the connection
mysqli_close($conn);
?>
