<?php

class Forum{
    private int $idForum;
    private string $subject;
    private DateTime $date;
    private Category $category;
    private User $creator;

    /**
     * Constructeur de la classe Forum.
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
    public function getIdForum(): int
    {
        return $this->idForum;
    }

    /**
     * Définit la valeur de id.
     *
     * @param int $id
     */
    public function setIdForum(int $idForum): void
    {
        $this->idForum = $idForum;
    }

    /**
     * Obtient la valeur de subjet.
     *
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * Définit la valeur de subjet.
     *
     * @param string $subjet
     */
    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * Obtient la valeur de date.
     *
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * Définit la valeur de date.
     *
     * @param DateTime $date
     */
    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * Obtient la valeur de category.
     *
     * @return int
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * Définit la valeur de category.
     *
     * @param int $category
     */
    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    /**
     * Obtient la valeur de creator.
     *
     * @return User
     */
    public function getCreator(): User
    {
        return $this->creator;
    }

    /**
     * Définit la valeur de creator.
     *
     * @param User $creator
     */
    public function setCreator(User $creator): void
    {
        $this->creator = $creator;
    }
}
