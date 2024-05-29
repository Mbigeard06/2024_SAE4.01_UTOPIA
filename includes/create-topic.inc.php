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
if (isset($_POST['create-topic']))
{
    //prend la taille du debut 
    $memory_before = memory_get_usage(); 
    ///prend le cpu au debut 
    $startCpuTime = microtime(true);

    require 'dbh.inc.php';
    
    $topicSubject = $_POST['topic-subject'];
    $topicCategory = $_POST['topic-cat'];
    $postContent = $_POST['post-content'];
    
    if (empty($topicSubject) || empty($postContent))
    {
        header("Location: ../create-topic.php?error=emptyfields");
        exit();
    }
    else
    {
        $sql = "insert into topics(topic_subject, topic_date, topic_cat, topic_by) "
                . "values (?,now(),?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../create-topic.php?error=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "sss", $topicSubject, $topicCategory, $_SESSION['userId']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            
            $topicid = mysqli_insert_id($conn);
            
            $sql = "insert into posts(post_content, post_date, post_topic, post_by) "
                    . "values (?,now(),?,?)";
            $stmt = mysqli_stmt_init($conn);
            
            if (!mysqli_stmt_prepare($stmt, $sql))
            {
                header("Location: ../create-topic.php?error=sqlerror");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt, "sss", $postContent, $topicid, $_SESSION['userId']);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                
                $endCpuTime = microtime(true);
                $cpuTime = $endCpuTime - $startCpuTime;
                $cpuUsage = getrusage()['ru_utime.tv_sec'];
                $cpuUtilisé = ($cpuTime / $cpuUsage) * 100;
                $data_to_write = "\nLa création d'un forum utilise :" . $cpuUtilisé ."% du CPU";
                file_put_contents('C:\Users\Bigeard\Desktop\CPU_Plien.txt', $data_to_write, FILE_APPEND);

                $memory_after = memory_get_usage();
                $memory_used = $memory_after - $memory_before;
                $memory_formatted = formatBytes($memory_used);
                $data_to_write = "\nLa création d'un forum occupe :" . $memory_formatted;
                file_put_contents('C:\Users\Bigeard\Desktop\Occupation mémoire_Plien.txt', $data_to_write, FILE_APPEND);

                header("Location: ../create-topic.php?operation=success");
            }
        }
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
}

else
{
    header("Location: ../index.php");
    exit();
}