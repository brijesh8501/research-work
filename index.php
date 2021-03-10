<!DOCTYPE html>
<html lang="en">
<head>
    <title>Spectrum | MLS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <link href="tabulator.min.css" rel="stylesheet">
</head>
<body>
    <div id="tabulator-controls" class="table-controls hidden-xs" style="margin:2rem 0;">
        <i class="fa fa-filter fa-fw"></i> <input name="name" type="text" placeholder="Filter Table By Name">
        <button name="download"><i class="fa fa-download"></i> Download Data as CSV</button>
        <select id="user_entries">
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
        </select>
    </div>
    <div id="example-table"></div>
<script src="jquery.min.js"></script>
<script src="tabulator.min.js"></script>
<script>
    var table = new Tabulator("#example-table", { 
        height:"100%",
        layout:"fitColumns",
        placeholder:"No Records Found",
        pagination:"local",
        paginationSize:5, 
        movableColumns:true, 
        columns:[
        {title:"Name", field:"name"},
        {title:"Progress", field:"progress", headerSort: false},
        {title:"Gender", field:"gender"},
        {title:"Rating", field:"rating"},
        {title:"Favourite Color", field:"col"},
        {title:"Date Of Birth", field:"dob", hozAlign:"center"},
        ],
    });
    var tableData = [
        {name:"Billy Bob", progress:"zero", gender:"male", rating:1, col:"red", dob:"2 September 1991"},
        {name:"Ahir Brijesh", progress:"one", gender:"female", rating:2, col:"blue", dob:"2 September 1992"},
        {name:"Ahir Ushaben", progress:"two", gender:"male", rating:3, col:"white", dob:"2 September 1993"},
        {name:"Ahir Hirenkumar", progress:"three", gender:"female", rating:4, col:"green", dob:"2 September 1994"},
        {name:"Ahir Binal", progress:"four", gender:"female", rating:5, col:"pink", dob:"2 September 1995"},
        {name:"Billy Bob", progress:"zero", gender:"male", rating:1, col:"red", dob:"2 September 1991"},
        {name:"Ahir Brijesh", progress:"one", gender:"female", rating:2, col:"blue", dob:"2 September 1992"},
        {name:"Ahir Ushaben", progress:"two", gender:"male", rating:3, col:"white", dob:"2 September 1993"},
        {name:"Ahir Hirenkumar", progress:"three", gender:"female", rating:4, col:"green", dob:"2 September 1994"},
        {name:"Ahir Binal", progress:"four", gender:"female", rating:5, col:"pink", dob:"2 September 1995"},
        {name:"Billy Bob", progress:"zero", gender:"male", rating:1, col:"red", dob:"2 September 1991"},
        {name:"Ahir Brijesh", progress:"one", gender:"female", rating:2, col:"blue", dob:"2 September 1992"},
        {name:"Ahir Ushaben", progress:"two", gender:"male", rating:3, col:"white", dob:"2 September 1993"},
        {name:"Ahir Hirenkumar", progress:"three", gender:"female", rating:4, col:"green", dob:"2 September 1994"},
        {name:"Ahir Binal", progress:"four", gender:"female", rating:5, col:"pink", dob:"2 September 1995"},
        {name:"Billy Bob", progress:"zero", gender:"male", rating:1, col:"red", dob:"2 September 1991"},
        {name:"Ahir Brijesh", progress:"one", gender:"female", rating:2, col:"blue", dob:"2 September 1992"},
        {name:"Ahir Ushaben", progress:"two", gender:"male", rating:3, col:"white", dob:"2 September 1993"},
        {name:"Ahir Hirenkumar", progress:"three", gender:"female", rating:4, col:"green", dob:"2 September 1994"},
        {name:"Ahir Binal", progress:"four", gender:"female", rating:5, col:"pink", dob:"2 September 1995"},
        {name:"Billy Bob", progress:"zero", gender:"male", rating:1, col:"red", dob:"2 September 1991"},
        {name:"Ahir Brijesh", progress:"one", gender:"female", rating:2, col:"blue", dob:"2 September 1992"},
        {name:"Ahir Ushaben", progress:"two", gender:"male", rating:3, col:"white", dob:"2 September 1993"},
        {name:"Ahir Hirenkumar", progress:"three", gender:"female", rating:4, col:"green", dob:"2 September 1994"},
        {name:"Ahir Binal", progress:"four", gender:"female", rating:5, col:"pink", dob:"2 September 1995"},
        {name:"Billy Bob", progress:"zero", gender:"male", rating:1, col:"red", dob:"2 September 1991"},
        {name:"Ahir Brijesh", progress:"one", gender:"female", rating:2, col:"blue", dob:"2 September 1992"},
        {name:"Ahir Ushaben", progress:"two", gender:"male", rating:3, col:"white", dob:"2 September 1993"},
        {name:"Ahir Hirenkumar", progress:"three", gender:"female", rating:4, col:"green", dob:"2 September 1994"},
        {name:"Ahir Binal", progress:"four", gender:"female", rating:5, col:"pink", dob:"2 September 1995"},
        {name:"Billy Bob", progress:"zero", gender:"male", rating:1, col:"red", dob:"2 September 1991"},
        {name:"Ahir Brijesh", progress:"one", gender:"female", rating:2, col:"blue", dob:"2 September 1992"},
        {name:"Ahir Ushaben", progress:"two", gender:"male", rating:3, col:"white", dob:"2 September 1993"},
        {name:"Ahir Hirenkumar", progress:"three", gender:"female", rating:4, col:"green", dob:"2 September 1994"},
        {name:"Ahir Binal", progress:"four", gender:"female", rating:5, col:"pink", dob:"2 September 1995"},
        
    ];

    function matchAny(data, filterParams) {
        //data - the data for the row being filtered
        //filterParams - params object passed to the filter
        //RegExp - modifier "i" - case insensitve

        var match = false;
        const regex = RegExp(filterParams.value, 'i');
        console.log(data);
        for (var key in data) {
            if (regex.test(data[key]) == true) {
                match = true;
            }
        }
        return match;
    }

    $("#tabulator-controls input[name=name]").on("keyup", function(){
        table.setFilter(matchAny, { value: $(this).val() });
            if ( $(this).val() == " "){
              table.clearFilter()
            }
    });
    $("#tabulator-controls  button[name=download]").on("click", function(){
        table.download("csv", "Tabulator Example-Download.csv");
    });
    $("#tabulator-controls  #user_entries").on("change", function(){
        table.setPageSize($(this).val());
    });
    
    table.setData(tableData);
</script>
</body>
</html>