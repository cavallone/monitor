    <div id="content" class="table-responsive">
        <table class="table table-hover table-bordered">
        <thead>
            <tr class="info">
                <th></th>
                <th>Source</th>
                <th>Target Port</th>
                <th>Count</th>
                <th>Last Attack</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($loglist as $k => $v) { ?>
            <tr class="data">
                <td class="filter-icon" align=center><span class="glyphicon glyphicon-plus"></span></td>
                <td><?php echo $v->source ?></td>
                <td><?php echo $v->dstport ?></td>
                <td><?php echo $v->count ?></td>
                <td><?php echo $v->update_time ?></td>
            </tr>
            <tr class="well hide data-detail">
                <td colspan=9>
                </td>
            </tr>
        <?php } ?>
        </tbody>
        </table>
    </div>
    <script src="/ndis/assets/monIP.js"></script>
    <script src="/ndis/assets/list.js"></script>
