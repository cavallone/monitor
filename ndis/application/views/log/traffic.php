    <div id="content" class="table-responsive">
        <table class="table table-hover table-bordered">
        <thead>
            <tr class="info">
                <th>srcip</th>
                <th>srcport</th>
                <th>dstip</th>
                <th>dstport</th>
                <th>proto</th>
                <th>bytes</th>
                <th>start</th>
                <th>stop</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($loglist as $k => $v) { ?>
            <tr class="data">
                <td><?php echo $v->srcip ?></td>
                <td><?php echo $v->srcport ?></td>
                <td><?php echo $v->dstip ?></td>
                <td><?php echo $v->dstport ?></td>
                <td><?php echo $v->proto ?></td>
                <td><?php echo $v->bytes ?></td>
                <td><?php echo $v->start_time ?></td>
                <td><?php echo $v->stop_time ?></td>
            </tr>
        <?php } ?>
        </tbody>
        </table>
    </div>
    <script src="/ndis/assets/traffic.js"></script>
    <script src="/ndis/assets/list.js"></script>
