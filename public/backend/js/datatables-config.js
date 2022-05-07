$(document).ready(function() {
    var table = $('#example').DataTable({
      "paging": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
      "lengthChange": true,
      "buttons": ['excel', 'print', 'pdf', 'colvis']
    });
  
    table.buttons().container()
      .appendTo('#example_wrapper .col-md-6:eq(0)');
  });