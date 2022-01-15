     function initMenu() {
      $('#menu ul').hide();
      $('#menu ul').children('.current').parent().show();
      //$('#menu ul:first').show();
      $('#menu li a').click(
        function() {
          var checkElement = $(this).next();
          if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
            return false;
            }
          if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
            $('#menu ul:visible').slideUp('normal');
            checkElement.slideDown('normal');
            return false;
            }
          }
        );
      }
    $(document).ready(function() {
      initMenu();

$('.seekeractivecheck').change(function() {
  var $seekeractivecheck = $(this).attr("id");
  
    var $status = 0;
      var ischecked= $("#"+$seekeractivecheck).is(':checked');
      if(ischecked){
        $status = 1;
      }else{
        $status = 0;
      }
      
       $.ajax({
        type: "POST",
        url: "useractivate.php",
        data:{id:$seekeractivecheck,status:$status},
        success: function(data){
           
        }
      });
  

 });




    });