<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Báo cáo và thống kê</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
</head>

<style>
 body 
 {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin-top: 200px;
 }

 .chart-container
 {
    font-weight: bold;
 }

 h2
 {
    font-family: 'Lalezar';
 }

</style>

<body>
    <div class="chart-container">
        <h2>Thống kê đơn hàng dịch vụ</h2>
        <canvas id="line1" style = "width: 700px"></canvas>
        <h2>Thống kê tổng đơn hàng</h2>
        <canvas id="line2" style = "width: 700px"></canvas>
    </div>
    
</body>

<script>
    $(document).ready(function(){
        showGraph1();
        showGraph2();
    });

    function showGraph1() {
        $.post("../admin/statistic/xuly_thongke.php",
            function (data)
            {
                console.log(data);
                var Order_date = [];
                var Total = [];

                for (var i in data)
                {
                    var formattedDate = moment(data[i].order_day).format('DD/MM/YYYY');
                    Order_date.push(formattedDate);
                    Total.push(data[i].total_quantity);
                }

                var options = {
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Ngày Đặt Hàng',
                                fontSize: 20,
                                fontColor: 'rgba(252, 47, 19, 1)', 
                                fontStyle: 'bold',
                            },
                            
                            gridLines: {
                                display: false
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                stepSize: 1,
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Tổng đơn hàng dịch vụ',
                                fontSize: 20,
                                fontColor: 'rgba(252, 47, 19, 1)', 
                                fontStyle: 'bold'
                            },
                            
                            gridLines: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            }
                        }]
                    }
                };

                var myChart = {
                    labels: Order_date,
                    datasets: [
                        {
                            label: 'Tổng đơn hàng',
                            backgroundColor: 'rgba(255, 165, 0, 0.2)', // Màu cam với độ trong suốt
                            borderColor: '#FFA500', 
                            borderWidth: 2,
                            data: Total
                        }
                    ]
                };

                var bar = $("#line1");
                var barGraph = new Chart(bar, {
                    type: 'line',
                    data: myChart,
                    options: options
                });
            }
        );
    }

    function showGraph2() {
        $.post("../admin/statistic/test.php",
            function (data)
            {
                console.log(data);
                var Order_date = [];
                var Total = [];

                for (var i in data)
                {
                    var formattedDate = moment(data[i].order_day).format('DD/MM/YYYY');
                    Order_date.push(formattedDate);
                    Total.push(data[i].total_quantity_service);
                }

                var options = {
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Ngày Đặt Hàng',
                                fontSize: 20,
                                fontColor: 'rgba(252, 47, 19, 1)', 
                                fontStyle: 'bold',
                            },
                            
                            gridLines: {
                                display: false
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                stepSize: 1,
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Tổng đơn hàng dịch vụ',
                                fontSize: 20,
                                fontColor: 'rgba(252, 47, 19, 1)', 
                                fontStyle: 'bold'
                            },
                            
                            gridLines: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            }
                        }]
                    }
                };

                var myChart = {
                    labels: Order_date,
                    datasets: [
                        {
                            label: 'Tổng đơn hàng',
                            backgroundColor: 'rgba(255, 165, 0, 0.2)', // Màu cam với độ trong suốt
                            borderColor: '#FFA500', 
                            borderWidth: 2,
                            data: Total
                        }
                    ]
                };

                var bar = $("#line2");
                var barGraph = new Chart(bar, {
                    type: 'line',
                    data: myChart,
                    options: options
                });
            }
        );
        
    }
</script>

</html>