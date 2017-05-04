<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <link rel="stylesheet" media="screen" href="/thinkphp/Public/css/teenagerGrow/unvStyle.css">
    <meta charset="UTF-8">
    <title>女孩成长身高数据图</title>
</head>
<body>

<!--调用echarts进行图表的创建显示-->
<div id="girl_height_chart" style="width: 100%; height: 100%;"> </div>
<script src="/thinkphp/Public/js/jquery-2.1.1.min.js"></script>
<script src="/thinkphp/Public/js/echarts.common.min.js"></script>

<script>
    $(function(){
        var url="<?php echo U('HeightAndWeight/getHeightAndWeightData');?>";
        $.post(url,{"parm":"childHeight"},function(data) {
            var length = data.length;//总数据长度
            //新建一个echars
            var girl_height_chart =echarts.init(document.getElementById('girl_height_chart'));

            //配置图表
            var option = {
                title: {
                    text: '中国儿童身高百分位曲线图（女）',
                    textStyle: {
                        fontStyle: 'italic',
                        color:'#ff7f50'
                    },
                    top:'20',
                    left:'100'
                },
                tooltip: {
                    trigger: 'axis'
                },
                legend: {
                    data: ['极度矮小（-3SD）', '矮小（-2SD）', '正常偏矮（-1SD）', '正常身高', '正常偏高（+1SD）','高大（+2SD）','超高（+3SD','对应儿童']
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: true
                },
                toolbox: {
                    feature : {
                        mark : { show: true},
                        dataView : {show: true},
                        magicType : {show: true, type: ['line', 'bar']},
                        restore : {show: true},
                        saveAsImage : {show: true}
                    }
                },
                calculable : true,
                dataZoom:[{
                    startValue:1},
                    {show:true},
                    {type:'inside'

                    }],
                xAxis: {
                    type: 'category',
                    min:'2.00',
                    max:'18.00',
                    boundaryGap: false,
                    name:'年龄',
                    axisLabel: {
                        formatter: '{value}岁'
                    },
                    data: ['2.00', '2.25', '2.50', '2.75', '3.00', '3.25', '3.50','3.75','4.00', '4.25', '4.50', '4.75', '5.00', '5.25', '5.50','5.75','6.00', '6.25', '6.50', '6.75', '7.00', '7.25', '7.50','7.75','8.00', '8.25', '8.50', '8.75', '9.00', '9.25', '9.50','9.75','10.00', '10.25', '10.50', '10.75', '11.00', '11.25', '11.50','11.75','12.00', '12.25', '12.50', '12.75', '13.00', '13.25', '13.50','13.75','14.00', '14.25', '14.50', '14.75', '15.00', '15.25', '15.50','15.75','16.00', '16.25', '16.50', '16.75', '17.00', '17.25', '17.50','17.75','18.00']
                },
                yAxis: {
                    type: 'value',
                    max:'210',
                    min:'60',
                    name:'身高',
                    axisLabel: {
                        formatter: '{value}cm'
                    }



                },
                series: [
                    {
                        name: '极度矮小（-3SD）',
                        type: 'line',
                        data: [80.2,82.3,84.5,86.7,88.8,90.4,92.3,93.8,95.7,97.2,98.8,100.8,102.8,104.1,105.6,107.1,108.3,109.5,110.8,112.1,113.3,114.6,116.0,117.2,118.4,119.7,121.0,122.2,123.4,124.6,125.8,127.1,128.4,130.0,131.5,132.9,134.1,135.6,137.3,138.8,140.4,141.7,143.0,144.2,145.1,146.1,146.8,147.3,147.8,148.3,148.9,149.4,149.7,149.7,149.8,149.9,150.0,150.0,150.1,150.2,150.2,150.2,150.2,150.3,150.3]
                    },
                    {
                        name: '矮小（-2SD）',
                        type: 'line',
                        data: [82.1,84.0,86.4,88.6,91.8,93.4,95.1,96.8,98.5,100.2,101.7,103.2,104.7,106.2,107.7,109.2,110.7,111.9,113.1,114.4,116.0,117.2,118.5,120.2,121.8,123.1,124.4,125.5,126.5,127.7,128.9,130.3,131.7,133.3,135.0,136.7,138.2,139.6,141.1,142.6,144.3,145.4,146.5,147.5,148.6,149.1,150.0,150.7,151.3,151.7,152.2,152.5,152.8,152.9,153.1,153.2,153.3,153.3,153.4,153.5,153.6,153.6,153.7,153.8,153.8]
                    },
                    {
                        name: '正常偏矮（-1SD）',
                        type: 'line',
                        data: [84.2,86.4,88.6,90.7,93.4,95.0,96.7,98.6,100.7,102.2,103.7,106.0,107.3,108.6,110.2,111.8,113.5,114.9,116.2,117.7,119.1,120.4,121.8,123.4,125.0,126.3,127.8,129.0,130.2,131.5,132.8,134.2,135.5,137.1,138.5,140.0,142.2,143.6,145.2,146.5,148.1,149.1,150.2,151.3,152.3,153.0,153.6,154.4,155.0,155.3,155.5,155.7,155.9,156.0,156.1,156.2,156.3,156.3,156.4,156.5,156.6,156.6,156.7,156.7,156.8,]
                    },
                    {
                        name: '正常身高',
                        type: 'line',
                        data: [86.6,88.5,91.7,93.4,95.7,97.0,98.8,100.4,102.8,104.6,106.4,108.5,110.4,111.9,113.4,114.9,116.5,118.0,119.6,121.0,122.5,124.2,125.9,127.1,128.2,129.8,131.2,132.6,134.2,135.5,136.7,138.4,140.0,141.6,143.2,145.2,146.4,147.8,149.3,150.7,152.2,153.4,154.6,155.4,156.3,156.8,157.4,158.4,158.5,158.9,159.3,159.7,160.0,160.0,160.1,160.2,160.3,160.4,160.4,160.4,160.5,160.5,160.6,160.6,160.7]
                    },
                    {
                        name: '正常偏高（+1SD）',
                        type: 'line',
                        data: [89.0,91.7,94.1,96.6,98.2,100.5,102.7,103.8,105.5,107.2,109.1,111.1,113.0,114.8,116.3,118.3,120.0,122.2,123.0,124.1,125.8,127.5,128.8,130.4,132.2,134.0,135.4,136.6,138.0,139.5,141.2,142.7,144.4,146.1,147.8,149.6,151.2,152.7,154.4,155.5,156.7,157.9,158.9,159.6,160.2,160.7,161.5,162.0,162.5,162.9,163.2,163.5,163.7,163.8,163.8,163.9,164.0,164.0,164.0,164.0,164.1,164.1,164.2,164.2,164.3]
                    },
                    {
                        name: '高大（+2SD）',
                        type: 'line',
                        data: [91.0,93.3,95.7,98.1,100.5,102.5,104.4,106.3,108.1,110.3,112.4,114.6,116.2,117.8,119.3,122.0,123.3,124.7,126.1,127.5,129.0,130.6,132.2,133.9,135.5,136.8,138.3,140.0,141.7,143.4,145.0,146.5,148.2,150.0,152.3,153.7,155.2,156.6,158.2,159.4,160.8,161.6,162.4,163.2,164.0,164.6,165.1,165.6,166.2,166.4,166.6,166.7,166.8,166.8,166.8,166.9,167.0,167.0,167.0,167.0,167.1,167.1,167.1,167.1,167.2]
                    },
                    {
                        name: '超高（+3SD）',
                        type: 'line',
                        data: [93.5,96.2,98.7,100.4,103.0,104.8,106.4,108.5,110.6,112.5,114.6,116.5,118.4,120.4,121.9,124.0,125.5,127.2,129.0,130.4,132.0,133.4,135.0,136.7,138.5,140.0,141.5,143.3,145.0,146.5,148.0,149.4,151.7,153.3,155.1,157.2,159.0,160.8,162.0,163.1,164.2,165.1,166.0,166.9,167.7,168.0,168.4,168.7,169.0,169.4,169.8,170.0,170.2,170.2,170.3,170.3,170.4,170.4,170.5,170.5,170.6,170.6,170.7,170.7,170.7]
                    },
                    {
                        symbolSize:10,
                        symbol:"circle",
                        name: '对应儿童',
                        type: 'line',
                        itemStyle: {
                            normal: {
                                color: "green"
                            }
                        },
                        lineStyle: {
                            normal:{
                                width: 6,
                                color: '#8B7D6B'
                            }
                        },
                        data:[data[0],data[1],data[2],data[3],data[4],data[5],data[6],data[7],data[8],data[9],data[10],data[11],data[12],data[13],data[14],data[15],data[16],data[17],data[18],data[19],data[20],data[21],data[22],data[23],data[24],data[25],data[26],data[27],data[28],data[29],data[30],data[31],data[32],data[33],data[34],data[35],data[36],data[37],data[38],data[39],
                            data[40],data[41],data[42],data[43],data[44],data[45],data[46],data[47],data[48],data[49],data[50],data[51],data[52],data[53],data[54],data[55],data[56],data[57],data[58],data[59],data[60],data[61],data[62],data[63],data[64]]

                    }
                ]
            };
            //使用刚指定的配置项和数据显示图表
            girl_height_chart.setOption(option);
        })
    })
</script>


</body>
</html>