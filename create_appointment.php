<?php 
    require('doc_auth.php'); 
    //echo $_SESSION['name'];
    $name=$_SESSION['name'];
    $place="";
    $date="";
    $stime="";
    $etime="";
    $con = mysqli_connect("localhost:3308","root","","resevastion_system_db");
    if (isset($_POST["submit"])){
        $place=$_POST["sel0"];
        $date=$_POST["Date0"];
        $stime=$_POST["time0"];
        $etime=$_POST["time20"];
        $query = "INSERT INTO doc_appoinment VALUES('$name','$place','$date','$stime','$etime');";
        $result=mysqli_query($con,$query);
        echo $_SESSION['name'];
        if($result){
            header("Location: doc_profile.php");
        }
        else{
            echo "can't create appoinment";
        }
    }
    


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container">
    <div class="row clearfix">
    	<div class="col-md-12 table-responsive">
            <form action="create_appointment.php" method="post">
			<table class="table table-bordered table-hover table-sortable" id="tab_logic">
				<thead>
					<tr >
						<th class="text-center">
							Place
						</th>
						<th class="text-center">
							Date
						</th>
    					<th class="text-center">
							Time(start)
						</th>
            <th class="text-center">
            Time(end)
          </th>
        				<th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
						</th>
					</tr>
				</thead>
				<tbody>
    				<tr id='addr0' data-id="0" class="hidden">
						<td data-name="place">
              <select name="sel0">
                       <option value="" disabled selected>Select Place</option>
                     <option value="Rakwana">Rakwana</option>
                       <option value="Godakawela">Godakawela</option>
                       <option value="Hetan">Hetan</option>
                       <option value="Embilipitiya">Embilipitiya</option>
               </select>
						</td>
						<td data-name="date">
						    <input type="date" name="Date0" class="form-control"/>
						</td>
    					<td data-name="time">
						    <input type="time" name="time0" class="form-control"/>
						</td>
            <td data-name="time2">
              <input type="time" name="time20" class="form-control"/>
          </td>
                        <td data-name="del">
                            <button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></button>
                        </td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
   <button type="submit" class="btn btn-primary" name="submit">Create</button>
	<a id="add_row" class="btn btn-primary float-left">Add Row</a>
</div>
</form>
<script>
  $(document).ready(function() {
    $("#add_row").on("click", function() {
        // Dynamic Rows Code

        // Get max row id and set new id
        var newid = 0;
        $.each($("#tab_logic tr"), function() {
            if (parseInt($(this).data("id")) > newid) {
                newid = parseInt($(this).data("id"));
            }
        });
        newid++;

        var tr = $("<tr></tr>", {
            id: "addr"+newid,
            "data-id": newid
        });

        // loop through each td and create new elements with name of newid
        $.each($("#tab_logic tbody tr:nth(0) td"), function() {
            var td;
            var cur_td = $(this);

            var children = cur_td.children();

            // add new td and element if it has a nane
            if ($(this).data("name") !== undefined) {
                td = $("<td></td>", {
                    "data-name": $(cur_td).data("name")
                });

                var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                c.attr("name", $(cur_td).data("name") + newid);
                c.appendTo($(td));
                td.appendTo($(tr));
            } else {
                td = $("<td></td>", {
                    'text': $('#tab_logic tr').length
                }).appendTo($(tr));
            }
        });

        // add delete button and td
        /*
        $("<td></td>").append(
            $("<button class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>")
                .click(function() {
                    $(this).closest("tr").remove();
                })
        ).appendTo($(tr));
        */

        // add the new row
        $(tr).appendTo($('#tab_logic'));

        $(tr).find("td button.row-remove").on("click", function() {
             $(this).closest("tr").remove();
        });
});




    // Sortable Code
    var fixHelperModified = function(e, tr) {
        var $originals = tr.children();
        var $helper = tr.clone();

        $helper.children().each(function(index) {
            $(this).width($originals.eq(index).width())
        });

        return $helper;
    };

    $(".table-sortable tbody").sortable({
        helper: fixHelperModified
    }).disableSelection();

    $(".table-sortable thead").disableSelection();



    $("#add_row").trigger("click");
});
</script>
  </body>
</html>
