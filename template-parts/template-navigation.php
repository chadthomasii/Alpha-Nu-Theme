
<style>

nav
{
    box-shadow: 0 1px 6px rgba(57,73,76,0.35);
    background-color: var(--dark-text);
    position: absolute;
    width: 100%;
    z-index: 10;
    top: 0;
  
}

.nav-mobile-bar
{
    display:none;
}

.nav-close
{
    display: none;
}

.front-page
{
    background:transparent;
    box-shadow: none;
}
.front-page ul li:hover
{
    background-color: transparent;
}

.front-page ul li a:hover
{
    color: var(--main-color);

}



ul {
    margin: 0 auto;
    padding: 0;
    list-style-type: none;
    position: relative;
    text-align: center;

}


.main-menu::after 
{
  content: "";
  clear: both;
  display: table;
}


ul section
{
    color: var(--main-color);
    display: inline-block;
    margin-left: 15px;
}

 
ul li 
{
    display: inline-block;
}
 
ul li a {
      color: #fff;
      text-decoration: none;
      padding: 20px 25px;
      display: block;
      font-size: 2.5em;
      text-transform: uppercase;
      font-weight: 200;
}

.main-menu li:last-child
{
    margin-right: 80px;
}
 
ul li:hover {
    background-color: var(--main-color);
}

 
ul ul {
      position: absolute;
      min-width: 200px;
      background: lightgrey;
      display: none;
}
 
ul ul li {
      display: block;
      background: #fff;
}
 
ul li:hover ul {
      display: block;
}
 
ul li i {
      color: #fff;
      float: right;
      padding-left: 5px;
}
 
nav div 
{
    float: left;
}
 
nav div img
{
    height: 90px;
    width: 80px;
    margin-top: 4px;
    margin-left: 20px;
}

@media(max-width: 1200px) 
{
    ul li a
    {
        padding: 27px 15px;
        font-size: 1.9em;
    }

}

@media(max-width: 900px) 
{
    ul li a
    {
        padding: 27px 10px;
        font-size: 1.6em;
    }
}

@media(max-width: 768px) 
{
  nav
  {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      text-align: center;
      transform: translateX(-100%);
      transition: transform 0.4s ease;
      box-shadow: none;
  }
  
  .nav-mobile-bar
  {
      display: block;
      z-index: 10;
      height: 100px;
      width: 100%;
      background-color: var(--dark-text);
      position: absolute;
      top: 0;
      box-shadow: 0 1px 6px rgba(57,73,76,0.35);

  }

  .front-page
  {
      background-color: var(--dark-text);
  }

  .nav-active
  {
      transform: translateX(0%);
  }

  
  nav div
  {
      float: none;
      clear: both;
  }

  nav div:after
  {
      content: "";
      clear: both;
      display: table;

  }

  nav div img
  {
      margin: 0;
      margin-left: 20px;
      float: left;
      
  }

  .nav-close
  {
      display: initial;
      font-size: 3em;
      color: #fff;
      float: right;
      margin-right: 20px;
      margin-top: 25px;
  }


  .main-menu li
  {
      display: block;
      width: 100%;
  }

    ul li a
    {
      padding: 20px 25px;
      font-size: 2.2em;
    }
}

</style>


<div class="nav-mobile-bar nav-toggle">
    <i class="fas fa-bars nav-close"></i>
</div>

<nav 
<?php
    if(is_front_page())
    {
        echo ' class="front-page"';
    }
?>
>
    

    <div>
        <?php 

            if (function_exists('the_custom_logo')) 
            {
                the_custom_logo();
            } 
        ?>    

        <i class="fa fa-bars nav-close nav-toggle "></i>

    </div>

        <?php 

            
        
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'main-menu'
                )
            );
        ?>
      
</nav>