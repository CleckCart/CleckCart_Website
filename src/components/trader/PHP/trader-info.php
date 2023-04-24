<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap desmo</title>
    <link rel = "icon" href = "./../../../dist/public/logo.png" sizes = "16x16 32x32" type = "image/png">
    <link rel="stylesheet" href="./../../../dist/CSS/bootstrap.css">
    <link rel="stylesheet" href="../CSS/trader-info.css" />
  </head>
  <body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2 class="modal-title">Edit Profile</h2>
    <div class="input-container">
      <div class="input-group modal-input">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName">
      </div>
      <div class="input-group modal-input">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
      </div>
      <div class="input-group modal-input">
        <label for="address">Address:</label>
        <input type="text" id="address" name="address">
      </div>
      <div class="input-group modal-input">
        <label for="profilePicture" >Profile Picture:</label>
        <label for="profilePicture" class="custom-file-upload">Choose file</label>
        <input type="file" id="profilePicture" name="profilePicture">
        <span class="file-name"></span>
      </div>
      <div class="input-group modal-input">
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName">
      </div>
      <div class="input-group modal-input">
        <label for="phoneNumber">Phone Number:</label>
        <input type="tel" id="phoneNumber" name="phoneNumber">
      </div>
      <div class="input-group modal-input">
        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>
      </div>
      <div class="input-group modal-input">
        <label for="shop">Shop:</label>
        <input type="text" id="shop" name="shop">
      </div>
    </div>
    <button class="update-btn">Update</button>
  </div>
</div>
    <section class="trader-info"> 

      <!-- <img class="trader-menu" src="../../../dist/public/menu.png" alt=""> -->
      <div class="hamburger-menu">
        <div class="hamburger-menu-icon">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <nav class="menu">
          <button class="close-button">&times;</button>
          <ul>
            <li class="menu-item1"><a href="#">Menu Item 1</a></li>
            <li class="menu-item2"><a href="#">Menu Item 2</a></li>
            <li class="menu-item3"><a href="#">Menu Item 3</a></li>
          </ul>
        </nav>
      </div>
      <div class="trader-info-cnt">
        <div class="trader-info-side trader-info-left">
          <div class="trader-image-cnt">
            <img class="" src="" alt="">
          </div>
        </div>
        <div class="trader-info-side trader-info-right">
          <h2>Your Information</h2>
        <div class="input-container">
        <div class="input-group">
          <label for="fname">First name</label>
          <input type="text" id="fname">
        </div>
        <div class="input-group">
          <label for="email">Email</label>
          <input type="text" id="email">
        </div>
        <div class="input-group">
          <label for="address">Address</label>
          <input type="text" id="address">
        </div>
        <div class="input-group">
          <label for="birthdate">Birthdate</label>
          <input type="date" id="date" name="date">
        </div>
        <div class="input-group">
          <label for="lname">Last name</label>
          <input type="text" id="lname">
        </div>
        <div class="input-group">
          <label for="phnumber">Phone number</label>
          <input type="text" id="phnumber">
        </div>
        <div class="input-group">
          <label for="gender">Gender</label>
          <select name="gender" id="gender">
            <option value="option1">Male</option>
            <option value="option1">Female</option>
            <option value="option1">Other</option>
          </select>
        </div>
        <div class="input-group">
          <label for="shop">Shop</label>
          <input type="text" id="shop">
        </div>
</div>
      <div class="trader-info-right-btns">
        <button class="btn-trader btn-trader-edit">Edit Profile</button>
        <button class="btn-trader btn-trader-pw">Change Password</button>
      </div>
        </div>

      </div>
    </section>
    <script>

      let i = 0;

      const editProfileBtn = document.querySelector(".btn-trader-edit");
      const modal = document.querySelector("#myModal");
      const closeBtn = document.querySelector(".close");

      editProfileBtn.addEventListener("click", () => { 
        modal.style.display = "block";
      });

      closeBtn.addEventListener("click", () => {
        modal.style.display = "none";
      });

      // To update the file name display when a file is selected.
      const fileInput = document.getElementById('profilePicture');
      const fileNameSpan = document.querySelector('.file-name');

      fileInput.addEventListener('change', () => {
        fileNameSpan.textContent = fileInput.files[0].name;
      });

      // To toggle the menu when the hamburger icon is clicked.
      const hamburgerMenu = document.querySelector('.hamburger-menu');
      const hamburgerIcon = document.querySelector('.hamburger-menu-icon');
      const closeButton = document.querySelector('.close-button');

      hamburgerIcon.addEventListener('click', function() {
        hamburgerMenu.classList.toggle('open');
      });

      closeButton.addEventListener('click', function() {
        hamburgerMenu.classList.remove('open');
      });

      const menuItems =document.querySelectorAll('.menu ul li');
      const menuItem1 =document.querySelector('.menu-item1');
 
      menuItem1.classList.add('active');

        menuItems.forEach((item) => {
        item.addEventListener('click', function(e) {

          menuItems.forEach((item) => {
            item.classList.remove('active');
          });
          
          this.classList.add('active');
        });
        });
  

    </script>
  </body>
</html>