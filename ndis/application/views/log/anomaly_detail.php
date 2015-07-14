<div class="table-responsive">
    <table class="table table-hover table-bordered">
    <thead>
        <tr class="info">
            <th>ID</th>
            <th>Start Time</th>
            <th>Stop Time</th>
            <th>Attack Counts</th>
            <th>Download</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($detail as $k => $v) { ?>
        <tr>
            <td><?php echo $v->id ?></td>
            <td><?php echo $v->start_time ?></td>
            <td><?php echo $v->stop_time ?></td>
            <td><?php echo $v->attack_count ?></td>
            <td class="filter-icon" align=center>
                <span class="download glyphicon glyphicon-file"></span>
            </td>
        </tr>
    <?php } ?>
    </tbody>
    </table>
</div>
