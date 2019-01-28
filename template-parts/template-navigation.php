
<style>

nav
{
    box-shadow: 0 4px 2px -2px rgba(0,0,0,.2);
  
}



ul {
    margin: 0 auto;
    padding: 0;
    list-style-type: none;
    background: #fff;
    position: relative;
    max-width: 1200px;

}


.main-menu::after 
{
  content: "";
  clear: both;
  display: table;
}

.main-menu > li
{
    float: right;
}


ul section
{
    color: var(--main-color);
    display: inline-block;
    margin-left: 15px;
}

ul section h1
{
    font-family: "Pacifico";
    font-size: 28px;
}
 
ul li {
      display: inline-block;
}
 
ul li a {
      color: var(--main-color);
      text-decoration: none;
      padding: 30px 15px;
      display: block;
      font-size: 1.5em;
}
 
ul li:hover {
    background-color: #f3f3f3;
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
      color: var(--main-color);
      float: right;
      padding-left: 5px;
}
 
nav div {
      background: #fff;
      color: var(--text-color);
      font-size: 24px;
      padding: 0.6em;
      cursor: pointer;
      display: none;
}
 
@media(max-width: 768px) 
{
    nav div {
        display: block;
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

    nav div h1 
    {
        float: right;
        color: var(--main-color);
        font-family: "Pacifico";
        font-size: 23px;
        margin-right: 20px;
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

<nav>

    

    <div>
        <h1 class="logo-text">Swati</h1>
        <i class="fa fa-bars"></i>
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