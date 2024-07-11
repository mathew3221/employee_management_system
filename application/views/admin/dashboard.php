<div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
                <h6 class="op-7 mb-2">Admin Dashboard</h6>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-secondary card-round">
                  <div class="card-body">
                    <a href="<?php echo base_url('admin/manage_employees'); ?>">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-secondary bubble-shadow-small"
                        >
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Employees</p>
                          <h4 class="card-title"><?php echo $num_employees; ?></h4>
                        </div>
                      </div>
                    </div>
                  </a>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-primary card-round">
                  <div class="card-body">
                    <a href="<?php echo base_url('admin/manage_department'); ?>">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-primary bubble-shadow-small"
                        >
                          <i class="fas fa-building"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Departments</p>
                          <h4 class="card-title"><?php echo $num_departments; ?></h4>
                        </div>
                      </div>
                    </div>
                  </a>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-info card-round">
                  <div class="card-body">
                    <a href="<?php echo base_url('admin/manage_leavetype'); ?>">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-info bubble-shadow-small"
                        >
                          <i class="fas fa-clipboard-list"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Leave Type</p>
                          <h4 class="card-title"><?php echo $num_leave_types; ?></h4>
                        </div>
                      </div>
                    </div>
                  </a>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <a href="<?php echo base_url('admin/manage_salary'); ?>">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-info bubble-shadow-small"
                        >
                          <i class="icon-wallet text-success"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Salary</p>
                          <h4 class="card-title"><?php echo '&#8377 ' .format_number($total_salary); ?></h4>
                        </div>
                      </div>
                    </div>
                  </a>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <a href="<?php echo base_url('admin/leave_applications'); ?>">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-primary bubble-shadow-small"
                        >
                          <i class="fas icon-layers"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Leave Request</p>
                          <h4 class="card-title"><?php echo $num_leave_requests; ?></h4>
                        </div>
                      </div>
                    </div>
                  </a>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <a href="<?php echo base_url('admin/leave_applications?status=0'); ?>">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-secondary bubble-shadow-small"
                        >
                          <i class="icon-close text-danger"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Pending Leave</p>
                          <h4 class="card-title"><?php echo $num_pending_leave; ?></h4>
                        </div>
                      </div>
                    </div>
                  </a>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <a href="<?php echo base_url('admin/leave_applications?status=1'); ?>">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-success bubble-shadow-small"
                        >
                          <i class="far fa-check-circle"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Approved Leave</p>
                          <h4 class="card-title"><?php echo $num_approved_leave; ?></h4>
                        </div>
                      </div>
                    </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row">
                      <div class="card-title">User Statistics</div>
                      <!-- <div class="card-tools">
                        <a
                          href="#"
                          class="btn btn-label-success btn-round btn-sm me-2"
                        >
                          <span class="btn-label">
                            <i class="fa fa-pencil"></i>
                          </span>
                          Export
                        </a>
                        <a href="#" class="btn btn-label-info btn-round btn-sm">
                          <span class="btn-label">
                            <i class="fa fa-print"></i>
                          </span>
                          Print
                        </a>
                      </div> -->
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="chart-container" style="min-height: 375px">
                      <canvas id="statisticsChart"></canvas>
                    </div>
                    <div id="myChartLegend"></div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>






<script type="text/javascript">
  var ctx = document.getElementById('statisticsChart').getContext('2d');

var statisticsChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
        label: "Inactive Users",
        borderColor: '#f3545d',
        pointBackgroundColor: 'rgba(243, 84, 93, 0.6)',
        pointRadius: 0,
        backgroundColor: 'rgba(243, 84, 93, 0.4)',
        legendColor: '#f3545d',
        fill: true,
        borderWidth: 2,
        data: [154, 184, 175, 203, 210, 231, 240, 278, 252, 312, 320, 374]
      },
      {
        label: "Active Users",
        borderColor: '#177dff',
        pointBackgroundColor: 'rgba(23, 125, 255, 0.6)',
        pointRadius: 0,
        backgroundColor: 'rgba(23, 125, 255, 0.4)',
        legendColor: '#177dff',
        fill: true,
        borderWidth: 2,
        data: [542, 480, 430, 550, 530, 453, 380, 434, 568, 610, 700, 900]
      }
    ]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    legend: {
      display: false
    },
    tooltips: {
      bodySpacing: 4,
      mode: "nearest",
      intersect: 0,
      position: "nearest",
      xPadding: 10,
      yPadding: 10,
      caretPadding: 10
    },
    layout: {
      padding: {
        left: 5,
        right: 5,
        top: 15,
        bottom: 15
      }
    },
    scales: {
      yAxes: [{
        ticks: {
          fontStyle: "500",
          beginAtZero: false,
          maxTicksLimit: 5,
          padding: 10
        },
        gridLines: {
          drawTicks: false,
          display: false
        }
      }],
      xAxes: [{
        gridLines: {
          zeroLineColor: "transparent"
        },
        ticks: {
          padding: 10,
          fontStyle: "500"
        }
      }]
    },
    legendCallback: function (chart) {
      var text = [];
      text.push('<ul class="' + chart.id + '-legend html-legend">');
      for (var i = 0; i < chart.data.datasets.length; i++) {
        text.push('<li><span style="background-color:' + chart.data.datasets[i].legendColor + '"></span>');
        if (chart.data.datasets[i].label) {
          text.push(chart.data.datasets[i].label);
        }
        text.push('</li>');
      }
      text.push('</ul>');
      return text.join('');
    }
  }
});

var myLegendContainer = document.getElementById("myChartLegend");

// generate HTML legend
myLegendContainer.innerHTML = statisticsChart.generateLegend();

// bind onClick event to all LI-tags of the legend
var legendItems = myLegendContainer.getElementsByTagName('li');
for (var i = 0; i < legendItems.length; i += 1) {
  legendItems[i].addEventListener("click", legendClickCallback, false);
}


</script>