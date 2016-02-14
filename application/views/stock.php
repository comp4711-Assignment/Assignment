<h1>{stockname}</h1>
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
        Pick Stock..
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
        {stocklist} <!--List of stocks. Need to be wrapped in <li> tags-->
    </ul>
</div>
<div>{stockvalue}</div>
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
        