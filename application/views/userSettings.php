<div>
    <bold>{user}</bold>
    <form name="updateUser" action="/register/update" method="post">
        Password:<br>
        <input type="text" name="pass">
        <br>
        <input type="submit" value="Submit">
        <br>
    </form>
    <form method="post" action="/register/upload" enctype="multipart/form-data" >
        <br>
        Avatar:<br>
        <input type="file" name="avatar" size="20">
        <br>
        <input type="submit" value="upload" />
    </form>
</div>
