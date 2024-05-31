<?php

session_start();

if (isset($_GET['topic']) && isset($_GET['post']) && ($_GET['by'] == $_SESSION['userId']) 
        && isset($_SESSION['userId']))
{
     //prend la taille du debut 
     $memory_before = memory_get_usage(); 
     ///prend le cpu au debut 
     $startCpuTime = microtime(true);

    require 'dbh.inc.php';
    
    $post = $_GET['post'];
    $topic = $_GET['topic'];
    
    $sql = "delete from posts where post_id=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location: ../posts.php?topic=".$topic."&error=sqlerror");
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt, "s", $post);
        mysqli_stmt_execute($stmt);

        $endCpuTime = microtime(true);
        $cpuTime = $endCpuTime - $startCpuTime;
        $cpuUsage = getrusage()['ru_utime.tv_sec'];
        $cpuUtilisé = ($cpuTime / $cpuUsage) * 100;
        $data_to_write = "\nLa suppression d'un forum utilise :" . $cpuUtilisé ."% du CPU";
        file_put_contents('C:\Users\Bigeard\Desktop\CPU_Plien.txt', $data_to_write, FILE_APPEND);

        $memory_after = memory_get_usage();
        $memory_used = $memory_after - $memory_before;
        $memory_formatted = formatBytes($memory_used);
        $data_to_write = "\nLa connexion d'un utilisateur occupe :" . $memory_formatted;
        file_put_contents('C:\Users\Bigeard\Desktop\Occupation mémoire_Plien.txt', $data_to_write, FILE_APPEND);

        header("Location: ../posts.php?topic=".$topic);
        exit();
    }
    
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
}

else
{
    header("Location: ../posts.php?topic=".$topic);
    exit();
}