
<style>

nav
{
    box-shadow: 0 4px 2px -2px rgba(0,0,0,.2);
    background-color: var(--dark-text);
    position: absolute;
    width: 100%;
    z-index: 10;
    top: 0;
  
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
      margin: 20px 25px;
      display: block;
      font-size: 2.5em;
      text-transform: uppercase;
      font-weight: 200;
}

.main-menu li:last-child
{
    margin-right: 100px;
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
    margin-left: 20px;
}
 
nav div img
{
    height: 90px;
    width: 80px;
    margin-top: 4px;
}
@media(max-width: 768px) 
{
    nav div {
        display: block;
        width: 100%;
    }

    nav div::after 
    {
    content: "";
    clear: both;
    display: table;
    }

    nav div i 
    {
        font-size: 40px;
    }

    ul {
        display: none;
        position: static;
        background: #fff;
    }

    ul section 
    {
        display: none;
    }

    .main-menu > li
    {
        float: none;
    }

    .main-menu > li:nth-child(2)
    {
        margin-right: 0px;
    }

    ul li {
        display: block;
    }

    ul ul {
        position: static;
        background: #fff;
    }
}

</style>

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