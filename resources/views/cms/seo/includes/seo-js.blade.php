<script type="text/javascript">
    $(document).ready(function() {
    
    var table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('seo.datatable') }}",
        "columns": [
                {
                "data": "id",
                "defaultContent": ""
                },
                {
                    "data": "name",
                    "defaultContent": ""
                },
                @can('SEO-edit')
                {
                    "data": "slug",
                    "defaultContent": ""
                },
                @endcan
        ],
        "columnDefs": [
            {
                "targets": 'no-sort',
                "orderable": false,
            },
            {
                "targets": 0,
                "render": function(data, type, row, meta) {
                    return meta.row + 1;
                },
            },

            @can('SEO-edit')
           
            {
                "targets": -1,
                "render": function(data, type, row, meta) {

                    var edit = "{{ route('seo.edit', [':id']) }}";
                    edit = edit.replace(':id', data);

                    var checked = row.status == 1 ? 'checked' : null;

                    return `
                          <div class="text-center">
                            <a href="` + edit + `"  data-toggle="tooltip" data-placement="top" title="Edit">
                              <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1 text-black"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                            </a>
                          </div>
                         
                   `;
                },
            },
            @endcan
        ],
        "drawCallback": function(settings) {
      
        $('.status').change(function () {
          var $this = $(this);
          var id = $this.val();
          
          var status = this.checked;

          if (status) {
            status = 1;
          } else {
            status = 0;
          }

          axios
            .post('{{route("user.status")}}', {
              _token: '{{csrf_token()}}',
              _method: 'patch',
              id: id,
              status: status,
            })
            .then(function (responsive) {
              console.log(responsive);

            })
            .catch(function (error) {
              console.log(error);
            });
        });

        $('.delete').click(function () {
          var deleteId = $(this).data('id');
          var $this = $(this);

          swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#4fa7f3',
            cancelButtonColor: '#d57171',
            confirmButtonText: 'Yes, delete it!'
          }).then(function (result) {
            if (result.value) {
            axios
              .post('{{route("user.destroy")}}', {
                _method: 'delete',
                _token: '{{csrf_token()}}',
                deleteId: deleteId,
              })
              .then(function (response) {
                console.log(response);

                swal(
                  'Deleted!',
                  'User  has been deleted.',
                  'success'
                )

                table.draw();
              })
              .catch(function (error) {
                console.log(error);
                swal(
                  'Failed!',
                  error.response.data.error,
                  'error'
                )
              });
            }
          })
        });
      },
        //scrollX:true,
    });
    
    });
    
    </script>