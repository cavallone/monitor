    <div id="content" class="table-responsive">
        <table class="table table-hover table-bordered">
        <thead>
            <tr class="info">
                <th>src_ip</th>
                <th>src_port</th>
                <th>dst_ip</th>
                <th>dst_port</th>
                <th>date</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($loglist as $k => $v) { ?>
            <tr class="data">
                <td><?php echo $v->src_ip ?></td>
                <td><?php echo $v->src_port ?></td>
                <td><?php echo $v->dst_ip ?></td>
                <td><?php echo $v->dstport ?></td>
                <td><?php echo $v->date ?></td>
            </tr>
        <?php } ?>
        </tbody>
        </table>
    </div>
    <script src="/ndis/assets/blacklist.js"></script>
    <script src="/ndis/assets/list.js"></script>
