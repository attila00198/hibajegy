<?php

class TicketController
{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getTicketsByUserID($userID)
    {
        $query = "SELECT * FROM tickets WHERE :user_id = :user_id";
        $stmt = $this->db->prepare($query);
        if($stmt) {
            $stmt->execute([
                ":user_id" => $userID
            ]);
        }

        $tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $tickets;

    }

    public function getAllTickets()
    {
        # code...
    }

    public function getActiveTickets($userID)
    {
        # code...
    }

    public function getInactiveTickets($userID)
    {
        # code...
    }

    public function createTicket()
    {
        
    }

    public function updateTicketStatus()
    {
        # code...
    }

    public function deleteTicket()
    {
        # code...
    }
}