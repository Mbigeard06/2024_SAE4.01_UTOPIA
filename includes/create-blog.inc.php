<?php

if (isset($_POST['create-blog-submit']))
{
    //prend la taille du debut 
    $memory_before = memory_get_usage();
    ///prend le cpu au debut 
    $startCpuTime = microtime(true);

    require 'dbh.inc.php';
    session_start();
    
    $title = preg_replace('/[^a-zA-ZÀ-ÖØ-öø-ÿ@_\s-]/u', '', $_POST['btitle']);
    $content  = preg_replace('/[^a-zA-ZÀ-ÖØ-öø-ÿ@_\s-]/u', '', $_POST['bcontent']);
    
    if (empty($title) || empty($content))
    {
        header("Location: ../create-blog.php?error=emptyfields");
        exit();
    }
    else
    {
        // checking if a user already exists with the given username
        $sql = "select blog_title from blogs where blog_title=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../create-blog.php?error=sqlerror1");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $title);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            
            $resultCheck = mysqli_stmt_num_rows($stmt);
            
            if ($resultCheck > 0)
            {
                header("Location: ../create-blog.php?error=titletaken");
                exit();
            }
            else
            {
                $id = $_SESSION['blog_id'];
                
                $FileNameNew = 'blog-cover.png';
                
                require 'upload.inc.php';
                
                $sql = "insert into blogs(blog_title, blog_by, blog_date, blog_content, blog_img) "
                        . "values (?,?,now(),?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("Location: ../create-blog.php?error=sqlerror2");
                    exit();
                }
                else
                {              
                    
                    
                    mysqli_stmt_bind_param($stmt, "ssss", $title, $_SESSION['userId'], $content, $FileNameNew);
                    //echo $title . ' ' . $_SESSION['userId'] . ' ' . $content;
                    //exit();
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);      
                    
                    $endCpuTime = microtime(true);
                    $cpuTime = $endCpuTime - $startCpuTime;
                    $cpuUsage = getrusage()['ru_utime.tv_sec'];
                    $cpuUtilisé = ($cpuTime / $cpuUsage) * 100;
                    $data_to_write = "\nLa création du blog utilise :" . $cpuUtilisé ."% du CPU";
                    file_put_contents('C:\Users\Bigeard\Desktop\CPU_Plien.txt', $data_to_write, FILE_APPEND);

                    $memory_after = memory_get_usage();
                    $memory_used = $memory_after - $memory_before;
                    $memory_formatted = formatBytes($memory_used);
                    $data_to_write = "\nLa création du blog occupe :" . $memory_formatted;
                    file_put_contents('C:\Users\Bigeard\Desktop\Occupation mémoire_Plien.txt', $data_to_write, FILE_APPEND);

                    header("Location: ../create-blog.php");
                }
            }
        }
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
}

else
{
    header("Location: ../create-blog.php");
    exit();
}