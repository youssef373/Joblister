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
<?php
$id = $_GET['id'];
$result = $job->getJob($id);
$count = $result->rowCount();

if($count > 0)
{
    while ($row = $result->fetch()){?>
        <form method="post" action="edit.php?id=<?php echo $row['id'];?>">
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
                        while ($row1 = $categories->fetch()){?>

                            <?php if($row['category_id'] == $row1['id']) : ?>
                            <option value="<?php echo $row1['id']; ?>" selected>
                                <?php echo $row1['name']; ?></option>
                            <?php else: ?>
                            <option value="<?php echo $row1['id']; ?>"><?php echo
                            $row1['name']; ?></option>
                            <?php endif; ?>
                            <?php
                        }

                    }

                    ?>
                </select>

            </div>
                <div class="form-group">
                    <label>Company</label>
                    <input type="text" class="form-control" name="company" value="<?php echo $row['company'];?>">
                </div>

                <div class="form-group">
                    <label>Job Title</label>
                    <input type="text" class="form-control" name="job_title" value="<?php echo $row['job_title'];?>">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description"><?php echo $row['description'];?></textarea>
                </div>

                <div class="form-group">
                    <label>Location</label>
                    <input type="text" class="form-control" name="location" value="<?php echo $row['location'];?>">
                </div>

                <div class="form-group">
                    <label>salary</label>
                    <input type="text" class="form-control" name="salary" value="<?php echo $row['salary'];?>">
                </div>

                <div class="form-group">
                    <label>contact user</label>
                    <input type="text" class="form-control" name="contact_user" value="<?php echo $row['contact_user'];?>"
                </div>

                <div class="form-group">
                    <label>contact email</label>
                    <input type="text" class="form-control" name="contact_email" value="<?php echo $row['contact_email'];?>"
                </div>

                <input type="submit" class="btn btn-primary" value="Submit" name="submit">
            </form>
        <?php
        }
}
    ?>


<br>
<br>
<?php include '../inc/footer.php' ?>


