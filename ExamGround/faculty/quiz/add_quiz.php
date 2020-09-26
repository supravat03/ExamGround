<?php

session_start();

if (isset($_POST['all_done'])) {

    unset($_SESSION['t_id']);
    unset($_SESSION['ADD']);
    unset($_SESSION['ak']);
}


if (isset($_POST['ADD'])) {
    if (
        isset($_POST['question']) && isset($_POST['op1']) && isset($_POST['op2']) && isset($_POST['op3']) && isset($_POST['op4'])
        && isset($_POST['ans'])
    ) {


        $t_id = $_SESSION['t_id'];

        $Q = $_POST['question'];
        $op1 = $_POST['op1'];
        $op2 = $_POST['op2'];
        $op3 = $_POST['op3'];
        $op4 = $_POST['op4'];
        $ans = $_POST['ans'];

        $sql = "INSERT INTO mcq (t_id,question,s1,s2,s3,s4,ans) VALUES (?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issssss", $t_id, $Q, $op1, $op2, $op3, $op4, $ans);
        $stmt->execute();
        $_SESSION['success'] = "<h3 style='color : green;'> Question Added successfully </h3>";

        $query = mysqli_query($conn, "SELECT * FROM mcq WHERE t_id ='" . $_SESSION['t_id'] . "'");
        $row = mysqli_fetch_array($query);
        $_SESSION['ADD'] = $row['id'];


        echo "done";
    } else {
        echo "missing";
    }
}
?>
<?php
if (isset($_POST["save"])) {
    $s_code = $_POST["s_code"];
    if (sizeof($s_code) === 0) {
        echo "kuch to choose kr";
    } elseif (sizeof($s_code) === 2) {
        echo "1 hi kr be choose";
    } else {
        if ($s_code[0] === "") {
            $final = $s_code[1];
        } else $final = $s_code[0];

        mysqli_query($conn, "INSERT INTO test(t_name,subject_code) VALUES ('$_POST[t]','$final' )") or die(mysqli_error($conn));

        $t = mysqli_query($conn, "SELECT * FROM test WHERE t_name ='" . $_POST['t'] . "' AND subject_code='" . $final . "'");
        $r = mysqli_fetch_array($t);
        $_SESSION['t_id'] = $r['t_id'];
        $_SESSION['ak']="ak";
    }
} ?>



<?php

if (isset($_SESSION['t_id']) || isset($_SESSION['ADD'])) { ?>

    <div class="container" style="text-align: center;">
        <div class=" ">
            <div id="add_mcq" class=" ">



                <div style="text-align: center; margin-left: 10%">
                    <?php if (isset($_SESSION['success'])) echo $_SESSION['success']; unset($_SESSION['success']); ?>

                </div>
                <!-- add question tab -->

                <form id="add_Q_form" action="" method="post">
                    <h4>enter question</h4>
                    <p> <textarea name="question" id="" cols="70" rows="3" required></textarea> </p>
                    <p> enter option 1 <input type="text" name="op1" class="Q" id="" required> </p>
                    <p> enter option 2 <input type="text" name="op2" class="Q" id="" required> </p>
                    <p> enter option 3 <input type="text" name="op3" class="Q" id="" required> </p>
                    <p> enter option 4 <input type="text" name="op4" class="Q" id="" required> </p>
                    <p>
                        Enter Answer
                        <select name="ans" id="" style="margin-left: 10px;" required>
                            <option value="1">option 1</option>
                            <option value="2">option 2</option>
                            <option value="3">option 3</option>
                            <option value="4">option 4</option>
                        </select>

                    </p>

                    <p><input id="add_Q" type="submit" class="btn btn-primary" name="ADD"></p>




                </form>

                <form action="" method="post">

                    <button id="add_more" type="button" class="btn btn-warning" name="add_more">Add More</button>
                    <button type="submit" class="btn btn-danger" name="all_done">All Done</button>
                </form>



            </div>



            <!-- *************************** -->


        </div>
    <?php
} ?>
    <?php
    if (!isset($_POST["save"]) && !isset($_SESSION['ADD']) && !isset($_POST['ADD']) && !isset($_SESSION['ak'])) {
        $sql = mysqli_query($conn, "SELECT * FROM prof WHERE email ='" . $_SESSION['faculty_login'] . "'");
        $r = mysqli_num_rows($sql);
        if ($r == false) {
            echo "<h3 style='color:Red'>No any records found ! </h3>";
        } else {
            while ($row = mysqli_fetch_array($sql)) {
    ?>

                <form method="post" enctype="multipart/form-data">
                    <table class="table table-bordered" style="margin-bottom:50px">
                        <h1>Choose one<h1>
                                <?php echo $row['subject1_code'] ?>:<input type="checkbox" name="s_code[]" value="<?php echo $row['subject1_code'] ?>" /> <br>
                                <?php echo $row['subject2_code'] ?>: <input type="checkbox" name="s_code[]" value="<?php echo $row['subject2_code'] ?>" /> <br>
                                <tr>
                                    <td>Enter test name</td>
                                    <Td><input type="text" name="t" class="form-control" required /></td>
                                </tr>
                                <tr>

                                    <Td colspan="2" align="center">
                                        <input type="submit" value="Save" class="btn btn-info" name="save" />
                                    </td>
                                </tr>
                    </table>
                </form>
    <?php  }
        }
    } ?>
    <!-- jquery cdn -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- bootstrap js -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


    <script>

    </script>

    <body>
    </body>