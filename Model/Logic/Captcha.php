<?php 

class Captcha { 

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

 

    public function __construct() { 
        $this->generateCaptcha(); 
    } 

    public function generateCaptcha() { 

        $keys = array_keys($this->questions); 

        $this->question = $keys[array_rand($keys)]; 

        $this->answer = $this->questions[$this->question]; 

        $this->generateChoices();
    } 

    private function generateChoices() { 
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

    public function getQuestion() { 

        return $this->question; 

    } 


    public function getChoices() { 

        return $this->choices; 
    } 

    public function getResp(): string{
        return $this->answer;
    }

    public function validate($response): bool { 
        return $this->answer == $response;
    } 

} 

?>