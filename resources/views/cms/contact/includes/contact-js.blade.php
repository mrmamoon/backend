<script type="text/javascript">
    $(document).ready(function() {
    
    var table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('contact.datatable') }}",
        "columns": [{
                "data": "id",
                "defaultContent": ""
            },
            {
                "data": "name",
                "defaultContent": ""
            },
            {
                "data": "phone",
                "defaultContent": ""
            },
            {
                "data": "email",
                "defaultContent": ""
            },
            {
                "data": "message",
                "defaultContent": ""
            },
            {
                "data": "created_at",
                "defaultContent": ""
            },
            @if(auth()->user()->can('Contact-delete'))
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
            {
              "targets": 5,
              "render": function(data, type, row, meta) {


                let f = new Date(data);
                // let a = f.formatToParts(data);
                const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                let month = months[f.getMonth()];
                return  f.getDate()+'-'+month+'-'+f.getFullYear()  ;
              },
              
            },
            @if(auth()->user()->can('Contact-delete'))
            {
                "targets": 6,
                "render": function(data, type, row, meta) {

                    var edit = "{{ route('developer.edit', [':id']) }}";
                    edit = edit.replace(':id', data);


                    return ` <div class="text-center">
                            <!--<a href="` + edit + `"  data-toggle="tooltip" data-placement="top" title="Edit">
                            <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1 text-black"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                          </a> -->
                          @can('Contact-delete')
                          <a href="javascript:void(0);" class="delete" data-toggle="tooltip" data-placement="top" title="Delete" data-id="`+ data + `">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle text-danger">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                          </a>
                          @endcan
                          </div>`;
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
            .post('{{route("developer.status")}}', {
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

        $('.is_featured').change(function () {
          var $this = $(this);
          var id = $this.val();
          
          var is_featured = this.checked;

          if (is_featured) {
            is_featured = 1;
          } else {
            is_featured = 0;
          }

          axios
            .post('{{route("developer.featured")}}', {
              _token: '{{csrf_token()}}',
              _method: 'patch',
              id: id,
              is_featured: is_featured,
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
              .post('{{route("contact.destroy")}}', {
                _method: 'delete',
                _token: '{{csrf_token()}}',
                deleteId: deleteId,
              })
              .then(function (response) {

                swal(
                  'Deleted!',
                  'Our Service  has been deleted.',
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