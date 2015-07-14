<div class="container">
  <div class="page-header">
    <h1>Port Statistics</h1>
  </div>
  <form class="form-inline row" id="search" align=center>
    <div class="form-group col-xs-4">
      <label>Protocol: </label>
      <label class="radio-inline">
        <input type="radio" name="proto" value="6" checked>TCP
      </label>
      <label class="radio-inline">
        <input type="radio" name="proto" value="17">UDP
      </label>
      <label class="radio-inline">
        <input type="radio" name="proto" value="1">ICMP
      </label>
    </div>
    <div class="form-group col-xs-4">
      <label>Port: </label>
      <input type="text" class="form-control" id="port">
    </div>
    <div class="col-xs-2">
	  <button class="btn btn-primary" type="submit"> 
	    <span class="glyphicon glyphicon-search"></span> 查詢
	  </button>
    </div>
  </form>
  <div id="port_statistics"></div>
</div>
<script src="/ndis/assets/highcharts/highcharts.js"></script>
<script src="/ndis/assets/highcharts/exporting.js"></script>
<script src="/ndis/assets/ports.js"></script>
<script src="/ndis/assets/jquery-ui-1.11.2/jquery-ui.min.js"></script>
<link rel="stylesheet" href="/ndis/assets/jquery-ui-1.11.2/jquery-ui.min.css">
