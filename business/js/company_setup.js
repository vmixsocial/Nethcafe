
 $('.companyedit').click(function(){
 	    $('.modal-title-company').html("");
        $('#companyid').val("");
        $('#ecompanyname').val("");
        $('#ecompanyaddress').val("");
        $('#ecompanycontact').val("");
        $('#ecompanylandline').val("");
        $('#ecompanymail').val("");

        var compid = $(this).attr('data-compid');
        var company = $(this).attr('data-company');
        var address = $(this).attr('data-address');
        var contact = $(this).attr('data-contact');
        var landline = $(this).attr('data-landline');
        var email = $(this).attr('data-email');

        $('.modal-title-company').html("Edit "+company);
         $('#companyid').val(compid);
        $('#ecompanyname').val(company);
        $('#ecompanyaddress').val(address);
        $('#ecompanycontact').val(contact);
        $('#ecompanylandline').val(landline);
        $('#ecompanymail').val(email);

    });
 
    $('.deptedit').click(function(){
 	    $('.modal-title-dept').html("");
        $('#edeptid').val("");
        $('#edeptname').val("");
        
        var depid = $(this).attr('data-depid');
        var depname = $(this).attr('data-depname');
    
        $('.modal-title-dept').html("Edit "+depname+" Department");
        $('#edeptid').val(depid);
        $('#edeptname').val(depname);
    });


   
    

