<script type="text/javascript">
    $(document).ready(function() {
    
    var table = $('#datatable').DataTable({
        paging: false,
        searching: false,
        processing: true,
        serverSide: true,
        scrollY:"200px",
        scrollCollapse: true,

        ajax: "{{ route('amenities.datatable') }}",
        "columns": [{
                "data": "id",
                "defaultContent": ""
            },
            {
                "data": "name",
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

                return `<div class="text-center">
                <input name="amenities[]" value="${data}" type="checkbox">
                </div>`;


                },
            },
            // {
            //   "targets": 1,
            //   "render": function(data, type, row, meta) {
            //     return `<input name="" value="" type="checkbox">${data}`;
            //   },
            // },
        ],
        
    });

    
    });
    
    </script>