<?php
/*
 * Menu navbar, just an unordered list
 */
?>

<!-- updated navbar from bootstrap-->
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
    <ul class="nav navbar-nav navbar-right">
    <li>{userlink}{username}{closelink}</li>
    <li>{loginlink}{action}{reglink}{regtext}</li>
    <li>{settings}{settingstext}</button></li>
    </ul>
  </div>
</nav>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
          <form role ="form" method="post" action="/welcome/get_value">                  
              <div class="formgroup">
                  <label for="username">Username</label>
                  <input name="username" type="text" class="form-control" id="username" value="" width="30">
              </div>
              
              <div class="formgroup">
                  <label for="pass">Password</label>
                  <input name="pass" type="password" class="form-control" id="pass" width="15">
              </div>
              
              <button type="submit" name="submit" id="submit" class="btn btn-default" value="submit">Submit</button>
              
          </form>
          <div class="modal-footer">
          </div>
      </div>
    </div>

  </div>
</div>