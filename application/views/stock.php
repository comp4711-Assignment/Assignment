<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
        Pick Stock..
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
        {stocklist} <!--List of stocks. Need to be wrapped in <li> tags-->
    </ul>
</div>
<h3>{stockname}</h3>
<div><h3>Current Value: {stockvalue}</h3></div>
<br>
<br>
<table class="table table-bordered">
        <td id="StckHistory">
            <table>
                <thead>
                    <tr>
                        <th class="span2">Player</th><th class="span2">Stock</th><th class="span2">Action</th><th class="span2">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    {stockdata}
                </tbody>
            </table>
        </td> <!--Panel for stock info-->
    </table>
<table class="table table-bordered">
        <td id="StckMovement">
            <table>
                <thead>
                    <tr>
                        <th class="span2">Action</th><th class="span2">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    {movements}
                </tbody>
            </table>
        </td> <!--Panel for stock info-->
    </table>
        