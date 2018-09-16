<html>
    <style type="text/css">
        .indented {
            padding-left: 100px; 
        }
    </style>
    <body>
        <h2>Demonstration of PHP and MySQL functionality</h2>
        <button>Add a new entry</button>
        <button>View current entries</button>
        <div id='newentry'>
            <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
                First Name:<input class="indented" type="text" name="fname"/>
                Last Name: <input class="indented" type="text" name="lname"/>
                Parent: <select class="indented" name="parentid">
                <?php
                    mysql_connect(localhost, 'root', 'cmsc245');
                    @mysql_select_db('mydb') or die('Unable to select database');
                    $query = "SELECT fname, lname FROM user_info"
                    $result = mysql_query($query);
                    $num = mysql_numrows($result);
                    mysql_close();
                    
                    $i = 0;
                    while ($i < $num) {
                        $first = mysql_result($result, $i, "fname");
                        $last = mysql_result($result, $i, "lname");
                        $id = mysql_result($result, $i, "id");
                        echo "<option value = '" . id . "'>" . $first . " " . $last . "</option>";
                        $i++
                    }
                    
                ?>
                </select>
                Age: <input class="indented" type="text" name="age"/>
                Phone: <input class="indented" type="text" name="phone"/>
                Email: <input class="indented" type="text" name="email"/>
                </div>
            </form>
        </dvi>
        <div id='viewentries'></div>
    </body>
</html>