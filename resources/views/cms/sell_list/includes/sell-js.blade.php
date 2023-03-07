<script type="text/javascript">
    $(document).ready(function() {
    
    var table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('sell_list.datatable') }}",
        "columns": [{
                "data": "id",
                "defaultContent": ""
            },
            {
                "data": "name",
                "defaultContent": ""
            },
            {
                "data": "email",
                "defaultContent": ""
            },
            {
                "data": "number",
                "defaultContent": ""
            },
            {
                "data": "url",
                "defaultContent": ""
            },
            {
                "data": "type",
                "defaultContent": ""
            },
            {
                "data": "bedrooms",
                "defaultContent": ""
            },
            {
                "data": "area",
                "defaultContent": ""
            },
            {
                "data": "unitno",
                "defaultContent": ""
            },
            {
                "data": "price",
                "defaultContent": ""
            },

            {
                "data": "title_image",
                "defaultContent": ""
            },

            {
                "data": "passport_image",
                "defaultContent": ""
            },
            
            {
                "data": "created_at",
                "defaultContent": ""
            },
            {
                "data": "id",
                "defaultContent": ""
            },

             
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
              "targets": 10,
              "render": function(data, type, row, meta) {
                return `<img src="{{config('fgproperties_cms.file_path')}}${data}" width="40px" height="40px">`;

              },
              
            },
            {
              "targets": 11,
              "render": function(data, type, row, meta) {
                return `<img src="{{config('fgproperties_cms.file_path')}}${data}" width="40px" height="40px">`;
              },
              
            },
            {
              "targets": 12,
              "render": function(data, type, row, meta) {


                let f = new Date(data);
                // let a = f.formatToParts(data);
                const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                let month = months[f.getMonth()];
                return  f.getDate()+'-'+month+'-'+f.getFullYear()  ;
              },
              
            },
            // {
            //     "targets": 3,
            //     "render": function(data, type, row, meta) {
                  
            //       var checked = row.is_featured == 1 ? 'checked' : null;
            //         return `
            //         <div class="text-center">
            //             <label class="switch s-icons s-outline  s-outline-success  mt-3">
            //               <input class="is_featured" type="checkbox"  ` + checked + ` value="` + row.id + `">
            //               <span class="slider round"></span>
            //             </label>
            //         </div>
            //         `;
            //     },
            // },
            // {
            //   "targets": 2,
            //   "render": function(data, type, row, meta)
            //   {
            //     return `<img src="{{url('')}}/uploads/${data}" width="40px" height="40px">`;
            //   }
            // },
            // {
            //   "targets": 3,
            //   "render": function(data, type, row, meta)
            //   {
            //     return `<img src="{{url('')}}/uploads/${data}" width="40px" height="40px">`;
            //   }
            // },
           
            // {
            //     "targets": 3,
            //     "render": function(data, type, row, meta) {
                  
            //       var checked = row.status == 1 ? 'checked' : null;
            //         return `
            //         <div class="text-center">
            //             <label class="switch s-icons s-outline  s-outline-success  mt-3">
            //               <input class="status" type="checkbox"  ` + checked + ` value="` + row.id + `">
            //               <span class="slider round"></span>
            //             </label>
            //         </div>
            //         `;
            //     },
            // },
            {
                "targets": 13,
                "render": function(data, type, row, meta) {

                    var edit = "{{ route('sell_list.show', [':id']) }}";
                    edit = edit.replace(':id', data);


                    return `<div class="text-center">
                              <a href="` + edit + `"  data-toggle="tooltip" data-placement="top" title="view">
                                <svg width="30" height="30" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                  <path fill="none" stroke="#294159" stroke-width="2" d="M12,17 C9.27272727,17 6,14.2222222 6,12 C6,9.77777778 9.27272727,7 12,7 C14.7272727,7 18,9.77777778 18,12 C18,14.2222222 14.7272727,17 12,17 Z M11,12 C11,12.55225 11.44775,13 12,13 C12.55225,13 13,12.55225 13,12 C13,11.44775 12.55225,11 12,11 C11.44775,11 11,11.44775 11,12 Z"/>
                                </svg>
                              </a> 
                          
                              <a href="javascript:void(0);" class="delete" data-toggle="tooltip" data-placement="top" title="Delete" data-id="`+ data + `">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle text-danger">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                              </a>
                            </div>`;
                },
            },
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
              .post('{{route("sell_list.destroy")}}', {
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