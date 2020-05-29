$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });



  $(document).ready(function(){
    $( '.edit').on('click', function(){ 

        $('#add_data_Modal').modal('show'); 

        $tr=$(this).closest('tr');

        var data = $tr.children('td').map(function(){
          return $(this).text();
        }).get();
        console.log(data);
        $('#id').val(data[0]);
        $('#vdepart').val(data[1]);
        $('#varrivee').val(data[2]); 
        $('#date_depart').val(data[5]);
        $('#npalace').val(data[4]); 
        $('#prix').val(data[5]); 
        $('#statut').val(data[6]); 

        














  });
});
