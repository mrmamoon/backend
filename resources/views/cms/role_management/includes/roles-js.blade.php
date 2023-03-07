 <script type="text/javascript">
$(document).ready(function() {

var table = $('#datatable').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('role.datatable') }}",
    "columns": [{
            "data": "id",
            "defaultContent": ""
        },
        {
            "data": "name",
            "defaultContent": ""
        },
        @if(auth()->user()->can('roles-edit') || auth()->user()->can('roles-delete'))
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
            "targets": -1,
            "render": function(data, type, row, meta) {
                var edit = '{{ route('role.edit', [':id']) }}';
                edit = edit.replace(':id', data);
                return `
                <div class="text-center">
                  @can('roles-edit')
                    <a href="` + edit + `"  data-toggle="tooltip" data-placement="top" title="Edit">
                    <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1 text-black"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                    </a>
                  @endcan
                  @can('roles-delete')
                    <a href="javascript:void(0);" class="delete" data-toggle="tooltip" data-placement="top" title="Delete" data-id="`+ data + `">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle text-danger">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    </a>
                  @endcan
            </div>
            `;
            },
        },
    ],
    "drawCallback": function(settings) {
        var elems = Array.prototype.slice.call(document.querySelectorAll('.status'));
        if (elems) {
            elems.forEach(function(html) {
                var switchery = new Switchery(html, {
                color: '#ffbd4a',
                secondaryColor: '#dfdfdf',
                jackColor: '#fff',
                jackSecondaryColor: null,
                className: 'switchery',
                disabled: false,
                disabledOpacity: 0.5,
                speed: '0.1s',
                size: 'small'
              });
            });
        }
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
              .post('{{route("role.destroy")}}', {
                _method: 'delete',
                _token: '{{csrf_token()}}',
                deleteId: deleteId,
              })
              .then(function (response) {
                console.log(response);

                swal(
                  'Deleted!',
                  'Role has been deleted.',
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