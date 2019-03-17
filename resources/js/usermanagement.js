$(function () { $("input,select").not("[type=submit]").jqBootstrapValidation({
        preventSubmit:true,
        submitError:function($form,event,errors)
        {},
        submitSuccess:function($form,event)
        {
        event.preventDefault();
        var firstname=$("input#firstName").val();
        var lastname=$("input#lastName").val();
        var email=$("input#email").val();
        var password=$("input#upassword").val();
        var mobile=$("input#mobile").val();
        var address=$("input#address").val();
        var usertype=$("input#usertype").val();
        var volentierid=Math.random().toString(36).substring(2, 15);
     
        $.ajax({
        url:"",
        type:"POST",
        data:{firstname:firstname,lastname:lastname,email:email,password:password,mobile:mobile,address:address,volentierid:volentierid,usertype:usertype},
        cache:false,
        success:function(){
        $("#form")[0].reset();
        $('#success').html("<div class='alert alert-success'>");
          $('#success>.alert-success')
          .append("<strong>New member "+firstname+' '+lastname+" added on the list."+" ID is"+volentierid+"</strong>");
          $('#success>.alert-success')
        .append('</div>');
        $('#contact').trigger("reset");
        },
        //success message generate korbea
        error:function(){
        $('#success').html("<div class='alert alert-danger'>");
          $('#success>.alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
          .append("</button>");
          $('#success>.alert-danger')
          .append("<strong>Error,Contact with administrator.</strong>");
          $('#success>.alert-danger')
        .append('</div>');
        $('#form').trigger("reset");
        },
        });
        },
        filter:function()
        {
        return $(this).is(":visible");
        },
        }); } );
        $(document).ready(function(){
        $('.deletevolentier').click(function(){
        var volentierid=this.id;
        $.ajax({
        url:"volentier/deletevolenter.php",
        type:"POST",
        data:{volentierid:volentierid},
        cache:false,
        success:function(){
        $('#volentierremovemodal').modal('show');
        
        },
        error:function(){
        $('#success').html("<div class='alert alert-danger'>");
          $('#success>.alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
          .append("</button>");
          $('#success>.alert-danger')
          .append("<strong>Error,Contact with administrator.</strong>");
          $('#success>.alert-danger')
        .append('</div>');
        $('#contact').trigger("reset");
        },
        });
        
        });
        });
        function myFunction() {
        location.reload();
        }