<div class="container">
  <div class="page-header">
    <h1>Rank</h1>
  </div>
  <style type="text/css">
    label {
      font-size:18px;
    }
  </style>
  <form class="form-inline row" align=center>
    <div class="form-group col-xs-4">
      <label>Protocol: </label>
      <label class="radio-inline">
        <input type="radio" name="IP" value="v4" checked>IPv4
      </label>
      <label class="radio-inline">
        <input type="radio" name="IP" value="v6">IPv6
      </label>
    </div>
    <div class="form-group col-xs-4">
      <label>Date: </label>
      <input type="text" class="form-control" id="date">
    </div>
    <div class="form-group col-xs-4">
      <label>Ordered by: </label>
      <label class="radio-inline">
        <input type="radio" name="order" value="flows">Flows
      </label>
      <label class="radio-inline">
        <input type="radio" name="order" value="packets" checked>Packets
      </label>
      <label class="radio-inline">
        <input type="radio" name="order" value="bytes">Bytes
      </label>
    </div>
  </form>
  <div align="center" role="tabpanel">
    <ul id="myTab" class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a role="tab" data-toggle="tab" id="downlink">InBound</a></li>
      <li role="presentation"><a role="tab" data-toggle="tab" id="uplink">OutBound</a></li>
      <li role="presentation"><a role="tab" data-toggle="tab" id="port21">ftp</a></li>
      <li role="presentation"><a role="tab" data-toggle="tab" id="port22">ssh</a></li>
      <li role="presentation"><a role="tab" data-toggle="tab" id="port23">telnet</a></li>
      <li role="presentation"><a role="tab" data-toggle="tab" id="port25">Mail</a></li>
      <li role="presentation"><a role="tab" data-toggle="tab" id="port53">DNS</a></li>
      <li role="presentation"><a role="tab" data-toggle="tab" id="port80">HTTP</a></li>
      <li role="presentation"><a role="tab" data-toggle="tab" id="port139">網路芳鄰139</a></li>
      <li role="presentation"><a role="tab" data-toggle="tab" id="port443">HTTPS</a></li>
      <li role="presentation"><a role="tab" data-toggle="tab" id="port445">網路芳鄰445</a></li>
      <li role="presentation"><a role="tab" data-toggle="tab" id="port135">RPC</a></li>
      <li role="presentation"><a role="tab" data-toggle="tab" id="port3128">proxy</a></li>
      <li role="presentation"><a role="tab" data-toggle="tab" id="port3389">遠端桌面</a></li>
      <li role="presentation"><a role="tab" data-toggle="tab" id="ICMP">ICMP</a></li>
    </ul>
    <div class="container ret_data" align="center"></div>
  </div>
  <hr>
</div>
<script src="/ndis/assets/jquery-ui-1.11.2/jquery-ui.min.js"></script>
<link rel="stylesheet" href="/ndis/assets/jquery-ui-1.11.2/jquery-ui.min.css">
<script src="/ndis/assets/rank.js"></script>
