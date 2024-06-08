<?php

session_start();

if (isset($_GET['blog']) && isset($_SESSION['userId']))
{
     //prend la taille du debut 
     $memory_before = memory_get_usage(); 
        ///prend le cpu au debut 
        $startCpuTime = microtime(true);
        
        require 'dbh.inc.php';
    
        $blog = $_GET['blog'];
    
        $sql = "select * from blogvotes  
                where voteBlog = ? 
                and voteBy = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../blog-page.php?id=".$blog."&error=sqlerror1");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "ss", $blog, $_SESSION['userId']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            
            $resultCheck = mysqli_stmt_num_rows($stmt);
            
            if ($resultCheck > 0)
            {
                $sql = "delete from blogvotes
                        where voteBlog = ?
                        and voteBy = ?";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("Location: ../blog-page.php?id=".$blog."&error=sqlerror");
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "ss", $blog, $_SESSION['userId']);
                    mysqli_stmt_execute($stmt);
                    
                    $endCpuTime = microtime(true);
                    $cpuTime = $endCpuTime - $startCpuTime;
                    $cpuUsage = getrusage()['ru_utime.tv_sec'];
                    $cpuUtilisé = ($cpuTime / $cpuUsage) * 100;
                    $data_to_write = "\nLe vote d'un blog utilise :" . $cpuUtilisé ."% du CPU";
                    file_put_contents('C:\Users\Bigeard\Desktop\CPU_Vide.txt', $data_to_write, FILE_APPEND);

                    $memory_after = memory_get_usage();
                    $memory_used = $memory_after - $memory_before;
                    $memory_formatted = formatBytes($memory_used);
                    $data_to_write = "\nLe vote d'un blog occupe :" . $memory_formatted;
                    file_put_contents('C:\Users\Bigeard\Desktop\Occupation mémoire_Vide.txt', $data_to_write, FILE_APPEND);

                    header("Location: ../blog-page.php?id=".$blog);
                    exit();
                }
            }
            else
            {
                $sql = "insert into blogvotes (voteBlog, voteBy, voteDate, vote)
                        values (?,?,now(),1)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("Location: ../blog-page.php?id=".$blog."&error=sqlerror");
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "ss", $blog, $_SESSION['userId']);
                    mysqli_stmt_execute($stmt);
                    
                    $endCpuTime = microtime(true);
                    $cpuTime = $endCpuTime - $startCpuTime;
                    $cpuUsage = getrusage()['ru_utime.tv_sec'];
                    $cpuUtilisé = ($cpuTime / $cpuUsage) * 100;
                    $data_to_write = "\nLe vote d'un blog utilise :" . $cpuUtilisé ."% du CPU";
                    file_put_contents('C:\Users\Bigeard\Desktop\CPU_Plien.txt', $data_to_write, FILE_APPEND);

                    $memory_after = memory_get_usage();
                    $memory_used = $memory_after - $memory_before;
                    $memory_formatted = formatBytes($memory_used);
                    $data_to_write = "\nLe vote d'un blog occupe :" . $memory_formatted;
                    file_put_contents('C:\Users\Bigeard\Desktop\Occupation mémoire_Plien.txt', $data_to_write, FILE_APPEND);

                    header("Location: ../blog-page.php?id=".$blog);
                    exit();
                }
            }
        }
}

else
{
    header("Location: ../blog-page.php?id=".$blog."&error");
    exit();
}