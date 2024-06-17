<?php

interface ICategoryDAO
{
    public function getCategoryById(int $id): array;
    public function getAllCategories():array;
}
