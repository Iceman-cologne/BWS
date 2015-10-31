/**
 * @author aysun sunay
 */
$(document).ready(function() {
    function close_accordion_section() {
        $('.accordion .accordion-section-title').removeClass('active');
        $('.accordion .accordion-section-content').slideUp(300).removeClass('open');
    }
 
    $('.accordion-section-title').click(function(e) {
        // Grab current anchor value
        var currentAttrValue = $(this).attr('href');
 
        if($(e.target).is('.active')) {
            close_accordion_section();
        }else {
            close_accordion_section();
 
            // Add active class to section title
            $(this).addClass('active');
            // Open up the hidden content panel
            $('.accordion ' + currentAttrValue).slideDown(300).addClass('open'); 
        }
 
        e.preventDefault();
    });



//var theChoice1 = $('input:radio[name=comp-value1]:checked').val();
//var theChoice2 = $('input:radio[name=comp-value2]:checked').val();

//if(theChocie1 == theChoice2) {
  //  alert("es ist falsch");
//}





    $('input[type=radio]').on('click',function(e){
        var changedRadio = $(this).attr("value");
        var same = true;
        

        $('input:checked').each(function(){
            
            if($(this).attr("value") != changedRadio){
                same = false;
               
            }
        });

        if(same == true){
            $(".errorRadio").show().delay(5000).fadeOut();
            alert("Das geht nicht");
        
            e.preventDefault();
        }
    });
});