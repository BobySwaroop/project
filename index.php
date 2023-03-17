<?php
include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Table with Add and Delete Row Feature</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        input[type="text"] {

            /* border: none;
            /* outline: none; 
            width: 170px; */
            border-color: lightcyan;
        }
        .nm{
         display: none;   
        }
        .line{
            display: flex;
        }
        .demodata{
            display: none;
        }
    </style>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-lg">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8">
                            <h2>Employee <b>Details</b></h2>
                        </div>
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-info add-new add new_user"><i class="fa fa-plus"></i> Add New</button>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="add_user">
                       <!-- demo field add -->
                       
                       <!-- demo field add -->

                        <!-- fetch the user details from database -->
                        <?php
                        $query = "SELECT `id`, `name`, `department`, `phone` FROM `employee`";
                        $res = mysqli_query($conn, $query);
                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                        ?>

                                <tr class="data">
                                <tr>
                        <td class="demodata"><input type="text" name="name"></td>
                        <td class="demodata"><input type="text" name="name"></td>
                        <td class="demodata"><input type="text" name="name"></td>
                        <td class="demodata"><button type="submit" name="submit" class="btn btn-primary">Add</button></td>
                       </tr>
                                    <td class="nm"><?php echo $row['id'];?></td>
                                    <td><?php echo $row['name'];?></td>
                                    <td><?php echo $row['department'];?></td>
                                    <td><?php echo $row['phone'];?></td>
                                    <td>
                                        <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                        <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                        <a href ="delete.php?id=<?php echo $row['id'];?>" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                    </td>
                                </tr>

                        <?php
                            }
                        }

                        ?>
                        <!-- check -->
                        <script>
                        $(".edit").click(function(){
                            var stname = $(this).closest('tr').find('.nm').text();
                            $(".data").css('display','none');
                            $(".demodata").css('display','block');
                            alert(stname);
                        })
                        </script>
                        <!-- check -->
                        
                    


                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $(".new_user").click(function() {
                $(".add_user").append('<div><form action="send.php" method="post" class="line"><tr class="add_data"><td><input type="text" name="name"></td><td><input type="text" name="department"></td><td><input type="text" name="phone"></td><td><button type="submit" name="submit" class="btn btn-primary">Add</button></td></tr></form></div>');
            })
        })
    </script>
</body>

</html>