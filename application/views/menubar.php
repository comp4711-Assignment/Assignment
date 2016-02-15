<?php
/*
 * Menu navbar, just an unordered list
 */
?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
     <div class="navbar-header">
      <a class="navbar-brand" href="/">Stock Ticker</a>
    </div>
    <ul class="nav navbar-nav">
       {menudata}
    <li><a href="{link}">{name}</a></li>
    {/menudata}
    </ul>
  </div>
</nav>
