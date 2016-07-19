


  //-----------------------------------------------------------------------------------------
  //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });


//GetCompany---------------------------------------------------------------------------------------------







//GetUserType CRUD---------------------------------------------------------------------------------------------

  function apiGetUserTypeByCode() {
    var code = $('#getUserType_code').val();
    $.ajax({
      url: "/api/UserType/" + code , 
      success: function(result){
        $("#getUserType_desc").val(result.desc);
        
        $("#getUserType_notes").val(result.notes);
      
      }
    });
  }  
  $('#getUserType_code').change(function(){
    apiGetUserTypeByCode();
  });
  $('#formGetUserType').on('keyup keypress', function(e) {
     var keyCode = e.keyCode || e.which;
    if (keyCode === 13) { 
      e.preventDefault();
      apiGetUserTypeByCode();
    }
  });
  $("#getUserType_new").click(function(){
      $("#getUserType_code").val("");
      $("#getUserType_desc").val("");
      $("#getUserType_notes").val("");
     
    
  });
  $("#getUserType_delete").click(function(){
    var previousRecord = $('#previousRecord').val();
      if($("#getUserType_code").val() != ""){
        output = confirm('Are you sure you want to delete this item?');
        if(output == true){
          var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
          $.ajax({
              url: '/deleteUserType/' + $("#getUserType_code").val() ,
              type: 'POST',
              data: {_token: CSRF_TOKEN},
              success: function(result) {
                  // Do something with the result
                alert('Item deleted successfully!')
                location.href = "/usertype/" + previousRecord;
              },
               error: function(jqXHR, textStatus, errorThrown) {
                  // report error
                console.log(jqXHR);
                

              }
          });
        }
      }
  });


//GetUser CRUD---------------------------------------------------------------------------------------------
  

 
  function apiGetUserByUsername() {
    var username = $('#getUser_username').val();
    $.ajax({
      url: "/api/user/" + username , 
      success: function(result){
        if(result.id != null){
          UserMapper(result);
        }else{
          return false;
        }
      }
    });
  }
  function apiGetUserByID(id){
    $.ajax({
      url: "/api/user/id/" + id , 
      success: function(result){
        if(result.id != null){
          UserMapper(result);
        }else{
          return false;
        }
      
      }
    });
  }
  

  $('#getUser_username').change(function(){
   
    apiGetUserByUsername();
     
    
  });
  $('#formGetUser').on('keyup keypress', function(e) {
     var keyCode = e.keyCode || e.which;
    if (keyCode === 13) { 
      e.preventDefault();
      apiGetUserByCode();
    }
  });
  $("#getuser_new").click(function(){
     clearUserForm();
  });
  $("#getuser_delete").click(function(){

      if($("#getUser_username").val() != ""){
        output = confirm('Are you sure you want to delete this user?');
        if(output == true){
          var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
          $.ajax({
              url: '/deleteUser/username/' + $("#getUser_username").val() ,
              type: 'POST',
              data: {_token: CSRF_TOKEN},
              success: function(result) {
                  // Do something with the result
                alert('Item deleted successfully!')
                location.href = "/user/" . $("#previousRecord").val();
              },
               error: function(jqXHR, textStatus, errorThrown) {
                  // report error
                console.log(jqXHR);
                

              }
          });
        }
      }
  });
//general controls ------------------------------------------
  
  function clearUserForm(){     
      $("#getUser_username").val("");
      $("#getUser_name").val("");
      $("#getUser_email").val("");
      $("#getUser_employeeSubstituteKey").val("");
      $("#getUser_employee").val("");
  
      $("#getUser_status option[value='']").prop('selected', true);
      $("#getUser_UserType option[value='']").prop('selected', true);
      $("#getUser_employee option[value='']").prop('selected', true);
    
  }
  function UserMapper(User){
    //getUser
      $("#getUser_username").val(User.username);
      $("#getUser_name").val(User.name);
      $("#getUser_status option[value='" + User.status + "']").prop('selected', true);
      $("#getUser_email").val(User.email);
      $("#getUser_UserType option[value='" + User.usertype_code + "']").prop('selected', true);
      var Employee;
      $("#getUser_UserModel").val(User);
     

  }