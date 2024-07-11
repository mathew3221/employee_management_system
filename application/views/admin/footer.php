        <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">
            <nav class="pull-left">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="#"> Help </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Licenses </a>
                </li>
              </ul>
            </nav>
            <div class="copyright">
              2024, made by
              <a href="https://mathew3221.github.io/portfolio/">Mathew John</a>
            </div>
            <!-- <div>
              Distributed by
              <a target="_blank" href="https://mathew3221.github.io/portfolio/">ThemeWagon</a>.
            </div>
          </div> -->
        </footer>
      </div>


      

      
    </div>

    <script>
      $(document).ready(function () {
        $("#basic-datatables").DataTable({});


        $("#multi-filter-select").DataTable({
          pageLength: 5,
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                    select.append(
                      '<option value="' + d + '">' + d + "</option>"
                    );
                  });
              });
          },
        });




        var action =
          '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        
        

        // Logout functionality
        $('a.logout-link').on('click', function (e) {
            e.preventDefault();
            var confirmLogout = confirm('Are you sure you want to logout?');
            if (confirmLogout) {
                window.location.href = $(this).attr('href');
            }
        });


      });




      
    </script>
  </body>
</html>
