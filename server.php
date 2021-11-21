<?php 
  //Start session to collect and store the data
  session_start();
  //create a blueprint for our tasks
  
  class TaskList {
  	//Create task, need an info from client (name)
  	public function add($name) {
       $newTask = (object)[
        	'name' => $name,
        	'isFinished' => false
        ];

        //each task will be created as an object structure.
        //Used array to store multiple objects.

        //The parameter inside the SESSION is our collection of tasks.
        if ($_SESSION['tasks'] === null ) {
           $_SESSION['tasks'] = array(); 
        } 

        //Array mutators
        //SYNTAX: array_push(collection, element)
        array_push($_SESSION['tasks'], $newTask);
        
  	} 

  	//remove a single task
  	//an id from our collection
  	public function remove($id) {
       array_splice($_SESSION['tasks'], $id, 1);
  	} 

  	//delete all tasks
  	public function clear() {
       //remove all the items stored in the session
  	   session_destroy();
  	} 
  }

  //create an object derived from the blueprint above
  $tasklist = new TaskList();

  //control structure that will invoke which function in the template will be used upon sending the message from the client.
  if ($_POST['action'] === 'add') {
  	 $tasklist->add($_POST['name']); 
  } else if ($_POST['action'] === 'clear') {
  	 $tasklist->clear();
  } else if ($_POST['action'] === 'remove') {
  	  $tasklist->remove($_POST['id']);
  }
  
  header('Location: ./index.php');
?>
