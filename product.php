<?php

include('config.php');

$id = intval($_GET['id']);
$client = $_COOKIE['client'];


// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

// Query to retrieve data
$sql = "SELECT * FROM products WHERE id=$id";
$result = $connect->query($sql);

// Display data
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        if(true){
            $name = $row['name'];
            $free = $row['free'];
            $des = $row['des'];
            $preview = $row['preview_imgs'];
            $posts = $row['posts_imgs'];
            $type = $row['type'];
            $first_img = $row['first_img'];
        } else {
            continue;
        };
    }
}

// Close connection
$connect->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/product.css">
</head>


<body>

<a href="index.php">
    <div id="back">
        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9h13a5 5 0 0 1 0 10H7M3 9l4-4M3 9l4 4"/>
        </svg>
    </div>
</a>

<div class="swiper images">
    <div class="swiper-wrapper">
        <?php
        // Split the preview images into an array, filter out empty values
        $namesArray = array_filter(array_map('trim', explode(',', $preview)));

        // Only show first_img if it's not empty
        if (!empty($first_img)) {
            // If there are no preview images, show only the first_img
            if (count($namesArray) === 0) {
                echo "<div class='swiper-slide p-images' style='background-image: url(imgs/$first_img);'></div>";
            } else {
                // If first_img is not in preview images, show it first
                if (!in_array($first_img, $namesArray)) {
                    echo "<div class='swiper-slide p-images' style='background-image: url(imgs/$first_img);'></div>";
                }
                // Show each preview image (skip empty)
                foreach ($namesArray as $name2) {
                    if (!empty($name2)) {
                        echo "<div class='swiper-slide p-images' style='background-image: url(preview/$name2);'></div>";
                    }
                }
            }
        } else {
            // If first_img is empty, show only preview images
            foreach ($namesArray as $name2) {
                if (!empty($name2)) {
                    echo "<div class='swiper-slide p-images' style='background-image: url(preview/$name2);'></div>";
                }
            }
        }
        ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>

<h1 id='name'><?php echo $name;?></h1>


<?php
if($free==1){
    echo "<div class='card-free'><span><img src='https://cdn-icons-png.flaticon.com/512/3901/3901876.png'></span>Free</div>";
} else {
    echo "<div class='card-free'><span><img src='https://cdn-icons-png.flaticon.com/512/657/657694.png'></span>Premium</div>";
}
?>

<div id="button-body">
    <a style='text-decoration:none;' class="getfile" href="download_posts_zip.php?id=<?php echo $id; ?>">
        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V4M7 14H5a1 1 0 0 0-1 1v4c0 .6.4 1 1 1h14c.6 0 1-.4 1-1v-4c0-.6-.4-1-1-1h-2m-1-5-4 5-4-5m9 8h0"/>
        </svg>
        <p>Download File</p>
    </a>
    <a class="getfile" onclick='copyPageLink()'>
        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M9 8v3c0 .6-.4 1-1 1H5m11 4h2c.6 0 1-.4 1-1V5c0-.6-.4-1-1-1h-7a1 1 0 0 0-1 1v1m4 3v10c0 .6-.4 1-1 1H6a1 1 0 0 1-1-1v-7.1c0-.3 0-.5.2-.7l2.5-2.9c.2-.2.5-.3.8-.3H13c.6 0 1 .4 1 1Z"/>
        </svg> 
        <p id='copy-text'>Copy link</p>   
    </a>

</div>


<div id="des">

        <?php echo $des;?>

</div>


<div id="posts">

    <?php
        // Variable containing the names
        $names3 = $posts;

        // Split the names into an array
        $namesArray2 = explode(', ', $names3);

        foreach ($namesArray2 as $name4) {
            echo "<img class='posts-images' src='posts/$name4'>";
        }
    ?>
    
</div>

<div id="fullscreen" class="fullscreen">
    <P id='img-cross'>✕</P>
    <div id="imgtemp"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".images", {
      pagination: {
        el: ".swiper-pagination",
        type: "fraction",
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });

</script>

<script>

    function sendMessageToBot() {
        // Replace 'YOUR_BOT_TOKEN' with your actual bot token
        var botToken = '6307029510:AAGaT8KWv4VIgr1QCzMYS-jumxN1o1HBzS0';
        // Replace 'YOUR_CHAT_ID' with your actual chat ID
        var chatId = <?php echo $client; ?>;
        // Replace 'YOUR_MESSAGE_HERE' with the message you want to send
        var message = 'msg';
        var url = 'https://api.telegram.org/bot' + botToken + '/sendMessage?chat_id=' + chatId + '&text=' + encodeURIComponent(message);
        var xhr = new XMLHttpRequest();
        xhr.open('post', url);
        xhr.send();
        window.open('https://t.me/testing_asgard_bot')
    }


    function copyPageLink() {
        // Get the current page's URL
        const pageLink = window.location.href;
        
        // Create a temporary input element
        const tempInput = document.createElement("input");
        tempInput.value = pageLink;
        document.body.appendChild(tempInput);
        
        // Select the input content
        tempInput.select();
        tempInput.setSelectionRange(0, 99999); /* For mobile devices */
        // Copy the selected content
        document.execCommand("copy");
        // Remove the temporary input
        document.body.removeChild(tempInput);
        // Display a message (optional)
        document.getElementById('copy-text').innerText='Copied!';
    }


    const fullscreen = document.getElementById('fullscreen');
    const fullscreenImg = document.getElementById('imgtemp');
    const cross = document.getElementById('img-cross');
    const images = document.querySelectorAll('.posts-images');

    images.forEach(image => {
      image.addEventListener('click', () => {
        fullscreenImg.style.backgroundImage = 'url('+image.src+')';
        fullscreen.style.display = 'flex';
      });
    });

    cross.addEventListener('click', () => {
      fullscreen.style.display = 'none';
    });
</script>

</body>
</html>
