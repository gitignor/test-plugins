/*jQuery(document).ready(function ($) {
  $("#subscriber-form").submit(function (e) {
    e.preventDefault();
    // Serialize form

    var subscriberData = $("#subscriber-form").serialize();

    // Submit form
    $.ajax({
      type: "post",
      url: $("#subscriber-form").attr("action"),
      data: subscriberData,
    })
      .done(function (response) {
        // If success
        $("#form-msg").removeClass("error");
        $("#form-msg").addClass("success");

        // Set Message Text
        $("#form-msg").text(response);

        // Clear fields
        $("#name").val("");
        $("#email").val("");
      })
      .fail(function (data) {
        // If error
        $("#form-msg").removeClass("success");
        $("#form-msg").addClass("error");

        if (data.responseText !== "") {
          // Set Message Text
          $("#form-msg").text(data.responseText);
        } else {
          $("#form-msg").text("Message was not send");
        }
      });
  });
});
*/
