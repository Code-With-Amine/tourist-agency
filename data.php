<?php
require_once 'include/database.php';
/* storing the visiter informations*/
// Function to check if a visitor is unique based on IP address and cookie
function isUniqueVisitor($pdo, $ip_address, $cookie)
{
    $select_query = "SELECT COUNT(*) as visitor_count FROM visitors WHERE ip_address = ? AND cookie = ?";
    $stmt = $pdo->prepare($select_query);
    $stmt->execute([$ip_address, $cookie]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $visitor_count = $row['visitor_count'];

    return $visitor_count === '0';
}

// Capture visitor information
$ip_address = $_SERVER['REMOTE_ADDR'];
$cookie_name = 'unique_visitor';
$cookie = isset($_COOKIE[$cookie_name]) ? $_COOKIE[$cookie_name] : '';

if (empty($cookie)) {
    $cookie_value = md5(uniqid()); // Generate a unique cookie value
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // Set the cookie for 30 days

} else {
    $cookie_value = $cookie;
}

if (isUniqueVisitor($pdo, $ip_address, $cookie_value)) {
    $insert_query = "INSERT INTO visitors (ip_address, cookie) VALUES (?, ?)";
    $stmt = $pdo->prepare($insert_query);
    $stmt->execute([$ip_address, $cookie]);
    $stmt->execute();
}
/* end of storing the visiter informations */

$services = $pdo->query('SELECT * FROM services')->fetchAll(PDO::FETCH_ASSOC); // services array
$SOCIAL_NETWORKS = $pdo->query('SELECT * FROM social_networks')->fetchAll(PDO::FETCH_ASSOC); // social networks pictures
$Regional_Adventures = $pdo->query('SELECT * FROM places_to_visite')->fetchAll(PDO::FETCH_ASSOC); // cites that we will visite
$comments = $pdo->query('SELECT com.id, cl.id as clientID, first_name, last_name, country, date, stars, comment  FROM comments com, clients cl WHERE com.client_id = cl.id')->fetchAll(PDO::FETCH_ASSOC); // the client comments
$rows = $pdo->query('SELECT COUNT(*) images from social_networks')->fetch(PDO::FETCH_ASSOC); // number of images in the database
$social_mediaContact = $pdo->query('SELECT * from social_media order by name desc')->fetchAll(PDO::FETCH_ASSOC);

$youtube = $social_mediaContact[0]['link'];
$whatsapp = $social_mediaContact[1]['link'];
$phone = $social_mediaContact[2]['link'];
$linkedin = $social_mediaContact[3]['link'];
$instagram = $social_mediaContact[4]['link'];
$facebook = $social_mediaContact[5]['link'];
$email  = $social_mediaContact[6]['link'];

?>