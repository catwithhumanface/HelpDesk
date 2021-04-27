
<div class="content">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.5.0/materia/bootstrap.min.css">
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);


        function drawChart() {

            var labelpie=['Category','Nombre']

            var data = google.visualization.arrayToDataTable(
                    [
                        labelpie,
                        ['Pédagogique',1],
                        ['Administratif',3],
                        ['Etc',2]
                    ]);

            var options = {
                title: 'La pourcentage sur les catégories de tickets'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col text-center" style="margin-top: 25px; margin-bottom: 25px;">
            <select class="custom-select" id="selDepartment">
                <option value="Pédagogique" selected="">Pédagogique</option>
                <option value="Etc">Etc</option>
                <option value="Administratif">Administratif</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col" id="divGraph">
            <!-- BAR GRAPH GOES HERE -->
        </div>
    </div>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>


<script>``
// on crée an AJAX post et l'envoie à dossier queries.php, en plus, on envoie le data à queries php
$(document).ready(function(){
    $.ajax({
        url: '@Url.Action("analyse")',
        type: "post",
        data: {
            category: "Pédagogique"
        },
        // output le cavans si on a réussi
        success: function (bar_graph) {


            $("#divGraph").html(bar_graph);
            // settings : un attribute de donnes, on ajoute au graph, on ajoute un chart au canvas graph
            $("#graph").chart = new Chart($("#graph"), $("#graph").data("settings"));

        }
    });

        // chaque fois qu'on change le valeur , on excecute cette function

        $("#selDepartment").change(function(){
            $.ajax({
                url: '@Url.Action("analyse")',
                type: "post",
                data: {
                    category: "Pédagogique"
                },
                success: function (bar_graph) {
                    $("#divGraph").html(bar_graph);
                    $("#graph").chart = new Chart($("#graph"), $("#graph").data("settings"));
                }
            });
        });
    });

</script>
</body>
</div>

</html>