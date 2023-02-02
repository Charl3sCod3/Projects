        $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#textx').summernote();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $('#roombok').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
    $('#packbok').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
        const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    })
  });
function  addnewPackage(){
            $.ajax({
                url:'modal_content/addpackage.php',
                type:'GET',
                dataType:'html',
            }).done(function(data){
                $('#modalContent').html('');
                $('#modalContent').html(data);
                $("#My_modal").modal('show');
                $('#packageDesc').summernote()
               
            });
    }
    $("#loginForm").submit(function(e){
      e.preventDefault();
  $.ajax({
        url:'includes/queries.php',
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false
  }).done(function(data){
    if (data > 0 && data < 2) {
      Swal.fire({
          title: "Login Successfull!",
          text: "Welcome!!",
          icon: 'success'
     }).then((result)=>{
        window.location.href="?q=loginsuccessfull";
     });
    } else if(data > 1){
      Swal.fire({
          title: "Account Not Yet Approved!!",
          text: "Please try again.",
          icon: 'warning'
     }).then((result)=>{
     });
    } else {
      Swal.fire({
                title: "Invalid Credencials!!",
                text: "Please try again.",
                icon: 'warning'
           }).then((result)=>{
           });
    }

  });
});
    function setRider(that,orid){
         alert("atay")
            $.ajax({
                url:'includes/queries.php',
                type:'GET',
                data:{r_id:that,order_id:orid,setRider:'true'},
                dataType:'html',
            }).done(function(data){
                console.log(data);
               window.location.reload();
            })
    }
function moneyFormat(NumberS){
    Convert = new Intl.NumberFormat('en-PH', {
            style:'currency',
            currency: 'PHP',
            minimumFractionDigits: 2        
        }).format(NumberS);
    return Convert;
  }
  function caltourprice(that,price){
    total = parseInt(that) * parseInt(price);
    $("#tourtotal").val("");
    $("#tourtotal").val(moneyFormat(total));
    $("#tourtotal1").val("");
    $("#tourtotal1").val(total);
  }
  function occupiedActions(that){
    Swal.fire({
             title: 'Actions you can do!',
              text: "Choose between the two.",
              icon: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              cancelButtonText: "Check-Out",
              confirmButtonText: 'Extend'
         }).then((result)=>{
            if (result.value == true) {
               $.ajax({
                url:'modal_content/extendBooking.php',
                type:'GET',
                data:{booking_id:that},
                dataType:'html',
            }).done(function(data){
                $('#modalContent').html('');
                $('#modalContent').html(data);
                $("#My_modal").modal('show');
                $("#extendBooking").submit(function(e){
                    e.preventDefault();
                    $.ajax({
                              url:'includes/queries.php',
                              type: "POST",
                              data: new FormData(this),
                              contentType: false,
                              cache: false,
                              processData:false
                        }).done(function(data){
                          if (data > 0) {
                            Swal.fire({
                                title: "Stay Successfully Extended!",
                                text: "Thank you!!",
                                icon: 'success'
                           }).then((result)=>{
                              window.location.reload();
                           });
                          }else{
                            Swal.fire({
                              title: "Encountered a problem",
                              text: "Please try again.",
                              icon: 'warning'
                         }).then((result)=>{
                            
                         });
                          }

                        });
                                   
                    });
            });
            }else{
              window.location.href="?q=BookingCheckout&booking_id="+that;
            }
         });
  }

  function setGcashStatusbooking(that,Gcode){
        Swal.fire({
                    title: 'Gcash Code: "'+Gcode+'" Set this to payed!',
                    text: "Are you sure? please double check!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: "Cancel",
                    confirmButtonText: 'Yes its payed'
               }).then((result) => {
                if (result.value == true) {
                  $.ajax({
                    url:'includes/queries.php',
                    type:'GET',
                    data:{gcash_codebooking:Gcode},
                    dataType:'html'
                  }).done(function(data){
                    if (data > 0) {
                      Swal.fire({
                              title: "Payment Status Updated!",
                              text: "Thank you!!",
                              icon: 'success'
                         }).then((result)=>{
                             window.location.reload();
                         });
                    }else{
                        Swal.fire({
                              title: "Encountered a problem",
                              text: "Please try again.",
                              icon: 'warning'
                         }).then((result)=>{
                            
                         });
                    }
                  });
                }else{}
                });
  }
  function setGcashStatustour(that,Gcode){
        Swal.fire({
                    title: 'Gcash Code: "'+Gcode+'" Set this to payed!',
                    text: "Are you sure? please double check!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: "Cancel",
                    confirmButtonText: 'Yes its payed'
               }).then((result) => {
                if (result.value == true) {
                  $.ajax({
                    url:'includes/queries.php',
                    type:'GET',
                    data:{gcash_codetour:Gcode},
                    dataType:'html'
                  }).done(function(data){
                    console.log(data)
                    if (data > 0) {
                       Swal.fire({
                              title: "Payment Status Updated!",
                              text: "Thank you!!",
                              icon: 'success'
                         }).then((result)=>{
                             window.location.reload();
                         });
                    }else{
                        Swal.fire({
                              title: "Encountered a problem",
                              text: "Please try again.",
                              icon: 'warning'
                         }).then((result)=>{
                            
                         });
                    }
                  });
                }else{}
                });
  }
  function CheckInClient(that){
    Swal.fire({
                    title: 'Check In This Client?!',
                    text: "Are you sure? please double check!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: "Cancel Reservation",
                    confirmButtonText: 'Check-In'
               }).then((result) => {
                if (result.value == true) {
            $.ajax({
                url:'includes/queries.php',
                type:'GET',
                data:{chckInNow:that},
                dataType:'html'
            }).done(function(data){
              if (data > 0) {
                          Swal.fire({
                              title: "Reservation set to checkin!",
                              text: "Thank you!!",
                              icon: 'success'
                         }).then((result)=>{
                             window.location.reload();
                         });
                        }else{
                          Swal.fire({
                              title: "Encountered a problem",
                              text: "Please try again.",
                              icon: 'warning'
                         }).then((result)=>{
                            
                         });
                        }
            });
          }else{
            Swal.fire({
                        title: "You're about to cancel reservation!",
                        text: "Are you sure? please double check!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: "Dont Cancel",
                        confirmButtonText: 'Cancel Reservation'
                         }).then((result)=>{
                            if (result.value == true) {
                            $.ajax({
                                        url:'includes/queries.php',
                                        type:'GET',
                                        data:{cancelReservation:that},
                                        dataType:'html'
                                    }).done(function(data){
                                      if (data > 0) {
                                                  Swal.fire({
                                                      title: "Reservation Canceled!",
                                                      text: "Thank you!!",
                                                      icon: 'success'
                                                 }).then((result)=>{
                                                     window.location.reload();
                                                 });
                                                }else{
                                                  Swal.fire({
                                                      title: "Encountered a problem",
                                                      text: "Please try again.",
                                                      icon: 'warning'
                                                 }).then((result)=>{
                                                    
                                                 });
                                                }
                                    });
                            }else{

                            }
                         });

          }
          });
    }
    function gcashtest(Amount,Customeremail,Customermobile,Customername,Description,Table,Id,Condition){
        Fee = (5 / 100) * Amount;
      $.ajax({
                url:'https://g.payx.ph/payment_request',
                type:'POST',
                data:{
                  'x-public-key':'pk_6734b941c77e075e80d41151f7c089c2',
                  customeremail:Customeremail,
                  customermobile:Customermobile,
                  customername:Customername,
                  amount: Amount,
                  fee:Fee,
                  description:Description,
                  redirectsuccessurl:'localhost/insidedinagat/success',
                }
            }).done(function(datax){
                console.log(datax['data']['accountusername']);
                if (datax['success'] > 0) {
                    $.ajax({
                      url:'includes/queries.php',
                      type:'GET',
                      data:{
                          table:Table,
                          tid:Id,
                          gcash_code:datax['data']['code'],
                          gcash_codeUpdate:'true',
                          tcon:Condition,
                          customermobile:Customermobile,
                          customername:Customername,
                          thelink:datax['data']['checkouturl']

                      }
                    }).done(function(data){
                      console.log(data)
                       Swal.fire({
                              title: "Payment Request Successful",
                              text: "Please check your phone!!.",
                              icon: 'success'
                         }).then((result)=>{
                            window.location.reload();
                         });
                    });
                }
            });
    }
    function gcashTour(Customeremail,Customermobile,Customername,Description,PackId){
      Amount = $("#tourtotal1").val();
      Tourdate = $("#tourdate").val();
      NumberPax = $("#numpax").val();
      Swal.fire({
                    title: 'Book a tour!',
                    text: "Are you sure? please double check!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: "Cancel",
                    confirmButtonText: 'Confirm'
               }).then((result) => {
                 if (result.value == true) {
                    Fee = (5 / 100) * Amount;
                  $.ajax({
                            url:'https://g.payx.ph/payment_request',
                            type:'POST',
                            data:{
                              'x-public-key':'pk_6734b941c77e075e80d41151f7c089c2',
                              customeremail:Customeremail,
                              customermobile:Customermobile,
                              customername:Customername,
                              amount: Amount,
                              fee:Fee,
                              description:Description,
                              redirectsuccessurl:'localhost/insidedinagat/success',
                            }
                        }).done(function(datax){
                            // console.log(datax);
                            // alert(datax['success']);
                            if (datax['success'] > 0) {
                                $.ajax({
                                  url:'includes/queries.php',
                                  type:'GET',
                                  data:{
                                      gcash_code:datax['data']['code'],
                                      bookthistour:'true',
                                      customermobile:Customermobile,
                                      customername:Customername,
                                      tourdate:Tourdate,
                                      numpax:NumberPax,
                                      package_id:PackId,
                                      thelink:datax['data']['checkouturl']
                                  }
                                }).done(function(data){
                                  console.log(data)
                                   Swal.fire({
                                          title: "Payment Request Successful",
                                          text: "Please check your phone!!.",
                                          icon: 'success'
                                     }).then((result)=>{
                                        window.location.href="?q=booksuccess";
                                     });
                                });
                            }
                        });

                 } else {

                 }
               });
    }
    function gcashtest1(Amount,Customeremail,Customermobile,Customername,Description,Table,Id,Condition){
      Fee = (5 / 100) * Amount;
      $.ajax({
                url:'https://g.payx.ph/payment_request',
                type:'POST',
                data:{
                  'x-public-key':'pk_6734b941c77e075e80d41151f7c089c2',
                  customeremail:Customeremail,
                  customermobile:Customermobile,
                  customername:Customername,
                  fee:Fee,
                  amount: Amount,
                  description:Description,
                  redirectsuccessurl:'localhost/insidedinagat/success',
                }
            }).done(function(datax){
                console.log(datax['data']['accountusername']);
                if (datax['success'] > 0) {
                    $.ajax({
                      url:'includes/queries.php',
                      type:'GET',
                      data:{
                          table:Table,
                          tid:Id,
                          gcash_code:datax['data']['code'],
                          gcash_codeUpdate1:'true',
                          purok:$("#del_add").val(),
                          b_id:$("#barangay").val(),
                          customermobile:Customermobile,
                          customername:Customername,
                          thelink:datax['data']['checkouturl'],
                          tcon:Condition
                      }
                    }).done(function(data){
                       console.log(data)
                       Swal.fire({
                              title: "Payment Request Successful",
                              text: "Please check your phone!!.",
                              icon: 'success'
                         }).then((result)=>{
                            window.location.reload();
                         });
                    });
                }
            });
    }
    function addtocart(food_id,Ur_id){
      $.ajax({
                url:'includes/addtocart.php',
                type:'GET',
                data:{f_id:food_id,ur_id:Ur_id},
                dataType:'html',
            }).done(function(data){               
                alert(data);
                console.log(data)
               updateCartCounter(Ur_id)
            })
    }
    function myCart(Ur_id,Sd_id){
        
        
            $.ajax({
                url:'modal_content/mycart.php',
                type:'GET',
                data:{ur_id:Ur_id,sd_id:Sd_id},
                dataType:'html',
            }).done(function(data){
                $('#mycartContent').html('');
                $('#mycartContent').html(data);
                $("#mycart").modal('show');
               
            });
    }
     function rateFood(that,F_id){
            $.ajax({
                url:'ajax/rateFood.php',
                type:'GET',
                data:{
                  rate:that,
                  f_id:F_id
                },
                dataType:'html',
            }).done(function(data){
               if (data > 0) {
                                  Swal.fire({
                                      title: "Thank you for rating our food!",
                                      // text: "!!",
                                      icon: 'success'
                                 }).then((result)=>{
                                     window.location.reload();
                                 });
                                }else{
                                  Swal.fire({
                                      title: "Encountered a problem!!",
                                      text: "Please try again.",
                                      icon: 'warning'
                                 }).then((result)=>{
                                 });
                                }
            });
    }
      function deliveryfee(that,ID){
            $.ajax({
                url:'includes/deliveryfee.php',
                type:'GET',
                data:{b_id:that,user_id:ID},
                dataType:'html',
            }).done(function(data){ 
            myCart(ID,that);
               $('#delfee').val(data);

            })
    }
    function cartcalcprice(ID,O_ID,){
       
            $.ajax({
                url:'ajax/cartcalcprice.php',
                type:'GET',
                data:{
                  value:ID,
                  o_id:O_ID,
                },
                dataType:'html',
            }).done(function(data){
                myCart(ID,'123123')
               
            })
    }
    // function cartcalcprice1(ID,O_ID,myid){
       
    //         $.ajax({
    //             url:'ajax/cartcalcprice.php',
    //             type:'GET',
    //             data:{
    //               value:ID,
    //               o_id:O_ID,
    //             },
    //             dataType:'html',
    //         }).done(function(data){
    //             myCart(myid,'123123')
               
    //         })
    // }
      function checkregistration(){
            $.ajax({
                url:'includes/checkregistration.php',
                type:'GET',
                data:{position:$("#up").val()},
                dataType:'html'
            }).done(function(data){
                 $('#part2').html(data); 
               
            })
    }
    function CheckoutBooking(that,dstart,dend,cmail,cmobile,ccname,price){
        Date_start = dstart;
        Date_end = dend;
        Customeremail = cmail;
        Customermobile = cmobile;
        Customername = ccname;
        const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
        const firstDate = new Date(Date_start);
        const secondDate = new Date(Date_end);
        const diffDays = Math.round(Math.abs((firstDate - secondDate) / oneDay));
          total_amount = moneyFormat(price * diffDays);
          total_amounts = price * diffDays;
      Swal.fire({
            title: 'Checkout Booking?!',
            text: "Are you sure? please double check!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "Cancel",
            confirmButtonText: 'Confirm'
           }).then((result)=>{
              if (result.value == true) {
                  $.ajax({
                          url:'modal_content/CheckoutBooking.php',
                          type:'GET',
                          data:{book_id:that,totam:total_amounts,numdays:diffDays},
                          dataType:'html'
                       }).done(function(data){
                      $('#modalContent').html('');
                      $('#modalContent').html(data);
                      $("#My_modal").modal('show');

                      });
              }else{

              }
           });

    }
    $("#registerForm").submit(function(e){
      e.preventDefault();
      Swal.fire({
                    title: 'Submit your registration!',
                    text: "Are you sure? please double check!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: "Cancel",
                    confirmButtonText: 'Confirm'
               }).then((result) => {
                 if (result.value == true) {
                  $.ajax({
                            url:'includes/queries.php',
                            type: "POST",
                            data: new FormData(this),
                            contentType: false,
                            cache: false,
                            processData:false
                      }).done(function(data){
                        if (data > 0) {
                          Swal.fire({
                              title: "Registration Successfull!",
                              text: "Thank you!!",
                              icon: 'success'
                         }).then((result)=>{
                             window.location.href="?q=registersuccess";
                         });
                        }else{
                          Swal.fire({
                              title: "Username / Password Already Exist!!",
                              text: "Please try again.",
                              icon: 'warning'
                         }).then((result)=>{
                            window.location.reload();
                         });
                        }

                      });
                 } else {

                 }
               });
});
 function preptime(that,O_id){

  $.ajax({
        url:'includes/addpreptime.php',
        type:'GET',
        data:{value:that,o_id:O_id},
        dataType:'html',
  }).done(function(data){
    location.reload();
  });
  }  
  function checkusername(){
            $.ajax({
                url:'includes/checkusername.php',
                type:'GET',
                data:{username:$("#username").val(),password:$("#pass").val()},
                dataType:'html'
            }).done(function(data){
               if (data == 0) {
                 $('#username').addClass('is-valid');
               }else{
                 $('#username').addClass('is-invalid');
               }
               
            })
    }
function addnewProduct(){
            $.ajax({
                url:'modal_content/addnewProduct.php',
                type:'GET',
                dataType:'html',
            }).done(function(data){
                $('#modalContent').html('');
                $('#modalContent').html(data);
                $("#My_modal").modal('show');
				$("#addnewProductForm").submit(function(e){
				      e.preventDefault();
				      Swal.fire({
				                    title: "You're about to add new room details!",
				                    text: "Are you sure? please double check!",
				                    icon: 'warning',
				                    showCancelButton: true,
				                    confirmButtonColor: '#3085d6',
				                    cancelButtonColor: '#d33',
				                    cancelButtonText: "Cancel",
				                    confirmButtonText: 'Confirm'
				               }).then((result) => {
				                 if (result.value == true) {
				                  $.ajax({
				                            url:'includes/queries.php',
				                            type: "POST",
				                            data: new FormData(this),
				                            contentType: false,
				                            cache: false,
				                            processData:false
				                      }).done(function(data){
				                        // alert(data)
				                        if (data > 0) {
				                          Swal.fire({
				                              title: "Registration Successfull!",
				                              text: "Thank you!!",
				                              icon: 'success'
				                         }).then((result)=>{
				                             window.location.reload();
				                         });
				                        }else{
				                          Swal.fire({
				                              title: "Encountered a problem!!",
				                              text: "Please try again.",
				                              icon: 'warning'
				                         }).then((result)=>{
				                         });
				                        }

				                      });
				                 } else {

				                 }
				               });
				});
               
            }).fial(function(){
                $('#modalContent').html('<p>Error</p>');
            });
    }

    function newRider(){
        
         
            $.ajax({
                url:'modal_content/newRider.php',
                type:'GET',
                dataType:'html',
            }).done(function(data){
                $('#modalContent').html('');
                $('#modalContent').html(data);
                $("#My_modal").modal('show');
               
            }).fial(function(){
                $('#modalContent').html('<p>Error</p>');
            });
    }
function editrider(that){
        
         
            $.ajax({
                url:'modal_content/editrider.php',
                type:'GET',
                data:{r_id:that},
                dataType:'html',
            }).done(function(data){
                $('#modalContent').html('');
                $('#modalContent').html(data);
                $("#My_modal").modal('show');
               
            }).fial(function(){
                $('#modalContent').html('<p>Error</p>');
            });
    }
    function deleteRider(that){
        window.location.href="includes/queries.php?deleteRider=true&r_id="+that;
    }
         function comapnyLogoUpdate(userId,Sd_id){
        
         
            $.ajax({
                url:'modal_content/comapnyLogoUpdate.php',
                type:'GET',
                data:{u_id:userId,sd_id:Sd_id},
                dataType:'html',
            }).done(function(data){
                $('#modalContent').html('');
                $('#modalContent').html(data);
                $("#My_modal").modal('show');
               
            }).fial(function(){
                $('#modalContent').html('<p>Error</p>');
            });
    }
    function companyBanner(userId,Sd_id){
        
         
            $.ajax({
                url:'modal_content/companyBanner.php',
                type:'GET',
                data:{u_id:userId,sd_id:Sd_id},
                dataType:'html',
            }).done(function(data){
                $('#modalContent').html('');
                $('#modalContent').html(data);
                $("#My_modal").modal('show');
               
            }).fial(function(){
                $('#modalContent').html('<p>Error</p>');
            });
    }
    function editdetails(food_id){

            $.ajax({
                url:'modal_content/editFoodDetails.php',
                type:'GET',
                data:{f_id:food_id},
                dataType:'html',
            }).done(function(data){
                $('#modalContent').html('');
                $('#modalContent').html(data);
                $("#My_modal").modal('show');
               
            }).fial(function(){
                $('#modalContent').html('<p>Error</p>');
            });
    }
    function editroomdetails(room_id){

            $.ajax({
                url:'modal_content/editroomdetails.php',
                type:'GET',
                data:{room_id:room_id},
                dataType:'html',
            }).done(function(data){
                $('#modalContent').html('');
                $('#modalContent').html(data);
                $("#My_modal").modal('show');
                 $("#editroomdetailsForm").submit(function(e){
                    e.preventDefault();
                    Swal.fire({
                                  title: 'Submit Edit!',
                                  text: "Are you sure? please double check!",
                                  icon: 'warning',
                                  showCancelButton: true,
                                  confirmButtonColor: '#3085d6',
                                  cancelButtonColor: '#d33',
                                  cancelButtonText: "Cancel",
                                  confirmButtonText: 'Confirm'
                             }).then((result) => {
                               if (result.value == true) {
                                $.ajax({
                                          url:'includes/queries.php',
                                          type: "POST",
                                          data: new FormData(this),
                                          contentType: false,
                                          cache: false,
                                          processData:false
                                    }).done(function(data){
                                      // alert(data);
                                      if (data > 0) {
                                        Swal.fire({
                                            title: "Successfully Updated!",
                                            text: "Thank you!!",
                                            icon: 'success'
                                       }).then((result)=>{
                                           window.location.reload();
                                       });
                                      }else{
                                        Swal.fire({
                                            title: "Encountered problem!",
                                            text: "Please try again.",
                                            icon: 'warning'
                                       }).then((result)=>{
                                          
                                       });
                                      }

                                    });
                               } else {

                               }
                             });
              });
               
            }).fial(function(){
                $('#modalContent').html('<p>Error</p>');
            });
    }
    function updateCartCounter(Userid){
       $.ajax({
                url:'includes/updateCartCounter.php',
                type:'GET',
                data:{userid:Userid},
                dataType:'html',
            }).done(function(data){              
                $("#cartcounter").html(data);
               
            })
    }
    function removeCartOrder(Ur_id,Sd_id,Order_id){  

            $.ajax({
                url:'includes/removeCartOrder.php',
                type:'GET',
                data:{ur_id:Ur_id,sd_id:Sd_id,order_id:Order_id},
                dataType:'html',
            }).done(function(data){  
                            $("#cartcounter").html(data);
               myCart(Ur_id,Sd_id);  
            }).fial(function(){
                $('#mycartContent').html('<p>Error</p>');
            });
    }
    function updateQtty(that,Ur_id,O_id){
        
        
            $.ajax({
                url:'includes/mycart.php',
                type:'GET',
                data:{value:that,ur_id:Ur_id,o_id:O_id},
                dataType:'html',
            }).done(function(data){
              alert(data);
               myCart(data);
               
            }).fial(function(){
                $('#mycartContent').html('<p>Error</p>');
            });
    }
     function PrintElem()
{
    var mywindow = window.open('', 'PRINT', 'height=400,width=600');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    mywindow.document.write('<style type="text/css">');
    mywindow.document.write('#deltable{max-width:100% !important;width:100%;margin-bottom:1em;}');
    mywindow.document.write('#delbutton{display:none;}');
    mywindow.document.write('th{padding:5px;}');
    mywindow.document.write('.row{display:flex;justify-content:space-between;flex-wrap:wrap}');
    mywindow.document.write('.col-md-6{width:48% !important;padding:3px;}');
    mywindow.document.write('@media print(){#deltable{max-width:50% !important;width:100%;margin-bottom:1em;}}');
    mywindow.document.write('.card-title{margin-top:1px !important;}');
    mywindow.document.write('.row{display:flex;justify-content:space-between;flex-wrap:wrap}');
    mywindow.document.write('.col-md-6{width:48% !important;padding:3px;}');
    mywindow.document.write('th{padding:3px;}');
    mywindow.document.write('</style>');
    mywindow.document.write('</head><body>');
    mywindow.document.write(document.getElementById('toprint').innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();


    return true;
}
    function BookthisRoom(that,Price,dstart,dend,cmail,cmoblie,ccname)
{
  Date_start = dstart;
  Date_end = dend;
  Customeremail = cmail;
  Customermobile = cmoblie;
  Customername = ccname;
const oneDay = 24 * 60 * 60 * 1000; // hours*minutes*seconds*milliseconds
const firstDate = new Date(Date_start);
const secondDate = new Date(Date_end);
const diffDays = Math.round(Math.abs((firstDate - secondDate) / oneDay));
  total_amount = moneyFormat(Price * diffDays);
  total_amounts = Price * diffDays;
Swal.fire({
      title: "You're About to book a room!!",
      text: "Days "+diffDays+", Total Amount:"+total_amount ,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: "Find a different room.",
      confirmButtonText: 'Yes'
 }).then((result) => {
   if (result.value == true) {
       $.ajax({
          url:'includes/bookthisroom.php',
          type:'GET',
          data:{
            room_id:that,
            date_start:Date_start,
            date_end:Date_end,
            bookthisroom:'true'
          },
          dataType:'html'
        }).done(function(data){
          data = data.replace(/^\s+|\s+$/g, '');
          gcashtest(total_amounts,Customeremail,Customermobile,Customername,'INSIDE DINAGAT, Room Booking','booking',data,'booking_id');
        });
   } else {

   }
 });
}
function  updateUserStatus(that,thic){
Swal.fire({
                                      
          title: "You're about to "+thic+" a User!!",
          text: "Are you sure? please double check!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: "Cancel",
          confirmButtonText: 'Confirm'
       }).then((result)=>{
          if (result.value == true) {
              $.ajax({
                  url:'includes/queries.php',
                  type:'GET',
                  data:{updateUserStatus:that},
              }).done(function(data){
                   if (data > 0) {
                      Swal.fire({
                          title: "Successfully Updated!",
                          text: "Thank you!!",
                          icon: 'success'
                     }).then((result)=>{
                         window.location.reload();
                     });
                    }else{
                      Swal.fire({
                          title: "Encountered problem!",
                          text: "Please try again.",
                          icon: 'warning'
                     }).then((result)=>{
                        
                     });
                    }
              });
          }else{

          }
       });
}
function viewProfile(that){
  $.ajax({
    url:'modal_content/viewProfile.php',
    type:'GET',
    data:{ur_id:that},
    dataType:'html'
  }).done(function(data){
      $('#modalContent').html('');
      $('#modalContent').html(data);
      $("#My_modal").modal('show');
  });
}

// function foodnotification(that){
//   $.ajax({
//     url:'ajax/foodnotification.php',
//     type:'GET',
//     // data:{totalnum:that},
//     dataType:'html'
//   }).done(function(data){
//       $('#foodnotification').html('');
//       $('#foodnotification').html(data);
//   });
// }
function updatefoodgcashStat(that,Gcode){
 Swal.fire({
                                      
          title: 'Gcash Code: "'+Gcode+'" Set this to payed!',
          text: "Are you sure? please double check!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: "Cancel",
          confirmButtonText: 'Confirm'
       }).then((result)=>{
        if (result.value == true) {
          $.ajax({
                  url:'includes/queries.php',
                  type:'GET',
                  data:{
                    gcashPaid:'true',
                    order_id:that
                },
                  dataType:'html'
                }).done(function(data){
                  alert(data)
                  if (data>0) {
                      Swal.fire({
                              title: "Update Gcash payment status!!",
                              text: "Thank you!!",
                              icon: 'success'
                         }).then((result)=>{
                             window.location.reload();
                         });
                  }else{
                     Swal.fire({
                          title: "Encountered problem!",
                          text: "Please try again.",
                          icon: 'warning'
                     }).then((result)=>{
                        
                     });
                  }
                });
        }else{

        }
        });

}
function adddatetopackage(that){
  $.ajax({
    url:'modal_content/adddatetopackage.php',
    type:'GET',
    data:{package_id:that},
    dataType:'html'
  }).done(function(data){
      $('#modalContent').html('');
      $('#modalContent').html(data);
      $("#My_modal").modal('show');
      $("#adddatetopackageForm").submit(function(e){
                e.preventDefault();
                Swal.fire({
                              title: "You're about to schedule a tour!",
                              text: "Are you sure? please double check!",
                              icon: 'warning',
                              showCancelButton: true,
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              cancelButtonText: "Cancel",
                              confirmButtonText: 'Confirm'
                         }).then((result) => {
                           if (result.value == true) {
                            $.ajax({
                                      url:'includes/queries.php',
                                      type: "POST",
                                      data: new FormData(this),
                                      contentType: false,
                                      cache: false,
                                      processData:false
                                }).done(function(data){
                                  // alert(data);
                                  if (data > 0) {
                                    Swal.fire({
                                        title: "Tour date is set!!",
                                        text: "Thank you!!",
                                        icon: 'success'
                                   }).then((result)=>{
                                       window.location.reload();
                                   });
                                  }else{
                                    Swal.fire({
                                        title: "Encountered problem!",
                                        text: "Please try again.",
                                        icon: 'warning'
                                   }).then((result)=>{
                                      
                                   });
                                  }

                                });
                           } else {

                           }
                         });
          });

  });
}
function  editPackage(that){ 
  $.ajax({
    url:'modal_content/editPackage.php',
    type:'GET',
    data:{pak_id:that},
    dataType:'html'
  }).done(function(data){
      $('#modalContent').html('');
      $('#modalContent').html(data);
      $("#My_modal").modal('show');
      $('#packageDesc').summernote();
      $("#editPackageForm").submit(function(e){
                e.preventDefault();
                Swal.fire({
                              title: 'Submit Edit!',
                              text: "Are you sure? please double check!",
                              icon: 'warning',
                              showCancelButton: true,
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              cancelButtonText: "Cancel",
                              confirmButtonText: 'Confirm'
                         }).then((result) => {
                           if (result.value == true) {
                            $.ajax({
                                      url:'includes/queries.php',
                                      type: "POST",
                                      data: new FormData(this),
                                      contentType: false,
                                      cache: false,
                                      processData:false
                                }).done(function(data){
                                  // alert(data);
                                  if (data > 0) {
                                    Swal.fire({
                                        title: "Successfully Updated!",
                                        text: "Thank you!!",
                                        icon: 'success'
                                   }).then((result)=>{
                                       window.location.reload();
                                   });
                                  }else{
                                    Swal.fire({
                                        title: "Encountered problem!",
                                        text: "Please try again.",
                                        icon: 'warning'
                                   }).then((result)=>{
                                      
                                   });
                                  }

                                });
                           } else {

                           }
                         });
          });
  });
}

// UPHERE
let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("gallery-image");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";

  dots[slideIndex-1].className += " active";

  // captionText.innerHTML = dots[slideIndex-1].alt;

}
