</div>
<script src="/ndis/assets/jquery-ui-1.11.2/jquery-ui.min.js"></script>
<link rel="stylesheet" href="/ndis/assets/jquery-ui-1.11.2/jquery-ui.min.css">
<script>
    $(document).ready(function(){
        // Get the date yesterday
        var date = new Date();
        var day =date.getDate().toString();
        day = day.length > 1? day:'0'+day;
        var month =(date.getMonth()+1).toString();
        month = month.length > 1? month:'0'+month;
        $(".date").val([date.getFullYear(),month,day].join("-"));
        $(".date").datepicker({dateFormat: 'yy-mm-dd'});
    });
</script>
