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
                        <h2 class="mt-0 page-title">Add Location</h2>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <form id="contactForm" method="POST" >
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="text" name="Location" placeholder="Bus Name" required ="required" />
                                <label for="email">Location</label>
                            </div>
                            
                            <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" name="signupSubmit" type="submit">Add Bus</button></div>
                        </form>

                        <table class="table bs-table-striped-color" style="color: white;">
                            <thead>
                                <th>ID</th>
                                <th>Location</th>
                            </thead>
                            <tbody>
                                <?php 
                                    $n = 0;
                                    $query = "Select * from Location ";
                                    $query1 = mysqli_query($con,$query);
                                    while($res = mysqli_fetch_assoc($query1)){
                                ?>
                                <tr>
                                    <td><?php echo $res['id']; ?></td>
                                    <td><?php echo $res['Location']; ?></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </header>

        <?php
            if(isset($_POST['signupSubmit'])){
                $Location = $_POST['Location'];
                
                $sql = "INSERT INTO `Location`(`Location`) VALUES('$Location')";
                if(mysqli_query($con,$sql)){
                    echo "<script type='text/javascript'>alert('Location Successfully Added') </script>";
                    echo "<script>window.location.href='index.php'</script>";
                }else {
                    echo "<script type='text/javascript'>alert('Sorry Please add the Location again')</script>";
                }
            }
        ?>
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
