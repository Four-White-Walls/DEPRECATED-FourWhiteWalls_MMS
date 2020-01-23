jQuery(function($) {
    
    var $fbEditor = $(document.getElementById("fb-editor")),
      
    $formContainer = $(document.getElementById("fb-rendered-form")),

      fbOptions = {
        disabledActionButtons: ["data"],
        editOnAdd: true,
        disableFields: ["header"],
        scrollToFieldOnAdd: true,
        onSave: function() {
          $fbEditor.toggle();
          $("form", $formContainer).formRender({
            formData: formBuilder.formData
          });
          $formContainer.toggle();
          var xtitle = $("#formtitle").val();
          $("#form-title").text(xtitle);
          $("#form-title").toggle();
        }
      },

      formBuilder = $fbEditor.formBuilder(fbOptions);
  
    $(".edit-form", $formContainer).click(function() {
      $fbEditor.toggle();
      $formContainer.toggle();
      $("#form-title").toggle();
    });
  });