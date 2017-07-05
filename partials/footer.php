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
              cell_border: true,
              today: true,
              show_days: true,
              language: "fr"
            });
        });
    </script>

  </body>
</html>
