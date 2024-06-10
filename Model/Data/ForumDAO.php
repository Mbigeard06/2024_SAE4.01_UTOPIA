<?php

class ForumDAO implements IForumDAO
{

    private IDatabase $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllForums(): array
    {
        $sql = "select * from topics;";
        return $this->db->executeQuery($sql);
    }

    public function getForumById(int $id): array
    {
        $sql = "select * from topics where topic_id=?;";
        return $this->db->executeQuery($sql, array($id));
    }
}
