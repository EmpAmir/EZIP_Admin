// Ajax req for retreive data
$(document).ready(function () {
  function showdata() {
    output1 = "";
    $.ajax({
      url: "buy/retrieve.php",
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
          output1 +=
            "<tr><td>" +
            x[i].id +
            "</td><td>" +
            x[i].user_id +
            "</td><td>" +
            x[i].usdt_rate +
            "</td><td>" +
            x[i].usdt_total +
            "</td><td>" +
            x[i].inr_total +
            "</td><td>" +
            x[i].order_date +
            "</td></tr>";
            // <td> <button class='btn btn-warning btn-sm btn-edit'data-sid=" +
            // x[i].id +
            // "><i class='bi bi-pencil-square'></i></button> <button class='btn btn-danger btn-sm btn-del' data-sid=" +
            // x[i].id +
            // "><i class='bi bi-trash-fill'></i></button></td>
        }
        $("#tbody").html(output1);
      },
    });
  }
  showdata();
  // Ajax req for insert data
  $("#btnBuy").click(function (e) {
    e.preventDefault();
    let stid = $("#id").val();
    let nm = $("#usdt_rate").val();
    let em = $("#usdt_total").val();
    let pw = $("#inr_total").val();
    mydata = { id: stid, usdt_rate: nm, usdt_total: em, inr_total: pw };
    console.log(mydata);
    $.ajax({
      url: "buy/insert.php",
      method: "POST",
      data: JSON.stringify(mydata),
      success: function (data) {
        // console.log(data);
        msg = "<div>" + data + "</div>";
        $("#msg").html(msg);
        $("#myForm")[0].reset();
        showdata();
      },
    });
  });

  // Ajax delete for  data
  $("tbody").on("click", ".btn-del", function () {
    // console.log("delete");
    let id = $(this).attr("data-sid");
    // console.log(id);
    mydata = { sid: id };
    mythis = this;
    $.ajax({
      url: "buy/.php",
      method: "POST",
      data: JSON.stringify(mydata),
      success: function (data) {
        if (data == 1) {
          msg =
            "<div class='alert-danger text-center mt-2'>Student Deleted Sucessfully!!</div>";
          $(mythis).closest("tr").fadeOut();
        } else if (data == 0) {
          msg =
            "<div class='alert-danger text-center'>Unable to Delete!!</div>";
        }
        // console.log(data);
        $("#msg").html(msg);
        // showdata();
      },
    });
  });
  // Ajax editing for  data
  $("tbody").on("click", ".btn-edit ", function () {
    console.log("Edit Btn Clicked");
    let id = $(this).attr("data-sid");
    // console.log(id);
    mydata = { sid: id };
    $.ajax({
      url: "buy/edit.php",
      method: "POST",
      dataType: "JSON",
      data: JSON.stringify(mydata),
      success: function (data) {
        // console.log(data);
        $("#id").val(data.id);
        $("#usdt_rate").val(data.usdt_rate);
        $("#usdt_total").val(data.usdt_total);
        $("#inr_total").val(data.inr_total);
      },
    });
  });
});
