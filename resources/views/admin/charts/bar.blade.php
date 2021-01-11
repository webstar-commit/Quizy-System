<canvas id="myChart" width="400" height="400"></canvas>
<script>
    $(function () {


        var labelArray = [];
        var scoresval = [];
        var data ={!! json_encode($quizzes) !!};
        var scores ={!! json_encode($studentScore) !!};

        console.log(scores[0].total);
        data.forEach(function(element){
            labelArray.push(element.title);
        });

        scores.forEach(function(element){
            scoresval.push(element.total);
        });

        console.log(labelArray);

        console.log({!! json_encode($quizzes) !!});

        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labelArray,
                datasets: [{
                    label: '# of students',
                    data: scoresval,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 3
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    });
</script>