<?php
session_start();
$usr = $_SESSION['username'];
?>
<div id="home">
        <img src="./images/companylogo.png" alt="companylogo" class="companylogo">
        <img src="./images/space.png" alt="space" class="space">
        <a href="./homepage.php" class="text" style="right: 810px;">Home</a>
        <div class="menu">
            <label for="toggle-responsive" class="toggle-menu text" style="right: 660px;"
            >Products</label>
            <input type="checkbox" id="toggle-responsive"/>
            <ul class="nav level-one">
              <li class="parent" style="font-family: Comfortaa;
              font-size: 25px;"><a href="#"><br>Keyboards</a>
                <label for="toggle-level-2-01" class="toggle"></label>
                <input type="checkbox" id="toggle-level-2-01"/>
                <ul class="level-two">
                  <li style="font-family: Comfortaa;font-size: 22px;">
                    <a href="./mechkeyboards.php">&emsp;Mechanical</a></li>
                  <li style="font-family: Comfortaa;font-size: 22px;">
                    <a href="./hotswp.php">&emsp;Hotswappable</a></li>
                  <li class="parent" style="font-family: Comfortaa;">
                    <a href="./wireless.php" style="font-size: 22px;">&emsp;Wireless</a>
                      </li>
                      <li class="parent" style="font-family: Comfortaa;">
                        <a href="./wired.php" style="font-size: 22px;">&emsp;Wired</a>
                          </li>
                      <li class="parent" style="font-family: Comfortaa;">
                        <a href="./membrane.php" style="font-size: 22px;">&emsp;Membrane</a>
                          </li>
                  </li>
                </ul>
              </li>
              <li class="parent" style="font-family: Comfortaa;font-size: 25px;"><a href="#">Switches</a>
                <label for="toggle-level-2-02" class="toggle"></label>
                <input type="checkbox" id="toggle-level-2-02"/>
                <ul class="level-two">
                  <li style="font-family: Comfortaa;font-size: 22px;">
                    <a href="./clicky.php">&emsp;Clicky</a></li>
                  <li style="font-family: Comfortaa;font-size: 22px;">
                    <a href="./linear.php">&emsp;Linear</a></li>
                  <li class="parent" style="font-family: Comfortaa;">
                    <a href="./tactile.php" style="font-size: 22px;">&emsp;Tactile</a>
                      </li>
                  </li>
                </ul>
              </li>
              <li class="parent" style="font-family:
              Comfortaa;font-size: 25px;"><a href="./keycaps.php">Keycaps</a>
                <input type="checkbox" id="toggle-level-2-03"/>
              </li>
            </ul>
          </div>
        <a href="./homepage.php#contact" class="text" style="right: 510px;">Contact</a>
        <a href="./homepage.php#reviews" class="text" style="right: 370px;">Reviews</a>
        <a href="cart.php"><img src="./images/shpcart.png"
         alt="cart" class="cartsymbol" style="right:270;"></a>
        <div style="z-index: 9; position: absolute;
         top: 57px;color: white;font-family: Comfortaa;font-size: 25px;right: 60px;">
        <a href="accountinfo.php" style="text-decoration: none;"><b style="color: white;
        "><?=$usr?></b></a>
        </div>
        