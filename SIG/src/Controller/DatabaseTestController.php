<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\DBAL\Connection;


class DatabaseTestController extends AbstractController
{
    #[Route('/database/test', name: 'app_database_test')]

    public function testDbConnection(Connection $connection): Response
    {
        try {
            // Try to connect to the database
            $connection->connect();

            // If connected, retrieve the current database name
            $databaseName = $connection->getDatabase();

            // Create a success message
            $message = "Successfully connected to the database: " . $databaseName;
        } catch (\Exception $e) {
            // If there is an error, create an error message
            $message = "Failed to connect to the database: " . $e->getMessage();
        }

        // Return the message as a Response
        return new Response($message);
    }
}
