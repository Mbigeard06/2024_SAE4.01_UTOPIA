<?php

if (isset($_POST['add-event-submit']))
{
    require 'dbh.inc.php';
    session_start();
    
    $title = $_POST['etitle'];
    $date = $_POST['edate'];
    $headline = $_POST['ehead'];
    $description  = $_POST['edescription'];
    
    if (empty($title) || empty($date) || empty($headline) || empty($description))
    {
        header("Location: ../create-event.php?error=emptyfields");
        exit();
    }
    else
    {
        // Checking if an event already exists with the given title
        $sql = "SELECT title FROM events WHERE title=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../create-event.php?error=sqlerror");
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
                header("Location: ../create-event.php?error=eventtaken");
                exit();
            }
            else
            {
                $FileNameNew = 'event-cover.png';
                require 'upload.inc.php';
                
                $sql = "INSERT INTO events (event_by, title, event_date, date_created, event_image, headline, description) "
                     . "VALUES (?, ?, ?, NOW(), ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("Location: ../create-event.php?error=sqlerror");
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "sssssss", $_SESSION['userId'], $title, $date, $FileNameNew, $headline, $description);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    
                    header("Location: ../create-event.php?creation=success");
                    exit();
                }
            }
        }
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else
{
    header("Location: ../create-event.php");
    exit();
}