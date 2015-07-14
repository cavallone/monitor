<div class="table-responsive">
    <table class="table table-hover table-bordered">
    <thead>
        <tr class="info">
            <th>ID</th>
            <th>Time</th>
            <th>Source port</th>
            <th>Target</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($detail as $k => $v) { ?>
        <tr>
            <td><?php echo $v->id ?></td>
            <td><?php echo $v->date ?></td>
            <td><?php echo $v->srcport ?></td>
            <td><?php echo $v->target ?></td>
        </tr>
    <?php } ?>
    </tbody>
    </table>
</div>
