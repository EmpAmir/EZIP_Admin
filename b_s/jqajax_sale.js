// Ajax req for retreive data
$(document).ready(function () {
  function showdata1() {
    output = "";
    var s = 1;
    $.ajax({
      url: "b_s/retrieve_sale.php",
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
          output +=
            "<tr><td>" +
            s + 
            "</td><td>" +
            x[i].user_id +
            "</td><td>" +
            x[i].inr_total +
            "</td><td>" +
            x[i].utr +
            "</td><td>" +
            x[i].sale_date +
            "</td><td> <button class='btn btn-warning btn-sm btn-sedit' data-sid=" +
            x[i].id +
            "><i class='bi bi-pencil-square'></i></button></td></tr>";
            s++;
        }
        $("#usbody").html(output);
      },
    });
  }
  showdata1();

  // Ajax req for insert data
  $("#btnSale").click(function (e) {
    e.preventDefault();
    let stid = $("#id").val();
    let uid = $("#user_id").val();
    let nm = $("#inr_stotal").val();
    let em = $("#utr").val();
    mydata = { id: stid, user_id: uid, inr_total: nm, utr: em};
    console.log(mydata);
    $.ajax({
      url: "sale/insert_sale.php",
      method: "POST",
      data: JSON.stringify(mydata),
      success: function (data) {
        console.log(data);
        msg1 = "<div>" + data + "</div>";
        $("#msg1").html(msg1);
        $("#saleForm")[0].reset();
        showdata1();
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
      url: "sale/delete_sale.php",
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
        // showdata1();
      },
    });
  });
// Ajax editing for  data
$("tbody").on("click", ".btn-sedit ", function () {
  console.log("Edit Btn Clicked");
  let id = $(this).attr("data-sid");
  mydata = { sid: id };
  $.ajax({
    url: "sale/edit_sale.php",
    method: "POST",
    dataType: "JSON",
    data: JSON.stringify(mydata),
    success: function (data) {
      console.log(data);
      $("#id").val(data.id);
      $("#inr_stotal").val(data.inr_total);
      $("#utr").val(data.utr);
    },
  });
});
});
