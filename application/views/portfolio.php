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
<div><h3>Current Equity: {playerequity}</h3></div>
<br>
<br>
<h3>Player Activity</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th class="span2">Date</th>
            <th clas="span2">Stock</th>
            <th class="span2">Transaction</th>
            <th class="span2">Quantity</th>
        </tr>
    </thead>
    <tbody>
        {playeract}
    </tbody>
</table>
<br>
<br>
<h3>Current holdings</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th class="span2">Stock</th>
            <th class="span2">Quantity</th>
            <th class="span2">Value</th>
            <th class="span2">Total</th>
        </tr>
    </thead>
    <tbody>
        {playerdata}
    </tbody>
</table>
        
