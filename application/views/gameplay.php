<div style="width:100%; height:100%;">
    <div style="float:right; width:50%; height:inherit;">
        {playerInfo}
    </div>
    <div style="float:left; width:50%; height:inherit;">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="span2">Stock</th>
                    <th clas="span2">Quantity</th>
                    <th class="span2">Value</th>
                    <th class="span2">Total</th>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                            Value..
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a>5</a></li>
                            <li><a>10</a></li>
                            <li><a>20</a></li>
                            <li><a>50</a></li>
                            <li><a>100</a></li>
                            <li><a>1000</a></li>
                        </ul>
                    </div>
                </tr>
            </thead>
            <tbody>
                {stocks}
            </tbody>
        </table>
        
    </div>
</div>

