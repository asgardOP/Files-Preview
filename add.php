<?php

include('config.php');

if(isset($_POST['submit'])){

    $total_files = $_FILES['img5']['name'];

    $img_lo = $_FILES['img5']['tmp_name'];
    $img_name = $_FILES['img5']['name'];
    $img_up = "imgs/".$img_name;
    if(move_uploaded_file($img_lo, $img_up)){
        echo '<br>'.$img_name." - Added";  
    }else{
        echo '<br>'."Error uploading $img_name";
    }

    $total_files = count($_FILES['img']['name']);
    echo '* Preview';
    for($i=0; $i<$total_files; $i++){
        $img_lo = $_FILES['img']['tmp_name'][$i];
        $img_name = $_FILES['img']['name'][$i];
        $img_up = "preview/".$img_name;

        if(move_uploaded_file($img_lo, $img_up)){
            echo '<br>'.$img_name." - Added";  
        }else{
            echo '<br>'."Error uploading $img_name";
        }
    }

    $total_files = count($_FILES['img2']['name']);
    echo '* Posts';
    for($i=0; $i<$total_files; $i++){
        $img_lo = $_FILES['img2']['tmp_name'][$i];
        $img_name = $_FILES['img2']['name'][$i];
        $img_up = "posts/".$img_name;

        if(move_uploaded_file($img_lo, $img_up)){
            echo '<br>'.$img_name." - Added";  
        }else{
            echo '<br>'."Error uploading $img_name";
        }
    }

    $name = $_POST['name'];
    $free = $_POST['free'];
    $posts = $_POST['preview'];
    $preview = $_POST['posts'];

    if ($free == 'free'){
        $isfree = 1;
    } else {
        $isfree = 0;
    }

    $des = $_POST['des'];
    $type = $_POST['type'];
    $first_img = $_FILES['img5']['name'];


    $insert = "INSERT INTO `products`(`name`, `des`, `free`, `preview_imgs`, `posts_imgs`, `type`, `first_img`) VALUES ('$name','$des','$isfree','$preview','$posts','$type','$first_img')";

    $sql=mysqli_query($connect, $insert);

    header('location: admin.html');
}

?>
