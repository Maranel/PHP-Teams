
<?php include('Connector.php');?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .task{
            padding: 5px;
            background-color: #EFEFEF;
        }
        .task:nth-of-type(even){
            background-color:forestgreen;
            color: white;
        }
        </style>

        <form action="form.php" method="post">
            <label>Meno:</label>
            <input type = 'text' placeholder="Meno" name='username'>
            <br>
            <label>Priezvisko</label>
            <input type="text" placeholder="Priezvisko" name="surename">
            <br>
            <label>Nick</label>
            <input type = "text" placeholder="Nick" name="userid">
            <br>
            <label>Email:</label>
            <input type="text" placeholder="email@domain.com" name="email">
            <br>
            <input type="submit" name="submit" value="Odoslat">

        </form>
</head>
<body>
    
</body>
</html>

<?php
    //  $connector = new connector('localhost','root','','mybase');
    //  $result = $connector->selectFetchAll('users');
    //  foreach($result as $itab_val){
    //      echo $itab_val['username'."surename"];
    //  }
?>

