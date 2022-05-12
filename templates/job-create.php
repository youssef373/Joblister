<?php
include '../inc/header.php';
?>
<?php
//instantiate the database class
$database = new Database();
$conn = $database->connect();
//instantiate the job class
$job = new Job($conn);

?>


<h2 class="page-header">Create Job Listing</h2>
<form method="post" action="create.php">
    <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="category_id">
            <option value="0">Choose Category</option>
            <?php
            //get categories
            $categories = $job->getCategories();
            //count rows
            $count = $categories->rowCount();
            if($count > 0)
            {
                while ($row = $categories->fetch()){?>

                    <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                    <?php
                }

            }

            ?>
        </select>
    </div>
            <div class="form-group">
                <label>Company</label>
                <input type="text" class="form-control" name="company">
            </div>
            <div class="form-group">
                <label>Job Title</label>
                <input type="text" class="form-control" name="job_title">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <div class="form-group">
                <label>Location</label>
                <input type="text" class="form-control" name="location">
            </div>
            <div class="form-group">
                <label>salary</label>
                <input type="text" class="form-control" name="salary">
            </div>
            <div class="form-group">
                <label>contact user</label>
                <input type="text" class="form-control" name="contact_user">
            </div>
        <div class="form-group">
            <label>contact email</label>
            <input type="text" class="form-control" name="contact_email">
        </div>
        <input type="submit" class="btn btn-primary" value="Submit" name="submit">
</form>

<br>
<br>
<?php include '../inc/footer.php' ?>


