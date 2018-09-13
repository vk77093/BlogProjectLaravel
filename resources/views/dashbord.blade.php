@extends('layouts.admin')
@section('content')
<h4>Welcome to the admin dashbord </h4>
<h5>Work in Progress and we will come soon</h5>

<div id="columnchart_values"></div>
@endsection
@section('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Users", {{$userCount}}, "#b87333"],
        ["Posts", {{$postCount}}, "silver"],
        ["Categories", {{$catCount}}, "gold"],
        ["Comments", {{$cmtCount}}, "color: #e5e4e2"],
        ["ApproveCmt", {{$approvedCmt}}, "red"],
        ["UnApproveCmt", {{$unapproveCmt}}, "blue"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "",
        width: 900,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>

@endsection
