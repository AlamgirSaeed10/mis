@extends('template.main_tmp')
@section('title', 'Dashboard') 
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="card mini-stats-wid">
                        <div class="card-body border-info border-top border-3 rounded-top">
                            <div class="d-flex flex-wrap">
                                <div class="me-3">
                                    <p class="text-muted mb-2 text-uppercase"><strong>Total Sale</strong></p>
                                    <h5 class="mb-0">120</h5>
                                </div>
                                
                                <div class="avatar-sm ms-auto">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                        <i class="mdi mdi-chart-bell-curve-cumulative"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="card mini-stats-wid">
                        <div class="card-body border-success border-top border-3 rounded-top">
                            <div class="d-flex flex-wrap">
                                <div class="me-3">
                                    <p class="text-muted mb-2 text-uppercase"><strong>Total Purchase</strong></p>
                                    <h5 class="mb-0">120</h5>
                                </div>
                                
                                <div class="avatar-sm ms-auto">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                        <i class="mdi mdi-shopping-outline"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="card mini-stats-wid">
                        <div class="card-body border-danger border-top border-3 rounded-top">
                            <div class="d-flex flex-wrap">
                                <div class="me-3">
                                    <p class="text-muted mb-2 text-uppercase"><strong>Cash in Hand</strong></p>
                                    <h5 class="mb-0">120</h5>
                                </div>
                                
                                <div class="avatar-sm ms-auto">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                        <i class="mdi mdi-cash-usd-outline"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="card mini-stats-wid">
                        <div class="card-body border-warning border-top border-3 rounded-top">
                            <div class="d-flex flex-wrap">
                                <div class="me-3">
                                    <p class="text-muted mb-2 text-uppercase"><strong>Cash in Bank</strong></p>
                                    <h5 class="mb-0">120</h5>
                                </div>
                                
                                <div class="avatar-sm ms-auto">
                                    <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                        <i class="mdi mdi-bank-outline"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12 col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <figure class="highcharts-figure">
                                <div id="monthly-expense"></div>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <figure class="highcharts-figure">
                                <div id="pnl-chart"></div>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <figure class="highcharts-figure">
                                <div id="total-revenue-chart"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <figure class="highchart-figure">
                                <div id="debitor-customer"></div>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <figure class="highchart-figure">
                                <div id="creditor-customer"></div>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <figure class="highchart-figure">
                                <div id="cash-flow"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/cylinder.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
// ============================[ Monthly Expense ]====================

Highcharts.chart('monthly-expense', {
chart: {
type: 'column',

},
title: {
text: 'Monthly Expense'
},
plotOptions: {
series:{
    colorByPoint:true
}

},
series: [{
data: [
<?php

for ($i= 0; $i < 10; $i++) {
echo   rand(10,100).",";

}
?>
],
name: 'Cylinders',
showInLegend: false
}],
credits: {
enabled: false
},exporting: { enabled: false }
});
// ============================[ Profit and Loss Chart ]====================
Highcharts.chart('pnl-chart', {
chart: {
type: 'line',

},
title: {
text: 'Profit & Loss'
},
plotOptions: {
series:{
colorByPoint:true
}

},
series: [{
data: [
<?php

for ($i= 0; $i < 10; $i++) {
echo   rand(10,100).",";

}
?>
],
name: 'Cylinders',
showInLegend: false
}],
credits: {
enabled: false
},exporting: { enabled: false }
});
// ============================[ Revenue Chart ]====================
Highcharts.chart('total-revenue-chart', {
    chart: {
        type: 'line',
        },
    title: {
        text: 'Total Revenue'
    },
    plotOptions: {
        series: {
            colorByPoint: true
        }
    },
    series: [{
        data: [<?php

for ($i= 0; $i < 20; $i++) {
echo   rand(1,200).",";

}
?>
],
        name: 'Cylinders',
        showInLegend: false
    }],
    credits:{
    enabled: false},
    exporting: { enabled: false }
});

// ================================[ Deditor Customer ]================================================


Highcharts.chart('debitor-customer', {
    chart: {
        type: 'line',
        },
    title: {
        text: 'Debitor Customer'
    },
    plotOptions: {
        series: {
            colorByPoint: true
        }
    },
    series: [{
        data: [<?php

for ($i= 0; $i < 20; $i++) {
echo   rand(1,200).",";

}
?>
],
        name: 'Cylinders',
        showInLegend: false
    }],
    credits:{
    enabled: false},
    exporting: { enabled: false }
});
// ================================[ Creditor Customer ]================================================
Highcharts.chart('creditor-customer', {
    chart: {
        type: 'line',
        },
    title: {
        text: 'Creditor Customer'
    },
    plotOptions: {
        series: {
            colorByPoint: true
        }
    },
    series: [{
        data: [<?php

for ($i= 0; $i < 20; $i++) {
echo   rand(1,200).",";

}
?>
],
        name: 'Cylinders',
        showInLegend: false
    }],
    credits:{
    enabled: false},
    exporting: { enabled: false }
});
// ================================[ Cash Flow ]================================================

Highcharts.chart('cash-flow', {
    chart: {
        type: 'line',
        },
    title: {
        text: 'Cash Flow'
    },
    plotOptions: {
        series: {
            colorByPoint: true
        }
    },
    series: [{
        data: [<?php

for ($i= 0; $i < 20; $i++) {
echo   rand(1,200).",";

}
?>
],
        name: 'Cylinders',
        showInLegend: false
    }],
    credits:{
    enabled: false},
    exporting: { enabled: false }
});
// ================================[ Cash Summar]================================================
Highcharts.chart('cash-summary', {
    chart: {
        type: 'line',
        },
    title: {
        text: 'Revenue'
    },
    plotOptions: {
        series: {
            colorByPoint: true
        }
    },
    series: [{
        data: [<?php

for ($i= 0; $i < 20; $i++) {
echo   rand(1,200).",";

}
?>
],
        name: 'Cylinders',
        showInLegend: false
    }],
    credits:{
    enabled: false},
    exporting: { enabled: false }
});
</script>
@endsection