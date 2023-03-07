<script type="text/javascript">
    $(document).ready(function() {
    
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('mortgage-requests.datatable') }}",
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
                    "data": "monthly_installment",
                    "defaultContent": ""
                },
                {
                    "data": "loan_amount",
                    "defaultContent": ""
                },
                {
                    "data": "loan_period",
                    "defaultContent": ""
                },
                {
                    "data": "down_payment",
                    "defaultContent": ""
                },
                {
                    "data": "interest_rate",
                    "defaultContent": ""
                },
                {
                    "data": "property_price",
                    "defaultContent": ""
                },
                @if(auth()->user()->can('Mortgage Applicants-approve'))
                {
                    "data": "status",
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
                    "targets": 3,
                    "render": function(data, type, row, meta) {
                      
                      var checked = row.status == 1 ? 'checked' : null;
                        return `
                        <a href="mailto:`+data+`" style="color:blue">` +data+`</a>
                        `;
                    },
                },
                @if(auth()->user()->can('Mortgage Applicants-approve'))
                {
                    "targets": 10,
                    "render": function(data, type, row, meta) {
                      
                      var checked = row.status == 'Approved' ? 'checked' : null;
                        return `
                        <div class="text-center">
                          
                            <label class="switch s-icons s-outline  s-outline-success  mt-3">
                              <input class="status" type="checkbox"  ` + checked + ` value="` + row.id + `">
                              <span class="slider round"></span>
                            </label>
                          
                        </div>
                        `;
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
                    status = 'Approved';
                  } else {
                    status = 'Pending';
                  }

                  axios
                    .post('{{route("mortgage-requests.status")}}', {
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
            }
            
            //scrollX:true,
        });
    
    });
    
</script>