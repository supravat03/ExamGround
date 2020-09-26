<?php






if (isset($_POST['ADD'])) {
    if (
        isset($_POST['question']) && isset($_POST['op1']) && isset($_POST['op2']) && isset($_POST['op3']) && isset($_POST['op4'])
        && isset($_POST['ans'])
    ) {


        $t_id = 1;

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




        echo "done";
    } else {
        echo "missing";
    }
}










?>




<body>

    

        <div style="text-align: center; margin-left: 10%">
    <?php if (isset($_SESSION['success'])) echo $_SESSION['success']; ?>
            
        </div>

    <div class="container" style="text-align: center;">
        <div class=" ">
            <div id="add_mcq" class=" ">
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



            </div>
            <button id="add_more" type="button" class="btn btn-warning" name="add_more">Add More</button>
            <button type="button" class="btn btn-danger" name="submit_all">All Done</button>


            <!-- ***************************************************************************** -->


        </div>












        <!-- jquery cdn -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- bootstrap js -->

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


        <script>

        </script>

</body>

</html>