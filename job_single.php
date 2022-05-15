
<?php include '../inc/header.php'; ?>

<?php
//Get job id
$id = $_GET['id'];
//instantiate database class
$database = new Database();
$conn = $database->connect();
//instantiate the job class
$job = new Job($conn);

$result =  $job->getJob($id);
while ($row = $result->fetch()){?>
    <h2 class="page-header"><?php echo $row['job_title']?>
        (<?php echo $row['location'];?>)</h2 >
    <small>Posted by <?php echo $row['contact_user']?> on <?php echo $row['post_date'];?></small>
    <hr>
    <p class="lead"><?php echo $row['description'];?></p>
    <ul class="list-group">
        <li class="list-group-item">
            <strong>Company:</strong> <?php echo $row['company']; ?>
        </li>
        <li class="list-group-item">
            <strong>Salary:</strong> <?php echo $row['salary']; ?>
        </li>
        <li class="list-group-item">
            <strong>Contact Email:</strong> <?php echo $row['contact_email']; ?>
        </li>
    </ul>
    <br><br>
    <a href="index.php">Go Back</a>
    <br><br>
    <div class="well">
        <a href="edit.php?id=<?php echo $row['id'];?>" class="btn btn-default">Edit</a>

        <form style="display: inline" action="job.php" method="post">
            <input type="hidden" name="del_id" value="<?php echo $row['id'];?>">
            <input type="submit" class="btn btn-danger" value="Delete">
        </form>
    </div>


    <?php
}

    ?>
<?php include '../inc/footer.php';
