<?php

// This class is focussed on dealing with queries for one type of data
// That allows for easier re-using and it's rather easy to find all your queries
// This technique is called the repository pattern
class CardRepository
{
    private DatabaseManager $databaseManager;

    // This class needs a database connection to function
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    public function create(): void
    {
       
        if(!empty($_GET))
        {
            $que="INSERT INTO `boardgames` (`name`, `score`, `link`) VALUES ( '{$this->getGet('name')}', '{$this->getGet('score')}', '{$this->getGet('link')}');";
            
            $q=$this->databaseManager->connection->prepare($que);
            $q->execute();
        }
    // TODO: provide the create logic
   
    
    
    require 'create.php';

    }
    private function getGet($name)
    {   var_dump($_GET);
        if(!empty($_GET[$name]))
        {
            return $_GET[$name];
        }
        elseif($name=="score")
        {
            return 0;
        }else 
        {
            return "empty";
        }
    }
    // Get one
    public function find(): array
    {

    }

    // Get all
    public function get(): array
    {
        // TODO: replace dummy data by real one
        $que="SELECT * FROM boardgames;";
        $q=$this->databaseManager->connection->prepare($que);
        $q->execute();
        return $q->fetchAll(PDO::FETCH_ASSOC);
        // We get the database connection first, so we can apply our queries with it
        // return $this->databaseManager->connection-> (runYourQueryHere)
    }

    public function update(): void
    {

    }

    public function delete(): void
    {

    }

}