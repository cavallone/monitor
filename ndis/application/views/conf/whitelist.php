<div>
    <table class="table table-hover table-bordered">
        <thead>
          <tr class="info">
            <th>IP</th>
            <th>DN</th>
            <th>owner</th>
            <th>Last Updated</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($list as $k => $v){ ?>
          <tr class="data">
            <td><?php echo $v->IP ?></td>
            <td><?php echo $v->DN ?></td>
            <td><?php echo $v->owner ?></td>
            <td><?php echo $v->last_updated ?></td>
          </tr>
          <?php } ?>
        </tbody>
    </table>
</div>
