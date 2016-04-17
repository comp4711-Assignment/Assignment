<!-- 
 The main page that holds the two panels on the tables
 for even spacing.
-->
<!--<meta http-equiv="refresh" content="5">-->
<div style="height: 100px; width:100%; background-color:#DDDDDD; margin-bottom: 20px; padding: 5px 20px 0px 20px;">
    {gamepanel}
</div>
<div class="table-responsive">
    <table class="table table-bordered">
        <td id="StckPnl" style="width: 50%"> <!--Panel for stock info-->
            <table>
                <thead>
                    <tr>
                        <th class="span2">Name</th><th class="span2">Value</th>
                    </tr>
                </thead>
                <tbody>
                    {stockpanel}
                </tbody>
            </table>
        </td> <!-- stock end --> 
        <td id="PlyrPnl"> <!--player info-->
            <table>
                <thead>
                    <tr>
                        <th class="span2">Player</th>
                        <th class="span2">Cash</th>
                        <th class="span2">Equity</th>
                    </tr>
                </thead>
                <tbody>
                    {playerpanel}
                </tbody>
            </table>
        </td> <!-- player end -->
    </table>
</div>
