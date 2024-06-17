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
        $sql = "select * from topics order by date desc limit 6;";
        return $this->db->executeQuery($sql);
    }

    public function getForumById(int $id): array
    {
        $sql = "select * from topics where idTopic=?;";
        return $this->db->executeQuery($sql, array($id));
    }

    public function createForum(array $data){
        $sql = "insert into topics (subject, date, category, creator) values (?,?,?,?);";
        $this->db->executeNonQuery($sql, $data);
    }
}
