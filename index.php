<?php
// filepath: c:\xampp\htdocs\files preveiw\index.php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('config.php');

// Check connection
if ($connect->connect_error) {
  die("Connection failed: " . $connect->connect_error);
}

// Query to retrieve all products
$sql = "SELECT * FROM products";
$result = $connect->query($sql);

$products = [];
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $products[] = $row;
  }
}

// Close connection early
$connect->close();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="css/main.css">
  </head>

  <style>
   @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap');

    * {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }
  </style>

  <body>

  <div id="search-body">
    <ul id='ul1'>
      <li>
        <input type="text" id="keyword" placeholder='Search here...' onkeyup='filtter()'>
      </li>
      <li>
        <ul id='ul2'>

        <?php
        if (!empty($products)) {
          foreach($products as $row) {
            echo "
            <a href='product.php?id=$row[id]'>
            <li>
            <div>
            <div class='card-img-2' style='background-image: url(imgs/$row[first_img]); width: 200px:'></div>
            <span class='card-span'>
            <div class='card-name-2'>
            <p>$row[name]</p>
            </div>
            <br>
            ";
            
            if($row['free']==1){
              echo "<div class='card-free-2'><span><img src='https://cdn-icons-png.flaticon.com/512/3901/3901876.png'></span>Free</div>";
            } else {
              echo "<div class='card-free-2'><span><img src='https://cdn-icons-png.flaticon.com/512/657/657694.png'></span> Premium</div>";
            }
            
            echo "
            </span>
            </div>
            </li>  
            </a>
            ";
          }
        } else {
            echo "<li>No posts yet :(</li>";
        }
        ?>
    
        </ul>
      </li>
    </ul>
  </div>

  <input type="checkbox" id="toggle-search" style='display: none;' checked>
  
  <label for="toggle-search" >
    <div id="search" onclick='appear_search()'>
      <svg id='searchsvg' class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
      </svg>

      <p id='cross'>✕</p>
    </div>
  </label>

    <div id="mobile-bar">
      <label class="hamburger">
        <input type="checkbox" id="appear" onclick="appear()" />
        <svg viewBox="0 0 32 32">
          <path
            class="line line-top-bottom"
            d="M27 10 13 10C10.8 10 9 8.2 9 6 9 3.5 10.8 2 13 2 15.2 2 17 3.8 17 6L17 26C17 28.2 18.8 30 21 30 23.2 30 25 28.2 25 26 25 23.8 23.2 22 21 22L7 22"
          ></path>
          <path class="line" d="M7 16 27 16"></path>
        </svg>
      </label>
    </div>

    <div id="bar">
      <p id="name"></p>
      <ul>
        <form action="#">
          <input
            checked
            type="radio"
            name="bar"
            id="pack-choice"
            value="packs"
            onclick='travling()'
          />

          <label for="pack-choice">
            <li class="btn" onmousemove="moving()">
              <svg
                class="w-6 h-6 text-gray-800 dark:text-white"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 13h3.4a1 1 0 0 1 1 .6 4 4 0 0 0 7.3 0 1 1 0 0 1 .9-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9M9 7h6m-7 3h8"
                />
              </svg>
              Packs
            </li>
            
          </label>
            
          <input type="radio" name="bar" id="tools-choice" value="tools" onclick='travling()'/>

          <label for="tools-choice">
            <li class="btn">

              <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.6" d="M7.42584 18.2443c1.3169-2.2023 2.5334-1.5242 3.85026-3.7265 1.3169-2.2023.1004-2.8805 1.4173-5.08281 1.3169-2.20233 2.5335-1.52419 3.8504-3.72652M10.8472 20.1517c1.3169-2.2024 2.5334-1.5242 3.8503-3.7266 1.3169-2.2023.1004-2.8804 1.4173-5.0828 1.3169-2.20228 2.5334-1.52414 3.8503-3.72647l-6.8428-3.81455C11.8054 6.00361 10.5889 5.32547 9.272 7.5278s-.1004 2.8805-1.4173 5.0828c-1.3169 2.2023-2.5334 1.5242-3.85031 3.7265l6.84281 3.8146Z"/>
              </svg>
              
              Trextures
            </li>
          </label>

          <input
            type="radio"
            name="bar"
            id="background-choice"
            value="backgrounds"
            onclick='travling()'
          />

          <label for="background-choice">
            <li class="btn">
              <svg
                class="w-6 h-6 text-gray-800 dark:text-white"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
              >
                <path
                  stroke="currentColor"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="m3 16 5-7 6 6.5m6.5 2.5L16 13l-4.3 6m2.3-9h0M4 19h16c.6 0 1-.4 1-1V6c0-.6-.4-1-1-1H4a1 1 0 0 0-1 1v12c0 .6.4 1 1 1Z"
                />
              </svg>
              Backgrounds
            </li>
          </label>

          
        </form>
      </ul>
      <form action="https://t.me/testing_asgard_bot">
        <button id="go"><p>Try the bot</p></button>
      </form>
    </div>

    <div class="body-1" id='packs'>

    <ul>

      <?php
      $packs_found = false;
      if (!empty($products)) {
        foreach($products as $row) {
          if($row['type'] == 'pack'){
            $packs_found = true;
            echo "
            <a id='href' class='href' href='product.php?id=$row[id]'>
            <li>
            <div class='cards'>
            <div class='card-img' style='background-image: url(imgs/$row[first_img]);'></div>
            <div class='card-name'>
            <p>$row[name]</p>
            </div>";
            
            if($row['free']==1){
              echo "<div class='card-free'><span><img src='https://cdn-icons-png.flaticon.com/512/3901/3901876.png'></span>Free</div>";
            } else {
              echo "<div class='card-free'><span><img src='https://cdn-icons-png.flaticon.com/512/657/657694.png'></span>Premium</div>";
            }
            
            echo "<div class='card-des'>
            $row[des]
            </div>
            </div>
            </li> 
            </a> 
            ";
          }
        }
      }
      if (!$packs_found) {
        echo "<li>No posts yet :(</li>";
      }
      ?>
    </ul>
  </div>

  

  <div class="body-1" id='tools'>

    <ul>

      <?php
      $tools_found = false;
      if (!empty($products)) {
        foreach($products as $row) {
          if($row['type'] == 'tool'){
            $tools_found = true;
            echo "
            <a href='product.php?id=$row[id]'>
            <li>
            <div class='cards'>
            <div class='card-img' style='background-image: url(imgs/$row[first_img]);'></div>
            <div class='card-name'>
            <p>$row[name]</p>
            </div>";
            
            if($row['free']==1){
              echo "<div class='card-free'><span><img src='https://cdn-icons-png.flaticon.com/512/3901/3901876.png'></span>Free</div>";
            } else {
              echo "<div class='card-free'><span><img src='https://cdn-icons-png.flaticon.com/512/657/657694.png'></span>Premium</div>";
            }
            
            echo "<div class='card-des'>
            $row[des]
            </div>
            </div>
            </li>  
            </a>
            ";
          }
        }
      }
      if (!$tools_found) {
          echo "<li>No posts yet :(</li>";
      }
      ?>
    </ul>
  </div>



<div class="body-1" id='backgrounds'>

<ul>

  <?php
    $backgrounds_found = false;
    if (!empty($products)) {
      foreach($products as $row) {
        if($row['type'] == 'background'){
            $backgrounds_found = true;
            echo "
            <a href='product.php?id=$row[id]'>
            <li>
            <div class='cards'>
            <div class='card-img' style='background-image: url(imgs/$row[first_img]);'></div>
            <div class='card-name'>
            <p>$row[name]</p>
            </div>";
            
            if($row['free']==1){
              echo "<div class='card-free'><span><img src='https://cdn-icons-png.flaticon.com/512/3901/3901876.png'></span>Free</div>";
            } else {
              echo "<div class='card-free'><span><img src='https://cdn-icons-png.flaticon.com/512/657/657694.png'></span>Premium</div>";
            }
            
            echo "<div class='card-des'>
            $row[des]
            </div>
            </div>
            </li>  
            </a>
            ";
        }
      }
    }
    if (!$backgrounds_found) {
        echo "<li>No posts yet :(</li>";
    }
  ?>
</ul>
</div>
  


<div class="body-1" id='other'>

<ul>

  <?php
    $other_found = false;
    if (!empty($products)) {
      foreach($products as $row) {
        if($row['type'] == 'other'){
            $other_found = true;
            echo "
            <a href='product.php?id=$row[id]'>
            <li>
            <div class='cards'>
            <div class='card-img' style='background-image: url(imgs/$row[first_img]);'></div>
            <div class='card-name'>
            <p>$row[name]</p>
            </div>";
            
            if($row['free']==1){
              echo "<div class='card-free'><span><img src='https://cdn-icons-png.flaticon.com/512/3901/3901876.png'></span>Free</div>";
            } else {
              echo "<div class='card-free'><span><img src='https://cdn-icons-png.flaticon.com/512/657/657694.png'></span>Premium</div>";
            }
            
            echo "<div class='card-des'>
            $row[des]
            </div>
            </div>
            </li>  
            </a>
            ";
        }
      }
    }

  ?>
</ul>
</div>


  <script>

window.addEventListener('load', travling);

function appear() {
  box = document.getElementById("appear").checked;
  if (box) {
    window.bar.style.left = "0px";
    document.getElementById("mobile-bar").style.borderBottom = "none";
  } else {
    window.bar.style.left = "-800px";
    document.getElementById("mobile-bar").style.borderBottom =
      "1px solid rgba(0, 0, 0, 0.11)";
  }
}

var cardNameElements = Array.from(document.getElementsByClassName("card-name"));

cardNameElements.forEach(function(cardNameElement) {
  cardNameElement.addEventListener("mouseenter", function() {
    this.isScrolling = true;
    scrollContent(this);
  });

  cardNameElement.addEventListener("mouseleave", function() {
    this.isScrolling = false;
    this.scrollLeft = 0;
  });
});

function scrollContent(element) {
  if (element.isScrolling) {
    element.scrollLeft += 1; // Change the scroll speed here
    setTimeout(function() {
      scrollContent(element);
    }, 5); // Change the scroll delay here
  }
}

function travling(){

  pack = document.getElementById('pack-choice').checked
  tool = document.getElementById('tools-choice').checked
  background = document.getElementById('background-choice').checked
  
  if(pack){
    window.packs.style.display='inline';
  } else {
    window.packs.style.display='none';
  }
  
  if(tool){
    window.tools.style.display='inline';
  } else {
    window.tools.style.display='none';
  }
  
  if(background){
    window.backgrounds.style.display='inline';
  } else {
    window.backgrounds.style.display='none';
  }
  
  
  if(other){
    window.other.style.display='inline';
  } else {
    window.other.style.display='none';
  }

}




const startAnimation = (entries, observer) => {
  entries.forEach(entry => {
    entry.target.classList.toggle("slide-in-from-right", entry.isIntersecting);
  });
};

const observer = new IntersectionObserver(startAnimation);
const options = { root: null, rootMargin: '0px', threshold: 1 }; 

const elements = document.querySelectorAll('.cards');
elements.forEach(el => {
  observer.observe(el, options);
});

function appear_search(){
  var get = document.getElementById('toggle-search').checked; 
  
  if(get){
    document.getElementById('search-body').style.display='flex';
    document.getElementById('searchsvg').style.display='none';
    document.getElementById('cross').style.display='inline';

  } else {
    document.getElementById('search-body').style.display='none';
    document.getElementById('searchsvg').style.display='flex';
    document.getElementById('cross').style.display='none';
  }
}



function filtter() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("keyword");
    filter = input.value.toUpperCase();
    ul = document.getElementById("ul2");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("div")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}



function getClientValue() {
    // Get the URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    // Get the value of the 'client' parameter
    const clientValue = urlParams.get('client'); // Corrected the parameter name to 'client'
    // Set the 'client' cookie with the client value
    document.cookie = `client=${clientValue}`;
}

// Call the function to save the client value as a cookie
getClientValue();

function getCookie(name) {
    // Split the cookies string into an array of individual cookies
    var cookies = document.cookie.split(';');

    // Iterate over the array to find the cookie with the specified name
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i].trim();
        // Check if the cookie name matches the specified name
        if (cookie.startsWith(name + '=')) {
            // Return the cookie value
            return cookie.substring(name.length + 1);
        }
    }

    // Return null if the cookie is not found
    return null;
}

var links = document.querySelectorAll('.href');

// Iterate over each link
links.forEach(function(link) {
    // Get the current href attribute value
    var href = link.getAttribute('href');
    
    // Update the href attribute with the client cookie value
    link.setAttribute('href', href + '?client=' + getCookie('client'));
});


  </script>
  </body>
</html>