<?php
    include('include/con.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Bus Booking</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <style type="text/css">
            .page-title{
                color: rgba(255, 255, 255, 0.7);
                font-family: "Merriweather Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                font-weight: 700;
            }
        </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <?php 
            include('include/menu.php');
        ?>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0 page-title">Check Availability</h2>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <form id="contactForm" method="POST" >
                            
                            <div class="form-floating mb-3">
                                <select class="form-control" name="busFrom">
                                    <?php 
                                    $n = 0;
                                    $query = "Select * from Location";
                                    $query1 = mysqli_query($con,$query);
                                    while($res = mysqli_fetch_assoc($query1)){
                                ?>
                                    <option value="<?php echo $res['id'] ?>"><?php echo $res['Location'] ?></option>
                                <?php
                                    }
                                ?>
                                </select>
                                
                                <label for="email">Bus From</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-control" name="busTo">
                                    <?php 
                                    $n = 0;
                                    $query = "Select * from Location";
                                    $query1 = mysqli_query($con,$query);
                                    while($res = mysqli_fetch_assoc($query1)){
                                ?>
                                    <option value="<?php echo $res['id'] ?>"><?php echo $res['Location'] ?></option>
                                <?php
                                    }
                                ?>
                                </select>
                                <label for="email">Bus To</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="number" name="noSeats" placeholder="Number of Seats" required ="required" />
                                <label for="email">Number of Seats</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="date" name="dateoftravel" required ="required" />
                                <label for="email">Date of Travel</label>
                            </div>
                            <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" name="signupSubmit" type="submit">Submit</button></div>
                        </form>

                        <?php 
                            if (isset($_POST['signupSubmit'])){
                                $busFrom = $_POST['busFrom'];
                                $busTo = $_POST['busTo'];
                                $date = $_POST['dateoftravel'];
                                $noSeats = $_POST['noSeats'];
                        ?>
                                <table class="table bs-table-striped-color" style="color: white; width: 150%;margin-left:-50px;">
                            <thead>
                                <th>ID</th>
                                <th>Bus Name</th>
                                <th>Bus Number</th>
                                <th>Bus From</th>
                                <th>Bus To</th>
                                <th>Number of Seats</th>
                                <th>Availale Seats</th>
                                <th>Date</th>
                                <th>Book</th>
                            </thead>
                            <tbody>
                                <?php 
                                    $n = 0;
                                    $query = "Select b.id as id,busName, busNumber,noofseats, dateofTravel, l.location as busFrom,l1.location as busTo, seatsBooked from buses b inner join Location l on b.busFrom= l.id inner join Location l1 on b.busTo= l1.id where b.dateofTravel >= '$date' and b.busFrom='$busFrom' and b.busTo='$busTo' and (noofseats-seatsBooked) >$noSeats-1";
                                    $query1 = mysqli_query($con,$query);
                                    while($res = mysqli_fetch_assoc($query1)){
                                ?>
                                <tr>
                                    <td><?php $n = $n+1; echo $n;  ?></td>
                                    <td><?php echo $res['busName']; ?></td>
                                    <td><?php echo $res['busNumber']; ?></td>
                                    <td><?php echo $res['busFrom']; ?></td>
                                    <td><?php echo $res['busTo']; ?></td>
                                    <td><?php echo $res['noofseats']; ?></td>
                                    <td><?php echo $res['noofseats']-$res['seatsBooked']; ?></td>
                                    <td><?php echo $res['dateofTravel']; ?></td>
                                    <td><a href="book.php?id=<?php echo $res['id']; ?>&qty=<?php echo $noSeats; ?>">Book Ticket</a></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                        <?php
                            }
                        ?>
                    </div>
                </div>
                
            </div>
        </header>


        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2023 - Company Name</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
