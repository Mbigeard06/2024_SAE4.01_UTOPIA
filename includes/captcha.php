<?php
class Captcha {
    private $questions = [
        "Combien font 2 + 2 ?" => "4",
        "Quel est le nom de notre planète ?" => "Terre",
        "Quelle est la couleur du ciel un jour clair ?" => "Bleu",
        "Combien de jours dans une semaine ?" => "7",
        "Quelle est la première lettre de l'alphabet ?" => "A"
    ];

    private $question;
    private $answer;
    private $choices;

    public function __construct() {
        $this->generateCaptcha();
    }

    private function generateCaptcha() {
        $keys = array_keys($this->questions);
        $this->question = $keys[array_rand($keys)];
        $this->answer = $this->questions[$this->question];
        $this->generateChoices();
    }

    private function generateChoices() {
        $choices = array_values($this->questions);
        shuffle($choices);
        if (!in_array($this->answer, $choices)) {
            $choices[array_rand($choices)] = $this->answer;
        }
        $this->choices = array_slice($choices, 0, 4);
        shuffle($this->choices);
    }

    public function getQuestion() {
        return $this->question;
    }

    public function getChoices() {
        return $this->choices;
    }

    public function validate($response) {
        return strtolower(trim($response)) === strtolower($this->answer);
    }
}
?>
