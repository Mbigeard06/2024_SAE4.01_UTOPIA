<?php

class Category{
    private int $idCategory;
    private string $name;
    private string $description;

    /**
     * Constructeur de la classe Category.
     *
     * @param array $data Tableau associatif de données pour remplir l'objet.
     */
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    /**
     * Hydrate l'objet avec un tableau de données.
     *
     * @param array $data Tableau associatif de données pour remplir l'objet.
     */
    public function hydrate(array $data): void
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);      
            }
        }
    }

    /**
     * Obtient la valeur de id.
     *
     * @return int
     */
    public function getIdCategory(): int
    {
        return $this->idCategory;
    }

    /**
     * Définit la valeur de id.
     *
     * @param int $id
     */
    public function setIdCategory(int $idCategory): void
    {
        $this->idCategory = $idCategory;
    }

    /**
     * Obtient la valeur de name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Définit la valeur de name.
     *
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Obtient la valeur de description.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Définit la valeur de description.
     *
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}
