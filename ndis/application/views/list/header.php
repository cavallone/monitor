<style>
    .table-hover>tbody>tr.nohover:hover{
        background-color: #fff;
    }
</style>
<div class="container">
    <div class="page-header">
    <h1><?php echo $title?></h1>
    </div>
    <div class="well" style="margin-bottom:0; text-align:center; padding-top:0px; padding-bottom:0px">
        <div class="row panel-body">
            <div class="col-lg-3 form-inline">
                <label>From: </label>
                <input id="from_day" class="form-control date">
            </div>
            <div class="col-lg-3 form-inline">
                <label>To: </label>
                <input id="to_day" class="form-control date">
            </div>
            <div class="col-lg-1">
			    <button id="calendar" class="btn btn-primary"> 
			    	<span class="glyphicon glyphicon-calendar"></span> 查詢
			    </button>
            </div>
            <div class="col-lg-1">
            </div>
            <div class="col-lg-4">
                <input id="filter" class="form-control" placeholder="Filter">
            </div>
        </div>
	</div>
