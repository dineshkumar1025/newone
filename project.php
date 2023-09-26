<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dk";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<style>
    h1 {
        text-align: center;
    }
</style>
<h1> Grocery list for purchase </h1>

<title>Simple To Do List</title>
<!--Stylesheet-->
<style media="screen">
    *,
    *:before,
    *:after{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    body{
        height: 100vh;
        background: #FFFFFF;
    }
    .container{
        width: 40%;
        min-width: 450px;
        position: absolute;
        transform: translate(-50%,-50%);
        top: 50%;
        left: 50%;
        background: white;
        border-radius: 10px;
    }

    #newtask{
        position: relative;
        padding: 30px 20px;
    }
    #newtask input{
        width: 75%;
        height: 45px;
        font-family: 'Poppins',sans-serif;
        font-size: 15px;
        border: 2px solid #808000;
        padding: 12px;
        color: #000000;
        font-weight: 500;
        position: relative;
        border-radius: 5px;
    }
    #newtask input:focus{
        outline: none;
        border-color: #000000;
    }

    #newtask button{
        position: relative;
        float: right;
        width: 20%;
        height: 45px;
        border-radius: 5px;
        font-family: 'Poppins',sans-serif;
        font-weight: 500;
        font-size: 16px;
        background-color: #0d75ec;
        border: none;
        color: #000000;
        cursor: pointer;
        outline: none;
    }
    #tasks{
        background-color: #FFFFFF;
        padding: 30px 20px;
        margin-top: 10px;
        border-radius: 10px;
        width: 100%;
        position: relative;
    }
    .task{
        background-color: #ffef00;
        height: 50px;
        margin-bottom: 8px;
        padding: 5px 10px;
        display: flex;
        border-radius: 5px;
        align-items: center;
        justify-content: space-between;
        border: 1px solid #808000;
        cursor: pointer;
    }
    .task span{
        font-family: 'Poppins',sans-serif;
        font-size: 15px;
        font-weight: 400;
    }
    .task button{
        background-color: #808080;
        color: #ffffff;
        height: 100%;
        width: 50px;
        border-radius: 5px;
        border: none;
        cursor: pointer;
        outline: none;
    }

    .completed{
        text-decoration: line-through;
    }
</style>
</head>
<body>

<div id="newtask">
    <form action="phpscript.php" method="POST">
        <input type="text" name="item_name" placeholder="enter the grocery item">
        <button id="push" type="submit">Add</button>
    </form>

    </div>

    <div id="tasks"></div>
</div>
<!--Script-->
<script type="text/javascript">
    var tasksArray = []

    document.querySelector('#push').onclick = function(){
        var taskInput = document.querySelector('#newtask input');
        var taskName = taskInput.value;
        
        if(taskName.length == 0){
            alert("Please enter a grocery item to buy.");
        }
        else{
            tasksArray.push(taskName);
            
            updateTasksList();
            taskInput.value = '';
        }
    }

    
    function updateTasksList() {
        var tasksList = document.querySelector('#tasks');
        tasksList.innerHTML = '';
        
        for(var i = 0; i < tasksArray.length; i++){
            var taskName = tasksArray[i];
            tasksList.innerHTML += `
                <div class="task">
                    <span id="taskname">
                        ${taskName}
                    </span>
                    <button class="delete" data-index="${i}">Remove</button>
                </div>
            `;
        }

      
        var deleteButtons = document.querySelectorAll(".delete");
        for(var i = 0; i < deleteButtons.length; i++){
            deleteButtons[i].onclick = function(){
                var index = parseInt(this.getAttribute("data-index"), 10);
                tasksArray.splice(index, 1);
                updateTasksList();
            }
        }
    }


</div>
</script>
</body>
</html>



