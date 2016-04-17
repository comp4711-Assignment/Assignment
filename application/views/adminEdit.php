<div>
    <bold>{user}</bold>
    <form name="updateUser" action="/admin/edit" method="post">
        <input name="user" value="{user}" type="hidden">
        Password:<br>
        <input type="radio" name="pass" value="null" checked> Do nothing
        <input type="radio" name="pass" value="reset"> reset
        <br>
        Type:<br>
        <input type="radio" name="type" value="null" checked> Do nothing
        <input type="radio" name="type" value="user"> Make User
        <input type="radio" name="type" value="admin"> Make Admin
        <br>
        Avatar: <br>
        <input type="radio" name="avatar" value="null" checked> Do nothing
        <input type="radio" name="avatar" value="reset"> Reset
        <br>
        <input type="submit" value="Submit">
        <br>
    </form>
</div>