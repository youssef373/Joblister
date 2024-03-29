
<?php
require_once("init.php")
?>

<?php
//instantiate the database class
$database = new Database();
$conn = $database->connect();
//instantiate the job class
$job = new Job($conn);

$template = new Template('templates/job-create.php');

echo $template;

if(isset($_POST['submit'])) {
//Create Data Array
    $data = array();
    $data['category_id'] = $_POST['category_id'];
    $data['job_title'] = $_POST['job_title'];
    $data['company'] = $_POST['company'];
    $data['description'] = $_POST['description'];
    $data['location'] = $_POST['location'];
    $data['salary'] = $_POST['salary'];
    $data['contact_user'] = $_POST['contact_user'];
    $data['contact_email'] = $_POST['contact_email'];

    if ($job->create($data)) {
        redirect('index.php', 'Your job has been listed', 'success');
    } else {
        redirect('index.php', 'Something went wrong', 'error');
    }
}
?>

