<?php
//////////////////////////select
$stmt = $con->prepare(" SELECT *
                        FROM members 
                        WHERE groupid != 1 
                        ORDER BY userid DESC
                    ");
$stmt->execute();
$rows = $stmt->fetchAll();
foreach($rows as $row) {
    $row['username']
}
////////////////////////////insert
$user 	= $_POST['username'];
$stmt = $con->prepare("INSERT INTO 
                        members(username)
                        VALUES(:zuser) ");
$stmt->execute(array(
    'zuser' 	=> $user
));
///////////////////////////update
$user 	= $_POST['username'];
$stmt = $con->prepare("UPDATE members 
                        SET username = ?,
                        WHERE userid = ?
                    ");
$stmt->execute(array($user));
////////////////////////////delete
$userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
$stmt = $con->prepare("DELETE FROM members WHERE userid = :zuser");
$stmt->bindParam(":zuser", $userid);
$stmt->execute();

