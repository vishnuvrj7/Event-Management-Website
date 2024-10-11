<?php
include "header.html";
$eventslist = [
    [
        "title" => "Conventions",
        "description" => "Join us at the Annual Tech Innovators Convention! Connect with industry leaders, discover cutting-edge technologies, and expand your professional network. Don't miss out on keynote speeches, engaging panels, and exclusive exhibitions. Register now and be a part of the future!",
        "image" => "./img/img26.jpg"
    ],
    [
        "title" => "Weddings",
        "description" => "Eventify specializes in crafting unforgettable weddings with seamless planning and personalized design. Let us bring your dream wedding to life with our expert event management services.",
        "image" => "./img/img27.jpg"
    ],
    [
      "title" => "Cultural Events",
      "description" => "Experience the rich heritage at the Cultural Diversity Festival. Enjoy traditional performances, taste authentic cuisine, and participate in workshops celebrating various cultures. Bring your family and friends for a day of cultural immersion!",
      "image" => "./img/img25.jpg"
    ]
];
?>

<!-- HTML -->
<!DOCTYPE html>
<html>
<head>
    <title>Event Page</title>
    <style>
        body {
  font-family: Arial, sans-serif;
  padding-top: 60px; 
}
        .center-align {
  text-align: center;
  color: #23297F;
  
}
.event p {
  color: #080A45; 
}
.event h2 {
    color: #23297F;
}
.event {
  margin: 20px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.event img {
  width: 100%;
  height: 300px; 
  object-fit: cover;
  border-radius: 10px 10px 0 0;
  transition: transform 0.3s ease-in-out; 
}

.event:hover img {
  transform: scale(1.1); 
}

footer {
      background-color: #f7f7f7;
      padding: 20px;
      text-align: center;
      clear: both;
    }
    .footer-copyright {
      font-size: 14px;
      color: #666;
    }
    .footer-social-links {
      margin-top: 10px;
    }
    .footer-social-links a {
      margin-right: 20px;
      color: #666;
      transition: color 0.2s ease;
    }
    .footer-social-links a:hover {
      color: #333;
    }
    </style>
</head>
<body>
    <h1 class="thq-heading-2 center-align">Event Page</h1>
    <?php foreach ($eventslist as $event) { ?>
        <div class="event">
            <img src="<?php echo $event["image"]; ?>" alt="<?php echo $event["title"]; ?>">
            <h2><?php echo $event["title"]; ?></h2>
            <p><?php echo $event["description"]; ?></p>
        </div>
    <?php } ?>
</body>
<footer>
    <div class="footer-container">
      <div class="footer-copyright">
        &copy; 2024 VrJHQ
      </div>
      <div class="footer-social-links">
        <a href="https://www.instagram.com/yourinstagramhandle" target="_blank">
          <i class="fa-brands fa-instagram"></i>
        </a>
        <a href="https://www.facebook.com/yourfacebookpage" target="_blank">
          <i class="fa-brands fa-facebook-f"></i>
        </a>
        <a href="https://www.x.com/yourxprofile" target="_blank">
          <i class="fa-brands fa-x"></i>
        </a>
      </div>
    </div>
  </footer>
</html>