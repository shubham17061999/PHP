<?php
if ( ! isset($_GET['name']) || strlen($_GET['name']) < 1  ) 
{
    die('Name parameter missing');
}
if ( isset($_POST['logout']) ) 
{
    header('Location: index.php');
    return;
}
// 0 is Rock, 1 is Paper, and 2 is Scissors
$names = array('ONE', 'TWO', 'THREE');
$human = isset($_POST["human"]) ? $_POST['human']+0 : -1;
$computer = rand(0,2);
function check($computer, $human) 
{
    if ( $human == $computer ) 
    {
        return "Great Barrier Reef";
    } 
    else if ( ($human == 0 && $computer == 2) || ($human == 1 && $computer == 0) || ($human == 2 && $computer == 1)) 
    {
        return "Paris";
    } 
    else
    {
        return "London";
    }
}
// Check to see how the play happenned
$result = check($computer, $human);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Shubham Pandey's Loaction Generator</title>
        <?php require_once "bootstrap.php"; ?>
    </head>
    <body>
        <div class="container">
            <h1>Location Generator</h1>
            <h3>
            <a href="main.php">Please check the places that you can choose from.</a>
            </h3>

            <?php
                if ( isset($_REQUEST['name']) ) 
                {
                    echo "<p>Welcome: ";
                    echo htmlentities($_REQUEST['name']);
                    echo "</p>\n";
                }
            ?>

            <div class="row">
                <form method="post">
                    <div class="form-group col-md-2">
                        <select class="form-control" name="human">
                            <option value="-1">Select</option>
                            <option value="0">ONE</option>
                            <option value="1">TWO</option>
                            <option value="2">THREE</option>
                            <option value="3">Test</option>
                        </select>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Play">
                    <input class="btn" type="submit" name="logout" value="Logout">
                </form>
            </div>

            <div>
                <pre><?php
                        if ( $human == -1 ) 
                        {
                            print "Please select a strategy and press Play.\n";
                        } 
                        else if ( $human == 3 ) 
                        {
                            for($c=0;$c<3;$c++) 
                            {
                                for($h=0;$h<3;$h++) 
                                {
                                    $r = check($c, $h);
                                    print "Human=$names[$h] Computer=$names[$c] Result=$r\n";
                                }
                            }
                        } 
                        else 
                        {
                            print "Your Play=$names[$human] Computer Play=$names[$computer] Result=$result\n";
                        }
                ?></pre>
            </div>

        </div>
    </body>
</html>