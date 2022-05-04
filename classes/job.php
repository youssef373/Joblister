<?php

class Job
{
    private $conn;

    //constructor
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    //Get ALL Jobs
    public function getAllJobs()
    {
        //create query
        $query = "SELECT jobs.*, categories.name AS cname
                FROM jobs
                INNER JOIN categories
                ON jobs.category_id = categories.id
                ORDER BY post_date DESC
        ";

        //prepare query
        $stmt = $this->conn->prepare($query);

        //execute the query
        $stmt->execute();

        return $stmt;

    }

    //Get Categories
    public function getCategories()
    {
        //create query
        $query = "SELECT * FROM categories";
        //prepare the query
        $stmt = $this->conn->prepare($query);
        //execute the query
        $stmt->execute();

        return $stmt;

    }

    //Get Jobs By Category
    public function getJobByCategory($category)
    {
        //Create query
        $query = "SELECT jobs.*, categories.name AS cname
                    FROM jobs
                    INNER JOIN categories  
                    ON jobs.category_id = categories.id
                    WHERE categories.id = $category
                    ORDER BY post_date DESC 
                    ";
        //Prepare the query
        $stmt = $this->conn->prepare($query);
        //execute the query
        $stmt->execute();

        return $stmt;
    }

    //get Job
    public function getJob($id)
    {
        //Create Query
        $query = "SELECT * FROM jobs WHERE id=$id";
        //prepare the query
        $stmt = $this->conn->prepare($query);
        //execute the query
        $stmt->execute();

        return $stmt;

    }

    // Create Job
    public function create($data): bool
    {
        $data = [
            'category_id' => $data['category_id'],
            'job_title' => $data['job_title'],
            'company' => $data['company'],
            'description' =>$data['description'],
            'location' => $data['location'],
            'salary' => $data['salary'],
            'contact_user' => $data['contact_user'],
            'contact_email' =>$data['contact_email'],
        ];
        //create query
        $query = "INSERT INTO jobs (category_id, job_title,
             company, description, location, salary,contact_user, contact_email)
             VALUES (:category_id,:job_title, :company, :description,
             :location, :salary, :contact_user, :contact_email)";
        //prepare the query
        $stmt = $this->conn->prepare($query);
        //execute the query
        if($stmt->execute($data))
        {
            return true;
        }
        else
        {
            return false;
        }

    }
    //Get Category
    public function getCategory($category)
    {
        //create query
        $query = "SELECT name FROM categories WHERE id = $category";
        //prepare the query
        $stmt = $this->conn->prepare($query);
        //execute the query
        $stmt->execute();

        return $stmt;

    }
    //Delete Job
    public function delete($id): bool
    {
        //Create query
        $query = "DELETE FROM jobs WHERE id = $id";
        //prepare query
        $stmt = $this->conn->prepare($query);
        //execute the query
        if($stmt->execute())
        {
            return true;
        }
        else
        {
            return false;
        }

    }
    public function update($id, $data): bool
    {
        $data = [
            'category_id' => $data['category_id'],
            'job_title' => $data['job_title'],
            'company' => $data['company'],
            'description' =>$data['description'],
            'location' => $data['location'],
            'salary' => $data['salary'],
            'contact_user' => $data['contact_user'],
            'contact_email' =>$data['contact_email'],
        ];
        $query ="UPDATE jobs
                SET
                category_id = :category_id,
                job_title = :job_title,
                company = :company,
                description = :description,
                location = :location,
                salary = :salary,
                contact_user = :contact_user,
                contact_email = :contact_email
                WHERE id = $id";
        $stmt = $this->conn->prepare($query);

        if($stmt->execute($data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }


}