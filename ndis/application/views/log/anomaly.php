    <div id="content" class="table-responsive">
        <table class="table table-hover table-bordered">
        <thead>
            <tr class="info">
                <th></th>
                <th>Event Type</th>
                <th>SRC IP</th>
                <th>SRC port</th>
                <th>DST IP</th>
                <th>DST port</th>
                <th>Event Count</th>
                <th>Lask Attack</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($loglist as $k => $v) { ?>
            <tr class="data">
                <td class="filter-icon" align=center><span class="glyphicon glyphicon-plus"></span></td>
                <td><?php echo $v->event_type ?></td>
                <td><?php echo $v->src_ip ?></td>
                <td><?php echo $v->src_port ?></td>
                <td><?php echo $v->dst_ip ?></td>
                <td><?php echo $v->dst_port ?></td>
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
    <script src="/ndis/assets/anomaly.js"></script>
    <script src="/ndis/assets/list.js"></script>
