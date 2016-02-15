<h1>{playername}</h1>
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
        Pick Player..
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
        {playerlist} <!--List of players. Need to be wrapped in <li> tags-->
    </ul>
</div>
<div><h3>Current Cash: {playercash}</h3></div>
<br>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th class="span2">Holdings</th>
            <th class="span2">Quantity</th>
            <th class="span2">Value</th>
            <th class="span2">Total</th>
        </tr>
    </thead>
    <tbody>
        {playerdata}
    </tbody>
</table>
        
