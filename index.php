<?php

// Require the correct variable type to be used (no auto-converting)
declare (strict_types = 1);

// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Load you classes
require_once 'config.php';
require_once 'classes/DatabaseManager.php';
require_once 'classes/CardRepository.php';

	
	
$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
$databaseManager->connect();

// This example is about a Pokémon card collection
// Update the naming if you'd like to work with another collection
$cardRepository = new CardRepository($databaseManager);
$cards = $cardRepository->get();
// Add values to the session.

// Get the current action to execute
// If nothing is specified, it will remain empty (home should be loaded)
$action = $_GET['action'] ?? null;
$id=$_GET['id']?? null;

// Load the relevant action
// This system will help you to only execute the code you want, instead of all of it (or complex if statements)
switch ($action) {
    case 'create':
        create($cardRepository);
        break;
    case 'edit':
        update($cardRepository,$id);
            break;
    case 'delete':
        delete($cards,$cardRepository,$id);
            break;
    default:
        overview($cards);
        break;
}

function overview($cards)
{
    // Load your view
    // Tip: you can load this dynamically and based on a variable, if you want to load another view
    require 'overview.php';
}

function create($cardRepository)
{
    $cardRepository->create();    
    require 'create.php';
}

function update($cardRepository,$id)
{   
    $cardRepository->update($id); 
    $cards=$cardRepository->find($id); 
    $card=$cards[0];   
    require 'edit.php';
}
function delete($cards,$cardRepository,$id)
{      
    $cards=$cardRepository->delete($id);    
    require 'overview.php';
}


