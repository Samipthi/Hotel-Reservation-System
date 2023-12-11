<?php
    session_start();
    include '../config.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlueBird - Admin</title>
    <!-- boot -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- fontowesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
	<!-- css for table and search bar -->
	<link rel="stylesheet" href="css/roombook.css">

</head>
<body>
	<div class="searchsection">
        <input type="text" name="search_bar" id="search_bar" placeholder="search..." onkeyup="searchFun()">
    </div>

    <div class="roombooktable" class="table-responsive-xl">
        <?php
            $paymanttablesql = "SELECT * FROM payment p, user u, booking b, room r
                                 WHERE p.user_id= u.id and p.booking_id= b.booking_id and b.room_no = r.room_no";
            $paymantresult = mysqli_query($conn, $paymanttablesql);

            $nums = mysqli_num_rows($paymantresult);
        ?>
        <table class="table table-bordered" id="table-data">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Username</th>
                    <th scope="col">check-in</th>
                    <th scope="col">check-out</th>
                    <th scope="col">room type</th>
                    <th scope="col">room price</th>
					<th scope="col">pay method</th>
					<th scope="col">Total Bill</th>
                    <th scope="col">Action</th>
                    <!-- <th>Delete</th> -->
                </tr>
            </thead>

            <tbody>
            <?php
            while ($res = mysqli_fetch_array($paymantresult)) {
            ?>
                <tr>
                    <td><?php echo $res['payment_id'] ?></td>
                    <td><?php echo $res['username'] ?></td>
                    <td><?php echo $res['check_InDate'] ?></td>
                    <td><?php echo $res['check_OutDate'] ?></td>
					<td><?php echo $res['room_type'] ?></td>
                    <td><?php echo $res['price'] ?></td>
                    <td><?php echo $res['pay_Method'] ?></td>
					<td><?php echo $res['amount'] ?></td>
                    
                    <td class="action">
                       	<a href="paymantdelete.php?payment_id=<?php echo $res['payment_id']?>"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</body>

<script>
    //search bar logic using js
    const searchFun = () =>{
        let filter = document.getElementById('search_bar').value.toUpperCase();

        let myTable = document.getElementById("table-data");

        let tr = myTable.getElementsByTagName('tr');

        for(var i = 0; i< tr.length;i++){
            let td = tr[i].getElementsByTagName('td')[1];

            if(td){
                let textvalue = td.textContent || td.innerHTML;

                if(textvalue.toUpperCase().indexOf(filter) > -1){
                    tr[i].style.display = "";
                }else{
                    tr[i].style.display = "none";
                }
            }
        }

    }

</script>

</html>