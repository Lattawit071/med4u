<header class="header">
    <div class="header-container">
      <a href="<?php echo $nav_header_link; ?>" class="text-light" id="nav_vaccine"><?php echo $nav_header_title; ?></a>
      <div class="dropdown">
        <button class="dropbtn" id="selectedLanguage">
          <img src="./uploads/lang/thailand.png" alt="Language" class="flag">TH
        </button>
        <div class="dropdown-content" id="myDropdown">
          <a href="?lang=th" onclick="changeLanguage('TH')"><img src="./uploads/lang/thailand.png" alt="Language" class="flag">TH</a>
          <a href="?lang=en" onclick="changeLanguage('EN')"><img src="./uploads/lang/english.png" alt="Language" class="flag">EN</a>
          <a href="?lang=cn" onclick="changeLanguage('CN')"><img src="./uploads/lang/china.png" alt="Language" class="flag">CN</a>
          <a href="?lang=jap" onclick="changeLanguage('JAP')"><img src="./uploads/lang/japan.png" alt="Language" class="flag">JAP</a>
          <a href="#" onclick="changeLanguage('ar')"><img src="./uploads/lang/arab.png" alt="Language" class="flag">AR</a>
        </div>
      </div>
    </div>
  </header>