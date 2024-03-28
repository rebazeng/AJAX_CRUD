
$(document).ready(function (e) { 
    readRecords(); 
});

 function readRecords() {
        let readOp = true; 
      $.ajax({
        type: "post",
        url: "server.php",
        data: {readOp: readOp},

        success: function (data , status) {
            $("#records").html(data); 
            $('#myTable').DataTable();
        }
      });
    }

$("#insertBtn").click(function (e) { 
    e.preventDefault();
   
    let name = $("#t1").val(); 
    let age = $("#age").val(); 
    let phone = $("#phone").val(); 
    let insertOp = true;  
    
    $.ajax({
        type: "post",
        url: "server.php",
        data: {
            name : name , 
            age : age , 
            phone : phone , 
            insertOp : insertOp
        },
        success: function (data , status) {
            Swal.fire({
                title: "Add notification" ,
                text: "The record has been added",
                icon: "success"
              });
              readRecords();
        }, 
        
    });
});

function  deleteIt (  deleteId , deleteName ) { 
    var deletOp= true; 
    // copy and paste delete code from sweetAlert2
    Swal.fire({
        title: "Are you sure?",
        text: "Do you want to delete " + deleteName + "?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: "server.php",
                data: {
                    deleteId : deleteId , 
                    deleteOp : deletOp ,
                },
                success: function (data , status) {
                    Swal.fire({
                        title: "Deleted!",
                        text: deleteName + " has been deleted.",
                        icon: "success"
                      });
                      readRecords();
                }, 
                
            });
        
        }
      });
}

function editIt (updateId) {
    var editOp = true; 
    var editId = updateId;
    $.post("server.php", 
    {
        editOp : editOp, 
        editId : editId, 
    },
        function (data, status ) {
            var row = JSON.parse(data); 
            $("#edit_t1").val(row.name); 
            $("#edit_age").val(row.age); 
            $("#edit_phone").val(row.phone); 
            $("#edit_hidden_id").val(row.id); 
        });
        $("#updateModal").modal("show"); 
}


$("#updateBtn").click(function (e) { 
    e.preventDefault();

   let updated_name =  $("#edit_t1").val(); 
   let updated_age=  $("#edit_age").val(); 
   let updated_phone=  $("#edit_phone").val(); 
   let updated_id =  $("#edit_hidden_id").val();
    
   $.post("server.php", {
    updated_name : updated_name, 
    updated_age : updated_age , 
    updated_phone : updated_phone , 
    updated_id : updated_id , 
   },
    function (data, status) {
        Swal.fire({
            title: "Updated!",
            text: updated_name + " has been updated.",
            icon: "success"
          });
          readRecords();
   
     } );
});

