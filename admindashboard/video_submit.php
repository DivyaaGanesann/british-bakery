<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sno = $_POST['sno'];
    $title = $_POST['title'];
    $video_url = trim($_POST['video_url']);
    $embed_url = trim($_POST['embed_url']);

    // If embed URL is empty, generate it from video URL
    if (empty($embed_url) && $video_url) {
        $video_id = '';

        if (strpos($video_url, 'youtube.com/watch') !== false) {
            parse_str(parse_url($video_url, PHP_URL_QUERY), $query);
            $video_id = $query['v'] ?? '';
        } elseif (strpos($video_url, 'youtu.be') !== false) {
            $parts = explode('/', $video_url);
            $video_id = end($parts);
        }

        if ($video_id) {
            $embed_url = "https://www.youtube.com/embed/$video_id";
        }
    }

    if ($sno == "") {
        // INSERT
        $sql = "INSERT INTO video_gallery (title, video_url, embed_url)
                VALUES ('$title', '$video_url', '$embed_url')";
    } else {
        // UPDATE
        $sql = "UPDATE video_gallery 
                SET title='$title', video_url='$video_url', embed_url='$embed_url'
                WHERE sno=$sno";
    }

    if ($conn->query($sql)) {
        header("Location: video.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
