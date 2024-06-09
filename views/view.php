<?php
class view
{
    private string $file;

    public function __construct(string $action)
    {
        // Détermination du nom du fichier vue à partir de l'action
        $this->file = "Views/view" . $action . ".php";
    }

    // Génère et affiche la vue
    public function generate(array $data)
    {
        // Génération de la partie spécifique de la vue
        $content = $this->generateFile($this->file, $data);
        // Génération du gabarit commun utilisant la partie spécifique
        $view = $this->generateFile(
            'Views/template.php',
            array('title' => $data["title"], 'content' => $content)
        );
        // Renvoi de la vue au navigateur
        echo $view;
    }

    // Génère un fichier vue et renvoie le résultat produit
    private function generateFile(string $file, array $data)
    {
        if (file_exists($file)) {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            // Voir la documentation de extract
            extract($data);
            // Démarrage de la temporisation de sortie
            ob_start();
            // Inclut le fichier vue
            // Son résultat est placé dans le tampon de sortie
            require $file;
            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();
        } else {
            throw new Exception("Fichier '$file' introuvable");
        }
    }
}
