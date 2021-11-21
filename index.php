<!DOCTYPE html>

       <html>
          <head>
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

          <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

            <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>

              <title> Basic To-Do </title>
            <style type="text/css">
                *{
                font-family: "Poppins",sans-serif;
                font-size = '0.7em';
                color: #1f2833;
                }

                .todoHeader{
                    background-color: #1f2833;
                    color: white;
                    padding: 0.9em 0;
                    text-align: center;
                }

                #taskList{
                    background-color: #1f2833;
                }

                .addTask{
                    padding: 0.9em 0;
                    margin: 0.5em;
                    text-align: center;
                }

                #buttonClr {
                    display: flex;
                    justify-content: center;
                    align-self: center;
                }

                #listForm {
                    display: flex;
                    justify-content: center;
                    align-self: center;
                }

                #taskName {
                    display: flex;
                    justify-content: center;
                    align-self: center;
                }

                .btn-outline-danger{
                    width: 7vh;
                    height: 3.5vh;
                    display: flex;
                    justify-content: center;
                    align-self: center;
                    margin-bottom: 1px;
                }

            </style>
         </head>
        <!-- <link rel="stylesheet" type="text/css" href="./style.php" media="screen"> -->
       <body>
        <?php session_start(); ?>
        <h2 class="todoHeader">TO-DO LIST ✅</h2>
        <div class="container">
        <h3 class="addTask">Add Task</h3>
        </div>
        <form id="taskName" method="POST" action="./server.php">
            <input type="hidden" name="action" value="add"/>
            <strong?>Task:</strong>  
            <input type="text" name="name" required/>
            <button type="submit" class="btn btn-outline-info">Add</button>
        </form>

        <h3 class="text-center pt-3">Task List</h3>

        <?php if (isset($_SESSION['tasks'])) :  ?>

            <!-- foreach -->
            <?php foreach($_SESSION['tasks'] as $index => $task): ?>
                <div id="listForm">
                    <form style="display: inline-block;">
                        <input type="hidden" name="id" value="<?php echo $index; ?>"/>     
                        <input type="checkbox" name="isFinished"  <?php echo ($task->isFinished) ? 'checked' : null; ?>/>             
                        <input type="text" name="name" value="<?php echo $task->name; ?>" disabled/>
                    </form>

                    <form method="POST" action="./server.php" style="display: inline-block;">
                        <input type="hidden" name="action" value="remove"/>
                        <input type="hidden" name="id" value="<?php echo $index; ?>"/>
                        <input id="deleteBtn" class="btn btn-outline-danger" type="submit" value="Delete"/>
                    </form>

                </div>

            <?php endforeach; ?>
        <?php endif; ?>

           <br/><br/>
           
            <form id="buttonClr" method="POST" action="./server.php">
                <input type="hidden" name="action" value="clear"/>
               <button class="btn btn-outline-info" type="submit" >Clear all tasks</button>
           </form>
       </body>
    </html>
