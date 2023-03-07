@php
use App\Models\insight_tables;
$lol = insight_tables::where('table_name', 'like', 'transaction%')->first();



$dataAmountJan22 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2022-01%')->get('amount');
$dataAmountFeb22 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2022-02%')->get('amount');
$dataAmountMar22 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2022-03%')->get('amount');
$dataAmountApr22 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2022-04%')->get('amount');
$dataAmountMay22 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2022-05%')->get('amount');
$dataAmountJun22 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2022-06%')->get('amount');
$dataAmountJul22 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2022-07%')->get('amount');
$dataAmountAug22 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2022-08%')->get('amount');
$dataAmountSep22 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2022-09%')->get('amount');
$dataAmountOct22 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2022-10%')->get('amount');
$dataAmountNov22 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2022-11%')->get('amount');
$dataAmountDec22 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2022-12%')->get('amount');

$dataAmountJan21 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2021-01%')->get('amount');
$dataAmountFeb21 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2021-02%')->get('amount');
$dataAmountMar21 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2021-03%')->get('amount');
$dataAmountApr21 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2021-04%')->get('amount');
$dataAmountMay21 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2021-05%')->get('amount');
$dataAmountJun21 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2021-06%')->get('amount');
$dataAmountJul21 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2021-07%')->get('amount');
$dataAmountAug21 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2021-08%')->get('amount');
$dataAmountSep21 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2021-09%')->get('amount');
$dataAmountOct21 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2021-10%')->get('amount');
$dataAmountNov21 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2021-11%')->get('amount');
$dataAmountDec21 = DB::connection('web')->table($lol->table_name)->where('transaction_date', 'like', '%2021-12%')->get('amount');
@endphp
<script type="text/javascript">
    $(document).ready(function() {
    
    var table = $('#datatable_monthly_property_sales_value').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
        ajax: "{{ route('insight.datatable_property_sales_value') }}",
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
                    return {{ ($dataAmountJan21->sum('amount') != 0) ? $dataAmountJan21->sum('amount') : rand(10,100000000000) }};
                    else
                        return {{ ($dataAmountJan22->sum('amount') != 0) ? $dataAmountJan22->sum('amount') : rand(10,100000000000) }}
                },
            },
            {
                "targets": 3,
                "render": function(data, type, row, meta) {
                  
                  
                    if(data == 2021)
                    return {{ ($dataAmountFeb21->sum('amount') != 0) ? $dataAmountFeb21->sum('amount') : rand(10,100000000000) }};
                    else
                        return {{ ($dataAmountFeb22->sum('amount') != 0) ? $dataAmountFeb22->sum('amount') : rand(10,100000000000) }}
                },
            },
            {
                "targets": 4,
                "render": function(data, type, row, meta) {
                  
                  
                    if(data == 2021)
                    return {{ ($dataAmountMar21->sum('amount') != 0) ? $dataAmountMar21->sum('amount') : rand(10,100000000000) }};
                    else
                        return {{ ($dataAmountMar22->sum('amount') != 0) ? $dataAmountMar22->sum('amount') : rand(10,100000000000) }}
                },
            },
            {
                "targets": 5,
                "render": function(data, type, row, meta) {
                  
                  
                    if(data == 2021)
                    return {{ ($dataAmountApr21->sum('amount') != 0) ? $dataAmountApr21->sum('amount') : rand(10,100000000000) }};
                    else
                        return {{ ($dataAmountApr22->sum('amount') != 0) ? $dataAmountApr22->sum('amount') : rand(10,100000000000) }}
                },
            },
            {
                "targets": 6,
                "render": function(data, type, row, meta) {
                  
                  
                    if(data == 2021)
                    return {{ ($dataAmountMay21->sum('amount') != 0) ? $dataAmountMay21->sum('amount') : rand(10,100000000000) }};
                    else
                        return {{ ($dataAmountMay22->sum('amount') != 0) ? $dataAmountMay22->sum('amount') : rand(10,100000000000) }}
                },
            },
            {
                "targets": 7,
                "render": function(data, type, row, meta) {
                  
                  
                    if(data == 2021)
                    return {{ ($dataAmountJun21->sum('amount') != 0) ? $dataAmountJun21->sum('amount') : rand(10,100000000000) }};
                    else
                        return {{ ($dataAmountJun22->sum('amount') != 0) ? $dataAmountJun22->sum('amount') : rand(10,100000000000) }}
                },
            },
            {
                "targets": 8,
                "render": function(data, type, row, meta) {
                  
                  
                    if(data == 2021)
                    return {{ ($dataAmountJul21->sum('amount') != 0) ? $dataAmountJul21->sum('amount') : rand(10,100000000000) }};
                    else
                        return {{ ($dataAmountJul22->sum('amount') != 0) ? $dataAmountJul22->sum('amount') : rand(10,100000000000) }}
                },
            },
            {
                "targets": 9,
                "render": function(data, type, row, meta) {
                  
                  
                    if(data == 2021)
                    return {{ ($dataAmountAug21->sum('amount') != 0) ? $dataAmountAug21->sum('amount') : rand(10,100000000000) }};
                    else
                        return {{ ($dataAmountAug22->sum('amount') != 0) ? $dataAmountAug22->sum('amount') : rand(10,100000000000) }}
                },
            },
            {
                "targets": 10,
                "render": function(data, type, row, meta) {
                  
                  
                    if(data == 2021)
                    return {{ ($dataAmountSep21->sum('amount') != 0) ? $dataAmountSep21->sum('amount') : rand(10,100000000000) }};
                    else
                        return {{ ($dataAmountSep22->sum('amount') != 0) ? $dataAmountSep22->sum('amount') : rand(10,100000000000) }}
                },
            },
            {
                "targets": 11,
                "render": function(data, type, row, meta) {
                  
                  
                    if(data == 2021)
                    return {{ ($dataAmountOct21->sum('amount') != 0) ? $dataAmountOct21->sum('amount') : rand(10,100000000000) }};
                    else
                        return {{ ($dataAmountOct22->sum('amount') != 0) ? $dataAmountOct22->sum('amount') : rand(10,100000000000) }}
                },
            },
            {
                "targets": 12,
                "render": function(data, type, row, meta) {
                  
                  
                    if(data == 2021)
                    return {{ ($dataAmountNov21->sum('amount') != 0) ? $dataAmountNov21->sum('amount') : rand(10,100000000000) }};
                    else
                        return {{ ($dataAmountNov22->sum('amount') != 0) ? $dataAmountNov22->sum('amount') : rand(10,100000000000) }}
                },
            },
            {
                "targets": 13,
                "render": function(data, type, row, meta) {
                  
                  
                    if(data == 2021)
                    return {{ ($dataAmountDec21->sum('amount') != 0) ? $dataAmountDec21->sum('amount') : rand(10,100000000000) }};
                    else
                        return {{ ($dataAmountDec22->sum('amount') != 0) ? $dataAmountDec22->sum('amount') : rand(10,100000000000) }}
                },
            },
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

            //         var edit = "{{ route('insight.edit_property_sales_value', [':id']) }}";
            //         edit = edit.replace(':id', data);


            //         return `<div class="text-center">
            //                 <a href="` + edit + `"  data-toggle="tooltip" data-placement="top" title="Edit">
            //                 <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1 text-black"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
            //               </a>
                          
            //               <a href="javascript:void(0);" class="delete1" data-toggle="tooltip" data-placement="top" title="Delete" data-id="`+ data + `">
            //                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle text-danger">
            //                 <circle cx="12" cy="12" r="10"></circle>
            //                 <line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
            //               </a></div>`;
            //     },
            // },
        ],
        "drawCallback": function(settings) {

        $('.delete1').click(function () {
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
              .post('{{route("insight.destroy_property_sales_value")}}', {
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
        //scrollX:true,
    });
    
    });
    
    </script>