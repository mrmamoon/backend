@php
use App\Models\insight_tables;
$lol = insight_tables::where('table_name', 'like', 'transaction%')->first();

$dataPersqftJan22 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2022-01%')->avg('transaction_size_sq_m_');
$dataPersqftFeb22 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2022-02%')->avg('transaction_size_sq_m_');
$dataPersqftMar22 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2022-03%')->avg('transaction_size_sq_m_');
$dataPersqftApr22 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2022-04%')->avg('transaction_size_sq_m_');
$dataPersqftMay22 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2022-05%')->avg('transaction_size_sq_m_');
$dataPersqftJun22 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2022-06%')->avg('transaction_size_sq_m_');
$dataPersqftJul22 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2022-07%')->avg('transaction_size_sq_m_');
$dataPersqftAug22 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2022-08%')->avg('transaction_size_sq_m_');
$dataPersqftSep22 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2022-09%')->avg('transaction_size_sq_m_');
$dataPersqftOct22 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2022-10%')->avg('transaction_size_sq_m_');
$dataPersqftNov22 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2022-11%')->avg('transaction_size_sq_m_');
$dataPersqftDec22 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2022-12%')->avg('transaction_size_sq_m_');

$dataPersqftJan21 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2021-01%')->avg('transaction_size_sq_m_');
$dataPersqftFeb21 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2021-02%')->avg('transaction_size_sq_m_');
$dataPersqftMar21 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2021-03%')->avg('transaction_size_sq_m_');
$dataPersqftApr21 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2021-04%')->avg('transaction_size_sq_m_');
$dataPersqftMay21 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2021-05%')->avg('transaction_size_sq_m_');
$dataPersqftJun21 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2021-06%')->avg('transaction_size_sq_m_');
$dataPersqftJul21 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2021-07%')->avg('transaction_size_sq_m_');
$dataPersqftAug21 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2021-08%')->avg('transaction_size_sq_m_');
$dataPersqftSep21 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2021-09%')->avg('transaction_size_sq_m_');
$dataPersqftOct21 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2021-10%')->avg('transaction_size_sq_m_');
$dataPersqftNov21 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2021-11%')->avg('transaction_size_sq_m_');
$dataPersqftDec21 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2021-12%')->avg('transaction_size_sq_m_');
@endphp
<script type="text/javascript">
    $(document).ready(function() {
    
    var table = $('#datatable_property_Price_Per_Sqft').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('insight.datatable_property_Price_Per_Sqft') }}",
        "columns": [{
                "data": "id",
                "defaultContent": ""
            },
            {
                "data": "year",
                "defaultContent": ""
            },
            {
                "data": "year",
                "defaultContent": ""
            },
            {
                "data": "year",
                "defaultContent": ""
            },
            {
                "data": "year",
                "defaultContent": ""
            },
            {
                "data": "year",
                "defaultContent": ""
            },
            {
                "data": "year",
                "defaultContent": ""
            },
            {
                "data": "year",
                "defaultContent": ""
            },
            {
                "data": "year",
                "defaultContent": ""
            },
            {
                "data": "year",
                "defaultContent": ""
            },
            {
                "data": "year",
                "defaultContent": ""
            },
            {
                "data": "year",
                "defaultContent": ""
            },
            {
                "data": "year",
                "defaultContent": ""
            },
            {
                "data": "year",
                "defaultContent": ""
            },
            // {
            //     "data": "id",
            //     "defaultContent": ""
            // },
            // {
            //     "data": "id",
            //     "defaultContent": ""
            // },

             
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
                "targets": 2,
                "render": function(data, type, row, meta) {
                  
                  
                    if(data == 2021)
                    return {{ ($dataPersqftJan21 != 0) ? $dataPersqftJan21 : 211 }};
                    else
                        return {{ ($dataPersqftJan22 != 0) ? $dataPersqftJan22 : 221 }}
                },
            },
            {
                "targets": 3,
                "render": function(data, type, row, meta) {
                  
                  
                    if(data == 2021)
                    return {{ ($dataPersqftFeb21 != 0) ? $dataPersqftFeb21 : 535 }};
                    else
                        return {{ ($dataPersqftFeb22 != 0) ? $dataPersqftFeb22 : 545 }}
                },
            },
            {
                "targets": 4,
                "render": function(data, type, row, meta) {
                  
                  
                    if(data == 2021)
                    return {{ ($dataPersqftMar21 != 0) ? $dataPersqftMar21 : 538 }};
                    else
                        return {{ ($dataPersqftMar22 != 0) ? $dataPersqftMar22 : 548 }}
                },
            },
            {
                "targets": 5,
                "render": function(data, type, row, meta) {
                  
                  
                    if(data == 2021)
                    return {{ ($dataPersqftApr21 != 0) ? $dataPersqftApr21 : 448 }};
                    else
                        return {{ ($dataPersqftApr22 != 0) ? $dataPersqftApr22 : 458 }}
                },
            },
            {
                "targets": 6,
                "render": function(data, type, row, meta) {
                  
                  
                    if(data == 2021)
                    return {{ ($dataPersqftMay21 != 0) ? $dataPersqftMay21 : 778 }};
                    else
                        return {{ ($dataPersqftMay22 != 0) ? $dataPersqftMay22 : 788 }}
                },
            },
            {
                "targets": 7,
                "render": function(data, type, row, meta) {
                  
                  
                    if(data == 2021)
                    return {{ ($dataPersqftJun21 != 0) ? $dataPersqftJun21 : 448 }};
                    else
                        return {{ ($dataPersqftJun22 != 0) ? $dataPersqftJun22 : 458 }}
                },
            },
            {
                "targets": 8,
                "render": function(data, type, row, meta) {
                  
                  
                    if(data == 2021)
                    return {{ ($dataPersqftJul21 != 0) ? $dataPersqftJul21 : 444 }};
                    else
                        return {{ ($dataPersqftJul22 != 0) ? $dataPersqftJul22 : 454 }}
                },
            },
            {
                "targets": 9,
                "render": function(data, type, row, meta) {
                  
                  
                    if(data == 2021)
                    return {{ ($dataPersqftAug21 != 0) ? $dataPersqftAug21 : 448 }};
                    else
                        return {{ ($dataPersqftAug22 != 0) ? $dataPersqftAug22 : 458 }}
                },
            },
            {
                "targets": 10,
                "render": function(data, type, row, meta) {
                  
                  
                    if(data == 2021)
                    return {{ ($dataPersqftSep21 != 0) ? $dataPersqftSep21 : 475 }};
                    else
                        return {{ ($dataPersqftSep22 != 0) ? $dataPersqftSep22 : 485 }}
                },
            },
            {
                "targets": 11,
                "render": function(data, type, row, meta) {
                  
                  
                    if(data == 2021)
                    return {{ ($dataPersqftOct21 != 0) ? $dataPersqftOct21 : 123 }};
                    else
                        return {{ ($dataPersqftOct22 != 0) ? $dataPersqftOct22 : 133 }}
                },
            },
            {
                "targets": 12,
                "render": function(data, type, row, meta) {
                  
                  
                    if(data == 2021)
                    return {{ ($dataPersqftNov21 != 0) ? $dataPersqftNov21 : 448 }};
                    else
                        return {{ ($dataPersqftNov22 != 0) ? $dataPersqftNov22 : 458 }}
                },
            },
            {
                "targets": 13,
                "render": function(data, type, row, meta) {
                  
                  
                    if(data == 2021)
                    return {{ ($dataPersqftDec21 != 0) ? $dataPersqftDec21 : 842 }};
                    else
                        return {{ ($dataPersqftDec22 != 0) ? $dataPersqftDec22 : 852 }}
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
            //   "targets": 1,
            //   "render": function(data, type, row, meta)
            //   {
            //     return `<img src="{{url('')}}/uploads/${data}" width="40px" height="40px">`;
            //   }
            // },
            // {
            //   "targets": 2,
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
            // {
            //     "targets": 14,
            //     "render": function(data, type, row, meta) {

            //         var edit = "{{ route('insight.edit_property_Price_Per_Sqft', [':id']) }}";
            //         edit = edit.replace(':id', data);


            //         return `<div class="text-center">
            //                 <a href="` + edit + `"  data-toggle="tooltip" data-placement="top" title="Edit">
            //                 <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1 text-black"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
            //               </a>
                          
            //               <a href="javascript:void(0);" class="delete2" data-toggle="tooltip" data-placement="top" title="Delete" data-id="`+ data + `">
            //                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle text-danger">
            //                 <circle cx="12" cy="12" r="10"></circle>
            //                 <line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
            //               </a></div>`;
            //     },
            // },
        ],
        "drawCallback": function(settings) {

        $('.delete2').click(function () {
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
              .post('{{route("insight.destroy_property_Price_Per_Sqft")}}', {
                _method: 'delete',
                _token: '{{csrf_token()}}',
                deleteId: deleteId,
              })
              .then(function (response) {

                swal(
                  'Deleted!',
                  'Data has been deleted.',
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
        // scrollX:true,
    });
    
    });
    
    </script>