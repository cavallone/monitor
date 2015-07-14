<div class="container">
  <div class="page-header">
    <h1>Status</h1>
  </div>
  <h3>Machine status</h3>
  <div id="CPU_status"></div>
  <hr>
  <div id="Memory_status"></div>
  <div id="program">
    <div id="dpi" class="sbar">
      <span class="title">DPI&nbsp;system&nbsp;:&nbsp;</span>
      <span class="text"></span>
    </div>
    <div id="reporter" class="sbar">
      <span class="title">dpireporter&nbsp;:&nbsp;</span>
      <span class="text"></span>
    </div>
  </div>
</div>
<style type="text/css">
  .sbar{
    padding:5px 0px 5px 10px;
    margin:5px 0px 5px 10px;
    clear:both;    
    border-radius:10px;
    -moz-border-radius:10px;
    -webkit-border-radius:10px;
  }
  .sbar_green{
    color:#003300;
    background:#55FF55;
  }
  .sbar_red{
    color:#330000;
    background:#FF5555;
  } 
</style>
<script src="/ndis/assets/highcharts/highcharts.js"></script>
<script src="/ndis/assets/highcharts/exporting.js"></script>
<script src="/ndis/assets/status.js"></script>
