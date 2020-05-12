$(document).ready(function() {
  console.log('loaded');
      gettotal();
      var total = 0;
      $("[href]").each(function() {
        if (this.href == window.location.href) {
            $(this).addClass("active");
        }
      });

      $('.tickettype').on('change', function() {
        gettotal();
      });


      function gettotal(){
        total=0;
        $(".tickettype").each(function(){
          console.log(this);
          if(this.value=="Adult")
            total+=5;
          else if (this.value=="Senior") {
            total+=4;
          }
          else if (this.value=="Student") {
            total+=3;
          }
          else if (this.value=="Child") {
            total+=2;
          }
        });
        $(".total").empty();
        $(".total").append("<h5>Your current total is <span style='text-align: right'>$" + total + ".00</span></h5>");

        console.log(total);
      }

      function myFunction() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
          x.style.display = "block";
        } else {
          x.style.display = "none";
        }
      }



});
