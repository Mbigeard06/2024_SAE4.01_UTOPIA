<?php

interface IForumDAO
{
    public function getAllForums(): array;
    public function getForumById(int $id): array;
    public function createForum(array $data);
}
