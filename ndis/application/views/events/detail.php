<div class="table-responsive">
    <div class="panel panel-info">
        <div class="panel-heading">Event Timeline</div>
        <div class="panel-body timeline-plot">
        </div>
        <table class="table table-hover table-bordered">
        <thead>
            <tr class="active">
                <th>ID</th>
                <th>Start Time</th>
                <th>Stop Time</th>
                <th>Event Type</th>
                <th>Src IP</th>
                <th>Src port</th>
                <th>Dst IP</th>
                <th>Dst port</th>
                <th>Attack Counts</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($detail as $k => $v) { ?>
            <tr>
                <td><?php echo $v->id ?></td>
                <td><?php echo $v->start_time ?></td>
                <td><?php echo $v->stop_time ?></td>
                <td><?php echo $v->event_type ?></td>
                <td><?php echo $v->src_ip ?></td>
                <td><?php echo $v->src_port ?></td>
                <td><?php echo $v->dst_ip ?></td>
                <td><?php echo $v->dst_port ?></td>
                <td><?php echo $v->attack_count ?></td>
            </tr>
        <?php } ?>
        </tbody>
        </table>
    </div>
</div>
