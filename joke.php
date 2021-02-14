<!DOCTYPE html>
<html>
    <header>
        <title>Just a fucking Joke.</title>
    </header>
    <body>
    <form method="post"> 
            <input type="submit" name="button1"
                    class="button" value="generieren" /> 
                    <br>
        <?php 
            if(array_key_exists('button1', $_POST)) { 
                button1(); 
            } 
            function button1() { 
                #echo rand(0,5);
                $servername = "nicosamuel.de";
                $username = "joke";
                $password = "j0k3";
                $db = "joke";
                $conn = new mysqli($servername, $username, $password, $db);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                //Action selection
                $sql_sel_action = "SELECT id, action FROM action";
                $result_action = $conn->query($sql_sel_action);
                $randi_action = rand(1, $result_action->num_rows);
                if($result_action->num_rows > 0)
                {
                    $sql_sel_rand_action = "SELECT action FROM action WHERE id=" . $randi_action;
                    $result_rand_action = $conn->query($sql_sel_rand_action);
                    if($result_rand_action->num_rows > 0)
                    {
                        while($row_action = $result_action->fetch_assoc())
                        {
                            echo $row_action["action"];
                        }
                    }
                }

                //Subject selection
                $sql_sel_subject = "SELECT id, name FROM subject";
                $result = $conn->query($sql_sel_subject);
                
                $randi = rand(1, $result->num_rows);
                if($result->num_rows > 0)
                {
                    $sql_sel_rand_subject = "SELECT name FROM subject WHERE id=" . $randi;
                    $result_subject = $conn->query($sql_sel_rand_subject);
                    if($result_subject->num_rows > 0)
                    {
                        while($row_subject = $result_subject->fetch_assoc())
                        {
                            echo " " . $row_subject["name"];
                        }
                    }
                }            
                else
                {
                    echo "klappt nicht";
                }

                //Verb selection
                $sql_sel_verb = "SELECT id, verb FROM verb";
                $result_verb = $conn->query($sql_sel_verb);
                $randi_verb = rand(1, $result_verb->num_rows);
                if($result_verb->num_rows > 0)
                {
                    $sql_sel_rand_verb = "SELECT verb FROM verb WHERE id=" . $randi_verb;
                    $result_verb_randi = $conn->query($sql_sel_rand_verb);
                    if($result_verb_randi->num_rows > 0)
                    {
                        while($row_verb = $result_verb_randi->fetch_assoc())
                        {
                            echo " " . $row_verb["verb"];
                        }
                    }
                }
                else
                {
                    echo "Verb klappt nicht.";
                }
                $conn->close();
            } 
        ?> 
    </body>
    <style>
        input{
            height: 300px;
            width: 300px;
            margin-left 40%;
        }
        body{
            font-size: 100px;
        }
    </style>
</html>