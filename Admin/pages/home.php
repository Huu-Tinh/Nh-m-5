<div class="container-fluid">
  <!--  Row 1 -->
  <div class="row">
    <div class="row column2 graph margin_bottom_30">
      <div class="col-md-6">
        <div class="white_shd full">
          <div class="full graph_head">
            <div class="heading1 margin_0">
              <h5>Thống kê số lượng sản phẩm bán qua các tháng</h5>
            </div>
          </div>
          <div class="full graph_revenue">
            <div class="row">
              <div class="col-md-12">
                <div class="area_chart">
                  <?php
                  $db = new order();
                  $result = $db->get_buy_month();
                  // var_dump($resuft); exit();
                  // Kiểm tra và xử lý kết quả
                  if ($result > 0) {
                    // Khởi tạo mảng để lưu dữ liệu từ cơ sở dữ liệu
                    $roles = array();
                    $totals = array();

                    // Đọc dữ liệu từ kết quả truy vấn
                    foreach ($result as $row) {
                      $roles[] = $row['month'] . '/' . $row['year']; // Lưu vai trò (role) vào mảng nhãn
                      $totals[] = $row['total_quantity']; // Lưu tổng số vào mảng dữ liệu
                    }

                    // Chuyển đổi mảng thành chuỗi JSON để sử dụng trong biểu đồ
                    $roles_json = json_encode($roles);
                    $totals_json = json_encode($totals);
                  } else {
                    echo "Không có dữ liệu từ cơ sở dữ liệu.";
                  }

                  ?>
                  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                  <canvas id="user" width="800" height="400"></canvas>

                  <script>
                    var roles = <?php echo $roles_json; ?>;
                    var totals = <?php echo $totals_json; ?>;

                    var ctx = document.getElementById('user').getContext('2d');
                    var myChart = new Chart(ctx, {
                      type: 'bar',
                      data: {
                        labels: roles,
                        datasets: [{
                          label: 'Thông Kế số lượng sản phẩm đã bán',
                          data: totals,
                          backgroundColor: [
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 99, 132, 0.5)'
                          ],
                          borderColor: [
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 99, 132, 0.5)'
                          ],
                          borderWidth: 1,
                          barThickness: 60
                        }]
                      },
                      options: {
                        scales: {
                          y: {
                            beginAtZero: true
                          }
                        }
                      }
                    });
                  </script>

                </div>'
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="white_shd full">
          <div class="full graph_head">
            <div class="heading1 margin_0">
              <h5>Thống kê số lượng bình luận sản phẩm</h5>
            </div>
          </div>
          <div class="full graph_revenue">
            <div class="row">
              <div class="col-md-12">
                <div class="area_chart">
                  <?php
                  $db = new comment();
                  $result = $db->listcomment();
                  // var_dump($resuft); exit();
                  // Kiểm tra và xử lý kết quả
                  if ($result > 0) {
                    // Khởi tạo mảng để lưu dữ liệu từ cơ sở dữ liệu
                    $namepr = array();
                    $totals_comment = array();

                    // Đọc dữ liệu từ kết quả truy vấn
                    foreach ($result as $row) {
                      $namepr[] = $row['name_pr']; // Lưu vai trò (role) vào mảng nhãn
                      $totals_comment[] = $row['comment_count']; // Lưu tổng số vào mảng dữ liệu
                    }

                    // Chuyển đổi mảng thành chuỗi JSON để sử dụng trong biểu đồ
                    $namepr_json = json_encode($namepr);
                    $totals_comment_json = json_encode($totals_comment);
                  } else {
                    echo "Không có dữ liệu từ cơ sở dữ liệu.";
                  }

                  ?>
                  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                  <canvas id="users" width="800" height="400"></canvas>

                  <script>
                    var namepr = <?php echo $namepr_json; ?>;
                    var totals_comment = <?php echo $totals_comment_json; ?>;

                    var ctx = document.getElementById('users').getContext('2d');
                    var myChart = new Chart(ctx, {
                      type: 'bar',
                      data: {
                        labels: namepr,
                        datasets: [{
                          label: 'Thông Kế số lượng bình luận qua sản phẩm',
                          data: totals_comment,
                          backgroundColor: [
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 99, 132, 0.5)'
                          ],
                          borderColor: [
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 99, 132, 0.5)'
                          ],
                          borderWidth: 1,
                          barThickness: 60
                        }]
                      },
                      options: {
                        scales: {
                          y: {
                            beginAtZero: true
                          }
                        }
                      }
                    });
                  </script>

                </div>'
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="py-6 px-6 text-center">
  <!-- <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">AdminMart.com</a></p> -->
</div>
</div>