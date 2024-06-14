<?php

/**
 * Class User
 *
 * Représente un utilisateur avec ses informations personnelles.
 */
class User
{
    private int $id;
    private string $username;
    private string $email;
    private string $password;
    private string $firstName;
    private string $lastName;
    private int $level;
    private string $headline;
    private string $profilePicture;

    /**
     * Constructeur de la classe User.
     *
     * @param array $data Données pour hydrater l'objet.
     */
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }


    /**
     * Retourne l'id de l'utilisateur
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Définit l'id de l'utilisateur 
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * Retourne le nom d'utilisateur.
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Définit le nom d'utilisateur.
     *
     * @param string $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * Retourne l'adresse e-mail de l'utilisateur.
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Définit l'adresse e-mail de l'utilisateur.
     *
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * Retourne le mot de passe de l'utilisateur.
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Définit le mot de passe de l'utilisateur.
     *
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * Retourne le prénom de l'utilisateur.
     *
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * Définit le prénom de l'utilisateur.
     *
     * @param string $firstName
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Retourne le nom de famille de l'utilisateur.
     *
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * Définit le nom de famille de l'utilisateur.
     *
     * @param string $lastName
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * Retourne le niveaqu d'acréditation de l'utilisateur
     * @return int 
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * Défini le niveau d'acréditation de l'utilisateur
     * @param int $level
     */
    public function setLevel(int $level)
    {
        $this->level = $level;
    }

    /**
     * Retourne la bio de l'utilisateur
     * @return string 
     */
    public function getHeadline(): string
    {
        return $this->headline;
    }


    /**
     * Définit la bio de l'utilisateur 
     * @param string $headline
     */
    public function setHeadline(string $headline)
    {
        $this->headline = $headline;
    }


    /**
     * Retourne la photo de profile de l'utilisateur 
     * @return string
     */
    public function getProfilePicture(): string
    {
        return $this->profilePicture;
    }


    /**
     * Définit la photo de profile de l'utilisateur
     * @param string $profilePicture
     */
    public function setProfilePicture(string $profilePicture)
    {
        $this->profilePicture = $profilePicture;
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
}
