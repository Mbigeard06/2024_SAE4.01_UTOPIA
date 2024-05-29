<?php
 function formatBytes($bytes, $precision = 2) {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');
    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);
    $bytes /= (1 << (10 * $pow));
    return round($bytes, $precision) . ' ' . $units[$pow];
}
session_start();

if (isset($_GET['topic']) && isset($_GET['post']) && isset($_GET['vote']) 
        && isset($_SESSION['userId']))
{
      //prend la taille du debut 
      $memory_before = memory_get_usage(); 
    ///prend le cpu au debut 
    $startCpuTime = microtime(true);
    require 'dbh.inc.php';
    
    $post = $_GET['post'];
    $topic = $_GET['topic'];
    $vote = $_GET['vote'];
    
        $sql = "select votePost, voteBy, vote from postvotes "
            . "where votePost=? "
            . "and voteBy=? "
            . "and vote=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../posts.php?topic=".$topic."&error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "sss", $post, $_SESSION['userId'], $vote);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            
            $resultCheck = mysqli_stmt_num_rows($stmt);
            
            if ($resultCheck > 0)
            {
                header("Location: ../posts.php?topic=".$topic."&error=voteexists");
                exit();
            }
        }
        
        $sql = "select votePost, voteBy from postvotes "
            . "where votePost=? "
            . "and voteBy=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../posts.php?topic=".$topic."&error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "ss", $post, $_SESSION['userId']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            
            $resultCheck = mysqli_stmt_num_rows($stmt);
            
            if ($resultCheck > 0)
            {
                $sql = "update postvotes "
                        . "set vote=?, "
                        . "voteDate = now() "
                        . "where votePost=? "
                        . "and voteBy=?";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("Location: ../posts.php?topic=".$topic."&error=sqlerror");
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "sss", $vote, $post, $_SESSION['userId']);
                    mysqli_stmt_execute($stmt);
                    
                    $endCpuTime = microtime(true);
                    $cpuTime = $endCpuTime - $startCpuTime;
                    $cpuUsage = getrusage()['ru_utime.tv_sec'];
                    $cpuUtilisé = ($cpuTime / $cpuUsage) * 100;
                    $data_to_write = "\nLe vote d'un poste sur un forum utilise :" . $cpuUtilisé ."% du CPU";
                    file_put_contents('C:\Users\Bigeard\Desktop\CPU_Vide.txt', $data_to_write, FILE_APPEND);

                    $memory_after = memory_get_usage();
                    $memory_used = $memory_after - $memory_before;
                    $memory_formatted = formatBytes($memory_used);
                    $data_to_write = "\nLe vote d'un poste sur un forum occupe :" . $memory_formatted;
                    file_put_contents('C:\Users\Bigeard\Desktop\Occupation mémoire_Vide.txt', $data_to_write, FILE_APPEND);

                    header("Location: ../posts.php?topic=".$topic."&vote=".$vote."&votepost=".$post."&voteby=".$_SESSION['userId']);
                    
                    exit();
                }
            }
        }
    
    $sql = "insert into postvotes (votePost, voteBy, voteDate, vote) "
            . "values (?,?,now(),?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("Location: ../posts.php?topic=".$topic."&error=sqlerror");
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt, "sss", $post, $_SESSION['userId'], $vote);
        mysqli_stmt_execute($stmt);

        $endCpuTime = microtime(true);
                    $cpuTime = $endCpuTime - $startCpuTime;
                    $cpuUsage = getrusage()['ru_utime.tv_sec'];
                    $cpuUtilisé = ($cpuTime / $cpuUsage) * 100;
                    $data_to_write = "\nLe vote d'un poste sur un forum utilise :" . $cpuUtilisé ."% du CPU";
                    file_put_contents('C:\Users\Bigeard\Desktop\CPU_Plien.txt', $data_to_write, FILE_APPEND);

                    $memory_after = memory_get_usage();
                    $memory_used = $memory_after - $memory_before;
                    $memory_formatted = formatBytes($memory_used);
                    $data_to_write = "\nLe vote d'un poste sur un forum occupe :" . $memory_formatted;
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