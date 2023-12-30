<script>
    window.onload = function () {
    
    var chart = new CanvasJS.Chart("chartContainer1", {
        animationEnabled: true,
        axisX: {
            valueFormatString: "DD MMM,YY"
        },
        axisY: {
            title: "Temperature (in °C)",
            suffix: " °C"
        },
        legend:{
            cursor: "pointer",
            fontSize: 16,
            itemclick: toggleDataSeries
        },
        toolTip:{
            shared: true
        },
        data: [{
            name: "Myrtle Beach",
            type: "spline",
            yValueFormatString: "#0.## °C",
            showInLegend: true,
            dataPoints: [
                { x: new Date(2017,6,24), y: 31 },
                { x: new Date(2017,6,25), y: 31 },
                { x: new Date(2017,6,26), y: 29 },
                { x: new Date(2017,6,27), y: 29 },
                { x: new Date(2017,6,28), y: 31 },
                { x: new Date(2017,6,29), y: 30 },
                { x: new Date(2017,6,30), y: 29 }
            ]
        },
        {
            name: "Martha Vineyard",
            type: "spline",
            yValueFormatString: "#0.## °C",
            showInLegend: true,
            dataPoints: [
                { x: new Date(2017,6,24), y: 20 },
                { x: new Date(2017,6,25), y: 20 },
                { x: new Date(2017,6,26), y: 25 },
                { x: new Date(2017,6,27), y: 25 },
                { x: new Date(2017,6,28), y: 25 },
                { x: new Date(2017,6,29), y: 25 },
                { x: new Date(2017,6,30), y: 25 }
            ]
        },
        {
            name: "Nantucket",
            type: "spline",
            yValueFormatString: "#0.## °C",
            showInLegend: true,
            dataPoints: [
                { x: new Date(2017,6,24), y: 22 },
                { x: new Date(2017,6,25), y: 19 },
                { x: new Date(2017,6,26), y: 23 },
                { x: new Date(2017,6,27), y: 24 },
                { x: new Date(2017,6,28), y: 24 },
                { x: new Date(2017,6,29), y: 23 },
                { x: new Date(2017,6,30), y: 23 }
            ]
        }]
    });
    chart.render();
    
    function toggleDataSeries(e){
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else{
            e.dataSeries.visible = true;
        }
        chart.render();
    }
    
    
    var chart = new CanvasJS.Chart("chartContainer2", {
        exportEnabled: true,
        animationEnabled: true,
        legend:{
            cursor: "pointer",
            itemclick: explodePie
        },
        data: [{
            type: "pie",
            showInLegend: true,
            toolTipContent: "{name}: <strong>{y}%</strong>",
            indexLabel: "{name} - {y}%",
            dataPoints: [
                { y: 26, name: "School Aid", exploded: true },
                { y: 20, name: "Medical Aid" },
                { y: 5, name: "Debt/Capital" },
                { y: 3, name: "Elected Officials" },
                { y: 7, name: "University" },
                { y: 17, name: "Executive" },
                { y: 22, name: "Other Local Assistance"}
            ]
        }]
    });
    chart.render();
    
    var chart = new CanvasJS.Chart("chartContainer3", {
        animationEnabled: true,
        axisX: {
            interval: 1
        },
        axisY: {
            title: "Expenses in Billion Dollars",
            includeZero: true,
            scaleBreaks: {
                type: "wavy",
                customBreaks: [{
                    startValue: 80,
                    endValue: 210
                    },
                    {
                        startValue: 230,
                        endValue: 600
                    }
            ]}
        },
        data: [{
            type: "bar",
            toolTipContent: "<img src=\"https://canvasjs.com/wp-content/uploads/images/gallery/javascript-column-bar-charts/\"{url}\"\" style=\"width:40px; height:20px;\"> <b>{label}</b><br>Budget: ${y}bn<br>{gdp}% of GDP",
            dataPoints: [
                { label: "Israel", y: 17.8, gdp: 5.8, url: "israel.png" },
                { label: "United Arab Emirates", y: 22.8, gdp: 5.7, url: "uae.png" },
                { label: "Brazil", y: 22.8, gdp: 1.3, url: "brazil.png"},
                { label: "Australia", y: 24.3, gdp: 2.0, url: "australia.png" },
                { label: "South Korea", y: 36.8, gdp: 2.7, url: "skorea.png" },
                { label: "Germany", y: 41.1, gdp: 1.2, url: "germany.png" },
                { label: "Japan", y: 46.1, gdp: 1.0, url: "japan.png" },
                { label: "United Kingdom", y: 48.3, gdp: 1.9, url: "uk.png" },
                { label: "India", y: 55.9, gdp: 2.5, url: "india.png" },
                { label: "Russia", y: 69.2, gdp: 5.3, url: "russia.png" },
                { label: "China", y: 215.7, gdp: 1.9, url: "china.png" },
                { label: "United States", y: 611.2, gdp: 3.3, url: "us.png" }
            ]
        }]
    });
    chart.render();
    
    
    }
    
    function explodePie (e) {
        if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
            e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
        } else {
            e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
        }
        e.chart.render();
    
    }
    
    
    </script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>