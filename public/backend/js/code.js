 $(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
 
  
                  Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete This Data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                    }
                  }) 
 
    });
 
  });






  $(function(){
    $(document).on('click','#confirm',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
 
  
                  Swal.fire({
                    title: 'Are you sure to confirm ?',
                    text: "one Confirm you will not be eble to pending again ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Confirm it !'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'confirm!',
                        'Confirm Changes.',
                        'success'
                      )
                    }
                  }) 
 
    });
 
  });




  $(function(){
    $(document).on('click','#proccessing',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
 
  
                  Swal.fire({
                    title: 'Are you sure to proccessing ?',
                    text: "one proccessing you will not be eble to confirm again ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, proccessing it !'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'proccessing!',
                        'proccessing Changes.',
                        'success'
                      )
                    }
                  }) 
 
    });
 
  });





  
  $(function(){
    $(document).on('click','#picked',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
 
  
                  Swal.fire({
                    title: 'Are you sure to picked ?',
                    text: "one picked you will not be eble to proccessing again ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, picked it !'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'picked!',
                        'picked Changes.',
                        'success'
                      )
                    }
                  }) 
 
    });
 
  });