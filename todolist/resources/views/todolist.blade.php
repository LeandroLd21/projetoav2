<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>
    <link rel="stylesheet" href ="{{ URL::asset('css/app.css') }}">
    <title>Document</title>
   <style>
    h1{
    color: blue;
    text-align: center;
}
body{
		font-family: arial;
}
.item{
		border: 1px solid black;
		background-color: #e6ffe6;
		margin: 20px;
		padding: 20px;
		padding-top: 5px;
		border-radius: 15px;
}
.btn_edit
{
    background-color:#85a3e0;
    text-decoration: none;
    padding: 10px;
    border-radius: 7px;
      
}
.btn_delete
{
    background-color:#e94540;
    text-decoration: none;
    padding: 10px;
    border-radius: 7px;	
      
}
a
{
		background-color:#85a3e0;
		text-decoration: none;
		padding: 10px;
		border-radius: 7px;	
        	
}
.grid
	{
		display: grid;
		grid-template-columns: 50% 50%;
		
	}

    #todolist_table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }
      
      #todolist_table td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
      }
      
      #todolist_table tr:nth-child(even){background-color: #f2f2f2;}
      
      #todolist_table tr:hover {background-color: #ddd;}
      
      #todolist_table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
      }
   </style>
</head>
<body>
     <h1 style="font-size:50px"> TODO LIST</h1>

     <div class="grid">
		<div class="item">
            <form>
			    <h2 style="font-size:50px"> Your Name </h2> 
                <input style="font-size:50px" type="text" id ="txtTask" placeholder = "Digite aqui" />
                <br><br>
				<button style="font-size:50px" class= "btn_edit" onclick ="saveTask()"> Salvar </button>
		</div>

		<div class="item">
			
			<h2 style="font-size:50px"> To Do List </h2>
			<table id ="todolist_table">
            <tr> <td>Id</td>  <td>Description</td> <td> </td> <td> </td></tr>
            <table>    
		</div>
     </div>   
     <script>
         
         $(document).ready(function(){

            $.get("/todolist_crud", function(data, status){
                 console.log("Data: " + JSON.stringify(data) + "\nStatus: " + status);
                 var table = document.getElementById("todolist_table");
                 if(data.length === 0)
                 {
                    var row = table.insertRow(0);
                    var cell1 = row.insertCell(0);
                    cell1.innerHTML = "No tasks yet!";
                 }else{
                   
                    for(let i =0; i < data.length; i++)
                    {
                        var row = table.insertRow(i+1);
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                        var cell3 = row.insertCell(2);
                        var cell4 = row.insertCell(3);
                        cell1.innerHTML = data[i]["id"];
                        var id = data[i]["id"];
                        cell2.innerHTML = data[i]["name"];
                        var name = data[i]["name"];
                        cell3.innerHTML = "<button class = \"btn_edit\" onclick =\"openModal("+id+")\">Edit</button>";
                        cell4.innerHTML = "<button class = \"btn_delete\" onclick =\"deleteTask("+id+")\">Delete</button>";
                    }
                 }
            });
  
         });     
         function getTasks()
         {
            $.get("/todolist_crud", function(data, status){
                 console.log("Data: " + JSON.stringify(data) + "\nStatus: " + status);
                 var table = document.getElementById("todolist_table");
                 table.innerHTML = "";
                 var row = table.insertRow(0);
                 var cel1 = row.insertCell(0);
                 var cel2 = row.insertCell(1);
                 var cel3 = row.insertCell(2);
                 var cel4 = row.insertCell(3);
                 cel1.innerHTML = "Id";
                 cel2.innerHTML = "Description";
                 cel3.innerHTML = "";
                 cel4.innerHTML = "";
                        
                 if(data.length === 0)
                 {
                    var row = table.insertRow(0);
                    var cell1 = row.insertCell(0);
                    cell1.innerHTML = "No tasks yet!";
                 }else{
                   
                    for(let i =0; i < data.length; i++)
                    {
                        var row = table.insertRow(i+1);
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                        var cell3 = row.insertCell(2);
                        var cell4 = row.insertCell(3);
                        cell1.innerHTML = data[i]["id"];
                        var id = data[i]["id"];
                        var name = data[i]["name"];
                        cell2.innerHTML = data[i]["name"];
                        cell3.innerHTML = "<button class = \"btn_edit\" onclick =\"openModal("+id+")\">Edit</button>";
                        cell4.innerHTML = "<button class = \"btn_delete\" onclick =\"deleteTask("+id+")\">Delete</button>";
                    }
                 }
            });
  

         }
         function saveTask()
         {
             let todo = document.getElementById("txtTask").value;
             if(todo.trim().length === 0)
             {
                 alert("Task name not found!");
             }else
             {
                $.post("/todolist_crud",
                    {
                        name: todo
                        
                    },
                    function(data, status){
                        console.log("Data: " +  JSON.stringify(data) + "\nStatus: " + status);
                    });
             }
         }

         function deleteTask(id)
         {
         //   alert("deleting " +id );
            $.ajax({
            url: '/todolist_crud/'+id,
            method: 'DELETE',
            contentType: 'application/json',
            success: function(result) {
                // handle success
                getTasks();
            },
            error: function(request,msg,error) {
                // handle failure
                alert("erro " +id );
            }
        });
    }

    function updateTask(id, taskName)
    {
        $.ajax({
            url: '/todolist_crud/'+id,
            type: 'PUT',
            data: 
            {
                name: taskName
            },
            success: function() {
                // handle success
                getTasks();
            },
            error: function(data) {
                // handle failure
                alert("Error editing the task: " +id );
            }
        });

    }
    function openModal(id)
    {
        let newTaskName = prompt("Please enter your new task name to task "+id, "New task Name");
        console.log("new task "+ newTaskName);
        if(newTaskName.trim().length === 0)
        {
            alert("It's not possible save a empty name for a task!");
        }else
        {
            updateTask(id, newTaskName);
        }    
    }
     </script>
</body>
</html>