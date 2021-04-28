<?php require_once 'shared/header.php' ?>

<?php
$categoryA = "Pédagogique";
if (isset($_SESSION['categoryA'])) :
    $categoryA = $_SESSION['categoryA'];
endif;
?>
    <div class="content">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">



        </head>

        <body>

        <div class="container">
            <div class="row" style="padding-bottom:30px;">
                <div class="col-md-3 copy"style="width:500px; background-color:skyblue;  margin-right:200px;">
                    <h3><a href="<?=ROOT_URL?>?p=blogController&amp;a=analyse">Nombre ticket par categories et dates</a></h3>
                </div>
                <div class="col-md-3 copy"style="width:430px;  background-color:skyblue;"  >
                    <h3><a href="<?=ROOT_URL?>?p=blogController&amp;a=analyseP">Analyse des pourcentages des catégories</a></h3>
                </div>
            </div>


            <div id="piechart" style="padding-left : 100px; width: 900px; height: 500px;"></div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script>
                var my_2d = Array;
                my_2d = <?php echo json_encode($this->chiffre) ; ?>


                google.charts.load('current', {'packages':['corechart']});
                // Draw the pie chart when Charts is loaded.
                google.charts.setOnLoadCallback(draw_my_chart);
                // Callback that draws the pie chart
                function draw_my_chart() {
                    // Create the data table .
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Category');
                    data.addColumn('number', 'Nombre');
                    data.addRow(["Administratif", parseInt(my_2d[0].category)]);
                    data.addRow(["Etc", parseInt(my_2d[1].category)]);
                    data.addRow(["Pédagogique", parseInt(my_2d[2].category)]);

                    var options = {title:'Analyse des pourcentages des tickets par Category',
                        width:900,
                        height:500};

                    // Instantiate and draw the chart
                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                    chart.draw(data, options);
                }

</script>

        </body>
    </div>

    </html>
<?php require_once 'shared/footer.php' ?>