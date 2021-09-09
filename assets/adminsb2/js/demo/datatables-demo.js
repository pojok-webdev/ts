// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
    lengthMenu:[[5,10],['5','10']],
    buttons:'pageLength',
    checkboxes:{
      selectRow:true,selectAllPages:false
    },
    columnDefs:[
      {
        'targets':0,
        'orderable':false
      }
    ],
    order:[[1,'asc']]
  });
});
