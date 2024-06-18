<?php

/**
 * Représente les blogs de l'application
 */
class Blog
{
    private int $idBlog;
    private string $title;
    private string $image;
    private User $creator;
    private DateTime $date;
    private int $votes;
    private string $content;

    /**
     * Constructeur de la classe Blog
     * @param array $data Tableau associatif contenant les données pour initialiser l'objet Blog
     */
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    /**
     * Hydrate l'objet Blog avec les données fournies
     * @param array $data Tableau associatif contenant les données.
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
     * Retourne l'identifiant du blog
     * @return int L'identifiant du blog
     */
    public function getIdBlog(): int
    {
        return $this->idBlog;
    }

    /**
     * Définit l'identifiant du blog
     * @param int $idBlog L'identifiant du blog
     */
    public function setIdBlog(int $idBlog): void
    {
        $this->idBlog = $idBlog;
    }

    /**
     * Retourne le titre du blog
     * @return string Le titre du blog
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Définit le titre du blog
     * @param string $title Le titre du blog
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Retourne l'URL de l'image du blog
     * @return string L'URL de l'image du blog
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * Définit l'URL de l'image du blog
     * @param string $image L'URL de l'image du blog
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * Retourne le créateur du blog
     * @return User Le créateur du blog
     */
    public function getCreator(): User
    {
        return $this->creator;
    }

    /**
     * Définit le créateur du blog
     * @param User $creator Le créateur du blog
     */
    public function setCreator(User $creator): void
    {
        $this->creator = $creator;
    }

    /**
     * Retourne la date de création du blog
     * @return DateTime La date de création du blog
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * Définit la date de création du blog
     * @param DateTime $date La date de création du blog
     */
    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * Retourne le nombre de votes du blog
     * @return int Le nombre de votes du blog
     */
    public function getVotes(): int
    {
        return $this->votes;
    }

    /**
     * Définit le nombre de votes du blog
     * @param int $votes Le nombre de votes du blog
     */
    public function setVotes(int $votes): void
    {
        $this->votes = $votes;
    }

    /**
     * Retourne le contenu du blog
     * @return string Le contenu du blog
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Définit le contenu du blog
     * @param string $content Le contenu du blog
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }
}
