<script type="text/javascript">
    $(document).ready(function() {
    
    var table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('keywords.datatable') }}",
        "columns": [{
                "data": "id",
                "defaultContent": ""
            },
            {
                "data": "keyword",
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
        ],
        //scrollX:true,
    });
    
    });
    
    </script>