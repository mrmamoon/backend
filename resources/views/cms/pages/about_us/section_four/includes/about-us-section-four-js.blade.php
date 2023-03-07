<script type="text/javascript">
    $(document).ready(function() {
    
      var table = $('#homeSectionFourDatatable').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('about-us.SectionFour.datatable') }}",
          "columns": [{
                  "data": "id",
                  "defaultContent": ""
              },
              {
                  "data": "image",
                  "defaultContent": ""
              },
            
              {
                  "data": "main_heading_1",
                  "defaultContent": ""
              },

              {
                  "data": "description",
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
                  "targets": 1,
                  "render": function(data, type, row, meta) {
                      return `<img src="{{url('')}}/uploads/${data}" width="160px" height="50px">`; 
                  },
              },
            
              {
                  "targets": -1,
                  "render": function(data, type, row, meta) {

                      var edit = "{{ route('about-us.SectionFour.edit', [':id']) }}";
                      edit = edit.replace(':id', data);

                      return `<div class="text-center">
                            
                         
                            <a href="` + edit + `"  data-toggle="tooltip" data-placement="top" title="Edit">
                              <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1 text-black"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                            </a>
                            </div>`;
                  },
              },
          ],
          "drawCallback": function(settings) {
        },
          //scrollX:true,
      });
    
    });
    
    </script>