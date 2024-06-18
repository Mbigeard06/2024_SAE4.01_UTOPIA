<?php

/**
 * Représente le captcha lors de la connexion
 */
class Captcha
{

    private $questions = [

        "Combien font 2 + 2 ?" => "4",

        "Quel est le nom de notre planète ?" => "Terre",

        "Quelle est la couleur du ciel un jour clair ?" => "Bleu",

        "Combien de jours dans une semaine ?" => "7",

        "Quelle est la première lettre de l'alphabet ?" => "A"
    ];

    private string $question;

    private string $answer;

    private array $choices;

    /**
     * Constructeur du captcha
     */
    public function __construct()
    {
        //La session n'a pas de captcha
        if (!isset($_SESSION["captcha"])) {
            $this->generateCaptcha();
            // Enregistrez le captcha dans la session
            $_SESSION["captcha"] = serialize($this);
        } else {
            // Récupération du captcha depuis la session
            $captcha = unserialize($_SESSION["captcha"]);
            $this->question = $captcha->question;
            $this->answer = $captcha->answer;
            $this->choices = $captcha->choices;
        }
    }

    /**
     * Génère le captcha
     */
    public function generateCaptcha(): void
    {
        $keys = array_keys($this->questions);

        $this->question = $keys[array_rand($keys)];

        $this->answer = $this->questions[$this->question];

        $this->generateChoices();
    }

    private function generateChoices(): void
    {
        $choices = array_values($this->questions);

        // Remove the correct answer from the list of choices to avoid duplication
        if (($key = array_search($this->answer, $choices)) !== false) {
            unset($choices[$key]);
        }

        // Shuffle and slice to get a random set of choices
        shuffle($choices);
        $choices = array_slice($choices, 0, 3);

        // Add the correct answer back in
        $choices[] = $this->answer;

        // Shuffle again to mix the correct answer with the others
        shuffle($choices);

        $this->choices = $choices;
    }

    /**
     * Récupère la question du captcha
     * @return string la question du captcha
     */
    public function getQuestion(): string
    {

        return $this->question;
    }


    /**
     * Récupère les choix du captcha
     * @return array les choixs du captcha
     */
    public function getChoices(): array
    {

        return $this->choices;
    }


    /**
     * Récupère la réponse du captcha
     * @return string réponde au captcha
     */
    public function getResp(): string
    {
        return $this->answer;
    }


    /**
     * Détermine si le captcha est validé ou non
     * @param string $response réponse donnée
     * @return bool renvoie True si la réponse est correcte et false sinon
     */
    public function validate(string $response): bool
    {
        return $this->answer == $response;
    }
}
