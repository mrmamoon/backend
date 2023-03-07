<script type="text/javascript">
    $(document).ready(function() {
    
    var table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('applicant.datatable') }}",
        "columns": [{
                "data": "id",
                "defaultContent": ""
            },
            {
                "data": "full_name",
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
                "data": "cv",
                "defaultContent": ""
            },
            {
                "data": "designation",
                "defaultContent": ""
            },
            
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
                "targets": 4,
                "render": function(data, type, row, meta) {

                    var edit;
                    edit = data;

                    return `<div class="text-center">
                          
                          
                          <a href="{{config('fgproperties_cms.file_path')}}/` + edit + `"   data-toggle="tooltip" data-placement="top" title="View Resume">
                           <button type="button" class="form-control"> View </button>
                          </a>
                          </div>`;
                },
            },
        ],
        
        //scrollX:true,
    });
    
    });
    
    </script>