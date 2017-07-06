    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="libraries/parsley/parsley.min.js"></script>
    <script src="libraries/parsley/i18n/fr.js"></script>
    <script>
  		$('#form').parsley();
	</script>
    <script src="assets/js/script.js"></script>

    <script src="assets/js/zabuto_calendar.min.js"></script>
    <!-- initialize the calendar on ready -->
    <script type="application/javascript">
        $(document).ready(function () {
            $("#my-calendar").zabuto_calendar(
            {
              ajax: {
                  url: "<?= SITE_URL ?>api&id=<?= $_GET['id'] ?>",
                  modal: true
              },
              legend: [
                {type: "text", label: "Clic pour le détail", badge: "00"},
                {type: "spacer"},          
                {type: "text", label: "Pas bien"},
                {type: "list", list: ["colorFormNotGood","colorFormMiddle","colorFormGood"]},
                {type: "text", label: "Bien"}                
              ],          
              cell_border: true,
              today: true,
              show_days: true,
              language: "fr"
            });
        });
    </script>

    <!-- chart.js script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

    <!-- 7 days chart script -->
    <script>
    var ctx = document.getElementById("myChart7");
    var myChart7 = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [ "Bien","Moyen","Mauvais","Pas de donnée"],
            datasets: [{

            labels: [ "Bien","Moyen","Mauvais","Pas de donnée"],
                data: [<?= $FormGood ?>, <?= $FormMiddle ?>, <?= $FormNotGood ?>, <?= 7 - $compteur ?>],
                backgroundColor: [
                    '#23c336',
                    '#e78910',
                    '#e70909',
                    '#E5E5E5'
                ]
            }]
        }
    });
    </script>

    <!-- 30 days chart script -->
    <script>
    var ctx = document.getElementById("myChart30");
    var myChart30 = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [ "Bien","Moyen","Mauvais","Pas de donnée"],
            datasets: [{

            labels: [ "Bien","Moyen","Mauvais","Pas de donnée"],
                data: [<?= $FormGood30 ?>, <?= $FormMiddle30 ?>, <?= $FormNotGood30 ?>, <?= 30 - $compteur30 ?>],
                backgroundColor: [
                    '#23c336',
                    '#e78910',
                    '#e70909',
                    '#E5E5E5'
                ]
            }]
        }
    });
    </script>

  </body>
</html>
