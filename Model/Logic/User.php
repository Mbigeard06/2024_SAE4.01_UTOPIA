<?php
/**
 * Class User
 *
 * Représente un utilisateur avec ses informations personnelles.
 */
class User
{
    private string $username;
    private string $email;
    private string $password;
    private string $firstName;
    private string $lastName;

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
     * Hydrate l'objet avec un tableau de données.
     *
     * @param array $data Tableau associatif de données pour remplir l'objet.
     */
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);     
                //echo("<script>alert(".var_dump($value).")</script>");       
            }
        }
    }
}