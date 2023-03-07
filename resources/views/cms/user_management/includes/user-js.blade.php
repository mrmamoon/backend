<script type="text/javascript">
    $(document).ready(function() {
    
    var table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('user.datatable') }}",
        "columns": [{
                "data": "id",
                "defaultContent": ""
            },
            {
                "data": "name",
                "defaultContent": ""
            },
            {
                "data": "role_names",
                "defaultContent": ""
            },
            @if(auth()->user()->can('user-status'))
            {
                "data": "status",
                "defaultContent": ""
            },
            @endif
            @if(auth()->user()->can('users-edit') || auth()->user()->can('users-delete'))
            {
                "data": "id",
                "defaultContent": ""
            },
            @endif
        ],
        "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
            },
            {
                "targets": 0,
                "render": function(data, type, row, meta) {
                    return meta.row + 1;
                },
            },
           
                    @can('user-status')
            {
                "targets": 3,
                "render": function(data, type, row, meta) {
                  
                  var checked = row.status == 1 ? 'checked' : null;
                    return `
                    <label class="switch s-icons s-outline  s-outline-primary  mt-2 mr-2">
                      <input class="status" type="checkbox"  ` + checked + ` value="` + row.id + `">
                      <span class="slider round"></span>
                    </label>
                    `;
                },
            },
                   @endcan
                    @if(auth()->user()->can('users-edit') || auth()->user()->can('users-delete'))
            {
                "targets": 4,
                "render": function(data, type, row, meta) {

                    var edit = "{{ route('user.edit', [':id']) }}";
                    edit = edit.replace(':id', data);

                    return `@can('users-edit')
                          <a href="` + edit + `"  data-toggle="tooltip" data-placement="top" title="Edit">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle text-primary">
                          <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                          </a>
                          @endcan
                          @can('users-edit')
                          <a href="javascript:void(0);" class="delete" data-toggle="tooltip" data-placement="top" title="Delete" data-id="`+ data + `">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle text-danger">
                          <circle cx="12" cy="12" r="10"></circle>
                          <line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                          </a>
                          @endcan`;
                },
            },
            @endif
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