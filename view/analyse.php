<?php require_once 'shared/header.php' ?>

<?php
$categoryA = "P";
if (isset($_SESSION['categoryA'])) :
$categoryA = $_SESSION['categoryA'];
endif;
?>
<div class="content">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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
        <div class="row">
            <div class="col text-center" style="margin-top: 25px; margin-bottom: 25px;">

                <select class="custom-select"  style="height:30px;"id="selDepartment" name="selDepartment" onchange="getCategory();">
                    <?php if ($categoryA=='P'):?>
                    <option value="P" selected>Pédagogique</option>
                    <option value="E">Etc</option>
                    <option value="A">Administratif</option>
                    <?php elseif ($categoryA=='E') :?>
                    <option value="P" >Pédagogique</option>
                    <option value="E" selected>Etc</option>
                    <option value="A">Administratif</option>
                    <?php elseif ($categoryA=='A') :?>
                    <option value="P" >Pédagogique</option>
                    <option value="E" >Etc</option>
                    <option value="A" selected>Administratif</option>
                    <?php endif ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col" id="divGraph">
                <canvas id="graph" >
                </canvas>
                <!-- BAR GRAPH GOES HERE -->
            </div>
        </div>
        <div id="piechart" style="width: 900px; height: 500px;"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>


    <script>
        <?php $bar_graph = $this->post;?>
        var ctx = document.getElementById('graph'); // node
        var ctx = document.getElementById('graph').getContext('2d'); // 2d context
        var ctx = $('#graph'); // jQuery instance
        var ctx = 'graph'; // element id

        // on crée an AJAX post et l'envoie à dossier queries.php, en plus, on envoie le data à queries php
        $(document).ready(function(){
            $.ajax({
                url: "../?p=blogController&a=analyse",

                type: "POST",
                data: {
                    category: "Pédagogique"
                },
                 //output le cavans si on a réussi
                success: function (<?php   $bar_graph?>) {
                    $("#divGraph").html(<?php  $bar_graph?>);
                    // settings : un attribute de donnes, on ajoute au graph, on ajoute un chart au canvas graph
                    $("#graph").chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            <?php  echo $this->post ;?>
                            },
                        options: {"legend":
                                    {"display": true}}
                                }) ;
                }
            });
        });

    </script>
    <script language = "javascript">
        function getCategory(){
            var id = document.getElementById("selDepartment");
            var value = id.options[id.selectedIndex].value;
            location.href="../?p=blogController&a=analyse&category="+value;
        }
    </script>
    </body>
</div>

</html>
<?php require_once 'shared/footer.php' ?>