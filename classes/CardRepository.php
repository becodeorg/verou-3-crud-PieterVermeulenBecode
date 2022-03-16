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
        if(!empty($_GET['name']))
        {
            $que="INSERT INTO `boardgames` (`name`, `score`, `link`) VALUES ( '{$this->getGet('name')}', '{$this->getGet('score')}', '{$this->getGet('link')}');";
            
            $q=$this->databaseManager->connection->prepare($que);
            $q->execute();
        }
    // TODO: provide the create logic   

    }
    private function getGet($name)
    {   
        if(empty($_GET[$name]))
        {
            if($name=="score")
            {
                return 0;
            }else 
            {
                return "empty";
            }
        }else 
        {
            return $_GET[$name];
        }
        
    }
    // Get one
    public function find($id): array
    {
        $que="SELECT * FROM boardgames WHERE id='{$id}';";
            $q=$this->databaseManager->connection->prepare($que);
            $q->execute();
            return $q->fetchAll(PDO::FETCH_ASSOC);
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

    public function update($id): void
    {   
            
            if(!empty($_GET['name']))
            {   
                $que="UPDATE boardgames SET `name` = '{$_GET['name']}' WHERE id = '{$id}';";
                $q=$this->databaseManager->connection->prepare($que);
                $q->execute();
                // $que="UPDATE boardgames SET `name` = ':name' WHERE id = '{$id}';";
                // $q=$this->databaseManager->connection->prepare($que);
                // $q->execute([
                //     ':name'=> $_GET['name']
                // ]);
            }
            if(!empty($_GET['score']))
            {
                $que="UPDATE boardgames SET score = '{$_GET['score']}' WHERE (id = '{$id}');";
                $q=$this->databaseManager->connection->prepare($que);
                $q->execute();
            }
            if(!empty($_GET['link']))
            {
                $que="UPDATE boardgames SET link = '{$_GET['link']}' WHERE (id = '{$id}');";
                $q=$this->databaseManager->connection->prepare($que);
                $q->execute();
            }
                    
    }

    public function delete($id)
    {
        $que="DELETE FROM `boardgameCollection`.`boardgames` WHERE (`id` = '{$id}');";
        $q=$this->databaseManager->connection->prepare($que);
        $q->execute();
        
        $que="SELECT * FROM boardgames;";
        $q=$this->databaseManager->connection->prepare($que);
        $q->execute();
        return $q->fetchAll(PDO::FETCH_ASSOC);

    }

}