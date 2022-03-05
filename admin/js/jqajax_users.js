// Ajax req for retreive data
$(document).ready(function () {
  function showdata2() {
    output2 = "";
    $.ajax({
      url: "users/retrieve_users.php",
      method: "GET",
      dataType: "json",
      success: function (data) {
        // console.log(data);
        if (data) {
          x = data;
        } else {
          x = "";
        }
        for (i = 0; i < x.length; i++) {
          output2 +=
            "<tr><td>" +
            x[i].id +
            "</td><td>" +
            x[i].username +
            "</td><td>" +
            x[i].user_id +
            "</td><td>" +
            x[i].userPass +
            "</td><td>" +
            x[i].mobile +
            "</td><td>" +
            x[i].user_date +
            "</td><td> <button class='btn btn-warning btn-sm btn-uedit' data-sid=" +
            x[i].id +
            "><i class='bi bi-pencil-square'></i></button> <button class='btn btn-danger btn-sm btn-udel' data-sid=" +
            x[i].id +
            "><i class='bi bi-trash-fill'></i></button></td></tr>";
        }
        $("#ubody").html(output2);
      },
    });
  }
  showdata2();

  // Ajax req for insert data
  $("#btnUser").click(function (e) {
    e.preventDefault();
    let stid = $("#id").val();
    let nm = $("#username").val();
    let uid = $("#user_id").val();
    let pw = $("#password").val();
    let mb = $("#mobile").val();
    mydata = { id: stid, username: nm, user_id: uid, password: pw, mobile: mb};
    console.log(mydata);
    $.ajax({
      url: "users/insert_users.php",
      method: "POST",
      data: JSON.stringify(mydata),
      success: function (data) {
        console.log(data);
        msg1 = "<div>" + data + "</div>";
        $("#msg1").html(msg1);
        $("#userForm")[0].reset();
        showdata2();
      },
    });
  });

  // Ajax delete for  data
  $("tbody").on("click", ".btn-sdel", function () {
    // console.log("delete");
    let id = $(this).attr("data-sid");
    // console.log(id);
    mydata = { sid: id };
    mythis = this;
    $.ajax({
      url: "users/delete_users.php",
      method: "POST",
      data: JSON.stringify(mydata),
      success: function (data) {
        if (data == 1) {
          msg1 =
            "<div class='alert-danger text-center mt-2'>Student Deleted Sucessfully!!</div>";
          $(mythis).closest("tr").fadeOut();
        } else if (data == 0) {
          msg1 =
            "<div class='alert-danger text-center'>Unable to Delete!!</div>";
        }
        // console.log(data);
        $("#msg1").html(msg1);
        // showdata2();
      },
    });
  });
// Ajax editing for  data
$("tbody").on("click", ".btn-uedit ", function () {
  console.log("Edit Btn Clicked");
  let id = $(this).attr("data-sid");
  mydata = { sid: id };
  $.ajax({
    url: "users/edit_users.php",
    method: "POST",
    dataType: "JSON",
    data: JSON.stringify(mydata),
    success: function (data) {
      console.log(data);
      $("#id").val(data.id);
      $("#username").val(data.username);
      $("#user_id").val(data.user_id);
      $("#password").val(data.userPass);
      $("#mobile").val(data.mobile);
    },
  });
});
});
