    <!-- Modal -->
    <div class="modal fade" id="warnModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Warning</h4>
          </div>
          <div class="modal-body">
            You have selected
            <input type="text" class="form-control" id="targetIP" readonly>
            Please enter your reason:
            <textarea class="form-control" rows="3" id="warn_content"></textarea>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button id="warnIP" type="button" class="btn btn-danger" data-dismiss="modal">Warn</button>
          </div>
        </div>
      </div>
    </div>
    <div id="content" class="table-responsive">
      <table class="table table-hover table-bordered">
      <thead>
        <tr class="info">
          <th></th>
          <th>IP</th>
          <th>source</th>
          <th>Event Count</th>
          <th>Log Count</th>
          <th>Last Attack</th>
          <th>Warning</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($event_list as $k => $v){ ?>
          <tr class="data">
            <td class="filter-icon" align=center><span class="glyphicon glyphicon-plus"></span></td>
            <td><?php echo $v->src_ip ?></td>
            <td><?php 
                echo geoip_country_name_by_name("$v->src_ip");
            ?></td>
            <td><?php echo $v->event_count ?></td>
            <td><?php echo $v->log_count ?></td>
            <td><?php echo $v->update_time ?></td>
            <td class="warn-icon" align=center><span class="glyphicon glyphicon-warning-sign" data-toggle="modal" data-target="#warnModal"></span></td>
          </tr>
          <tr class="hide data-detail nohover">
              <td colspan=9>
              </td>
          </tr>
        <?php } ?>
      </tbody>
      </table>
    </div>
    <script src="/ndis/assets/events.js"></script>
    <script src="/ndis/assets/list.js"></script>
    <script src="/ndis/assets/highcharts/highcharts.js"></script>
    <script src="/ndis/assets/highcharts/highcharts-more.js"></script>
    <script src="/ndis/assets/highcharts/exporting.js"></script>
    <script src="/ndis/assets/jquery-ui-1.11.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="/ndis/assets/jquery-ui-1.11.2/jquery-ui.min.css">
