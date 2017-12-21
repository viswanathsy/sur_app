<!DOCTYPE html>

<html>
<head>
    <title>Attempt Survey</title>
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.js"></script>
</head>


<script type="text/javascript">
$(document).ready(function(){
    $.ajax({
        url: "charts_data.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var player = [];
            var score = [];

            for(var i in data) {
                player.push("Player " + data[i].playerid);
                score.push(data[i].score);
            }

            var chartdata = {
                labels: player,
                datasets : [
                    {
                        label: 'Player Score',
                        backgroundColor: 'rgba(200, 200, 200, 0.75)',
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: score
                    }
                ]
            };

            var ctx = $("#mycanvas");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
});
</script>
</html>