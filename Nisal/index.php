<!DOCTYPE html>
<html>
    <head>
<meta charset="UTF-8"> 
<title>KURUMBA JOBS</title>
<link rel ="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;1,700&display=swap" rel="stylesheet">
    </head>
    <body>

        <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src ="images/KurumbaJobs.png" width="125px">
                </div>
                <nav>
                    <ul>
                        <li><a href="html/index.html">Home</a></li>
                        <li><a href="html/Jobs.html">Jobs</a></li>
                        <li><a href="html/about.html">About</a></li>
                        <li><a href="">Contact</a></li>
                        <li><a href="html/account.html">Account</a></li>
                    </ul>
                </nav>
                
            </div>
            <div class="row">
                <div class="col-2">
                </div>
            </div>
        </div><center>
            <?php require_once 'process.php'; ?>

        <?php
        if(isset($_SESSION['message'])):
        ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
        </div>
        <?php endif ?>
        <div class="container">
        <?php
        $mysqli = new mysqli('localhost', 'root', '', 'crud1') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);

        ?>

        <div>
        <table border='1'>
            <thead>
            <tr>
            <th>Company Name</th>
            <th>Job Title</th>
            <th>Job Description</th>
            
            </tr>
            </thead>

        <?php
        while ($row = $result->fetch_assoc()): ?>
        <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td>
        <a href="index.php?edit=<?php echo $row['id'];?>">Edit</a>
        <a href="process.php?delete=<?php echo $row['id'];?>">Delete</a>
        </td>
        </tr>
        <?php endwhile; ?>
        </table><br><br>
        </div>
        <?php

        function pre_r($array){
            echo'<pre>';
            print_r($array);
            echo'</pre>';
        }

        ?>
        <form action="process.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label>Company Name</label>
            <input type="text" value="<?php echo $name; ?>" name="name">
            <label>Job Title</label>
            <input type="text" value="<?php echo $title; ?>" name="title">
            <label>Job Description</label>
            <input type="text" value="<?php echo $description; ?>" name="description"> 
            <?php 
            if($update == true):
                ?>
            <button type="submit" class="button" style="vertical-align:middle" name="update">Update</button>
            <?php else: ?>
            <button type="submit" class="button" style="vertical-align:middle" name="save">Save</button>
            <?php endif; ?>
        </form>
            
    </div>


<!--footer------->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
               <h3>Download Our App</h3>
               <p>Download App for Android and iOS Mobile Phones</p> 
               <div class="app-logo">
                   <img src="images/playandapp.png">
                   
               </div>
            </div>
            <div class="footer-col-2">
                <img src="images/footerkurumba.png">
                <p>Our Main Purpose to make our country having suitable jobs for jobseekers</p> 
             </div>
             <div class="footer-col-3">
                <h3>Useful Links</h3>
                <ul>
                    <li>Blogs</li>
                    <li>Privacy and Policy</li>
                    <li>Feedbacks</li>  
                    <li>Coupons</li>         
                </ul>
             </div>
             <div class="footer-col-4">
                <h3>Follow Us</h3>
                <ul>
                    <li>Facebook</li>
                    <li>Twitter</li>
                    <li>Instagram</li>
                    <li>YouTube</li>           
                </ul>
             </div>
        </div>
        <hr>
        <p class="Copyright">Copyright 2020 - KURUMBA JOBS</p>
    </div>
</div>
    </body>
</html>