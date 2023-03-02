<html>

<head>
    <title>OSS Test</title>
    <meta charset="utf-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" 
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
    crossorigin="anonymous">
</head>

<body>

<div class="container">
    @yield('content')
</div>
 
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script>
    $(document).ready(function() {
            $('.getdata').click(function(){
            var companyid=$(this).attr('attr-companyid');
            $("#resultset").html('');
            $.ajax({
                type:'GET',
                url:'/getuserlist?company_id=' + companyid,
                success:function(data) {
                    const nums = [];
                    $.each(data.assigned_users, function (key1, val1) {
                        nums.push(val1.id);
                    });
                    var str="";
                    str +="<input type='hidden' name='company_id' value='"+ companyid + "'>" + "</br>"
                    $.each(data.all_users, function (key, val) {
                       if(nums.includes(val.id)){
                        str += "<input type='checkbox'  name='user[]' value='"+ val.id +"' Checked disabled>" + val.name + "</br>";
                       }else{
                        str += "<input type='checkbox'  name='user[]' value='"+ val.id +"'>" + val.name + "</br>";
                        }
                    });
                    $("#resultset").append(str);
                    $("#demoModal").modal('show');
                }
            });
            });
        });
    </script>


</body>

</html>