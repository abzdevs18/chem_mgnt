// require('./modules.js');
import { log, showAlertFloat } from './modules.js';
// import htmlToImage from 'html-to-image';
// import moment from 'moment';

// let m = moment('Jun 22 2020 10:11 AM', 'lll');
// console.log(m.fromNow());

var URL_ROOT = "";
let currentPage = window.location.pathname;
if(currentPage == '/admin/request'){
  // Get Chemical request
  $.ajax({
    url: '/admin/getChemRequest',
    type: 'POST',
    dataType: 'json',
    success: function(data){
      for (var i = 0; i < data.length; i++) {
      let time = moment(data[i].dateReq + ' ' +data[i].timeReq,'lll');
      let isToday = time.isSame(new Date(),"day");
      let eventTime = "";
      if(isToday){
        eventTime += time.fromNow();
      }else{
        eventTime += data[i].dateReq;
      }
      let uType = "";
      if(data[i].uType == 1){
        uType += `<span class="ch-request-status" style="background: var(--ch-request-decline);color: #fff;">Faculty</span>`;
      }else{
        uType += `<span class="ch-request-status" style="background: var(--dispose-properly-label);color: #fff;">Student</span>`;
      }
      let item = `
      <tr class="req_logs_" data-rowId="#contentId`+i+`" id="pending3">
        <td style="text-align: center;" class="ch-selection-item-action">
          <div class="ch-checkbox-item" data-checked></div>
          <!-- <input type="checkbox" name=""> -->
        </td>
        <td class="ch-row-second" style="max-width: 150px;">
          <div class="request_icon_wrapper">
            <div class="req_icon">
              <span style="text-transform: uppercase;">`+data[i].fname.charAt(0)+`</span>
            </div>
            <div class="cc-name" style="margin:5px;margin-top:0px;">
              <h3>`+data[i].fname+` `+data[i].lname+`</h3>
              <time datetime="2017-08-08">`+eventTime+`</time>
            </div>
          </div>
        </td>
        <td class="tittle-id">
          <span class="ch-request-status" style="background:none;">`+uType+`</span>
          <!-- <h3>Student</h3> -->
        </td>
        <td class="tittle-id">
          <h3>`+data[i].department+` Department</h3>
        </td>
        <td>
          <span>`+data[i].norsu_id+`</span>
        </td>
        <td>
          <span class="ch-request-status">Pending</span>
        </td>
        <td class="action-btn">
          <span class="eye things-notdone" data-jId="`+data[i].req_id+`"><i class="fal fa-eye"></i></span>
          <span class="pencil" data-jId="`+data[i].req_id+`"><i class="fal fa-pencil-alt"></i></span>
          <span class="trash" data-jId="`+data[i].req_id+`"><i class="fal fa-trash"></i></span>
        </td>
      </tr>
      <tr id="contentId`+i+`" class="containerCollapse collapse" style="background:#2B2F3E;">
        <td colspan="2">
          <div style="width:220px;">
            <canvas class="dreData_`+i+`" width="110"></canvas>
          </div>
        </td>
        <td colspan="5">
          <button class="req_approve" data-reqid="`+data[i].req_id+`">Approve</button>
        </td>
      </tr>`;
        // Firefox 1.0+
        var isFirefox = typeof InstallTrigger !== 'undefined';
        if(isFirefox){
          $(".ch-selection-item-action").css({
            "top":"0"
          });
        }
        $('.chem_req_dash').append(item);
        let req_quantity = data[i].req_quantity;
        let chem_quantity = data[i].chemical_quantity;
        // And for a doughnut chart
        var sd = document.getElementsByClassName("dreData_"+i+"")[0].getContext("2d");
        var asd = new Chart(sd, {
          type: "doughnut",
          data: {
            datasets: [
              {
                data: [req_quantity, chem_quantity-req_quantity],
                backgroundColor: [
                  "rgb(120, 146, 161)",
                  "rgb(63, 75, 87)"
                ],
                borderColor: [
                  "rgb(120, 146, 161)",
                  "rgb(63, 75, 87)"
                ],
                borderWidth: 1
              }
            ]
          }
        });
      }
      paginator({
          table: document.getElementsByClassName("cc_tbl_pagination")[0].getElementsByTagName("table")[0],
          box: document.getElementsByClassName("index_native")[0],
        active_class: "color_page",
        rows_per_page: document.getElementsByClassName("index_native")[0].getAttribute("data-rows") 
      });
    }
  });
}else{
  $(document).ready(function(){
    $.ajax({
      url: '/admin/getJsonLogs',
      type: 'POST',
      dataType: 'json',
      success: function(data){
        for (var i = 0; i < data.length; i++) {
        let time = moment(data[i].date + ' '+data[i].time,'lll');
        let isToday = time.isSame(new Date(),"day");
        let eventTime = "";
        if(isToday){
          eventTime += time.fromNow();
        }else{
          eventTime += data[i].date;
        }
        let item = `
              <li style="display:flex;flex-direction:row;justify-content:space-between;">
                <div>
                <h3><span style="text-transform:capitalize;font-weight:bold;">`+data[i].name+`</span> `+data[i].event+` - Req. Origin: `+data[i].position+`</h3>          
                <time>`+eventTime+`</time>
                </div>
                <span class="tg-adverified"><i class="fal fa-atom" style="padding-right:5px;"></i> user identification</span>
              </li>`;
          $('#mCSB_10_container').append(item);
        }
      }
    });
    // Get current request
    $.ajax({
      url: '/admin/getSignupReqLogs',
      type: 'POST',
      dataType: 'json',
      success: function(data){
        for (var i = 0; i < data.length; i++) {
        let time = moment(data[i].date + ' ' +data[i].time,'lll');
        let isToday = time.isSame(new Date(),"day");
        let eventTime = "";
        if(isToday){
          eventTime += time.fromNow();
        }else{
          eventTime += data[i].date;
        }
        let item = `
          <li style="background: #ff00001f;padding: 10px;border-radius: 4px;margin-bottom: 4px;">							
            <span class="tg-adverified cat_chemical" style="width:auto;display:inline-block;">`+data[i].department +` Department</span>
            <h3>`+data[i].firstname +` `+data[i].lastname +`</h3>
            <time datetime="2017-08-08">`+eventTime+`</time>									
          </li>`;
          $('#mCSB_9_container').append(item);
        }
      }
    });
    // Get Chemical request
    $.ajax({
      url: '/admin/getChemRequest',
      type: 'POST',
      dataType: 'json',
      success: function(data){
        for (var i = 0; i < data.length; i++) {
        let time = moment(data[i].dateReq + ' ' +data[i].timeReq,'lll');
        let isToday = time.isSame(new Date(),"day");
        let eventTime = "";
        if(isToday){
          eventTime += time.fromNow();
        }else{
          eventTime += data[i].dateReq;
        }
        let uType = "";
        let backG = "";
        if(data[i].uType == 1){
          backG += "rgba(226, 68, 92, 0.21)";
          uType += `<span class="tg-adverified" style="background: var(--ch-request-decline);color: #fff;"><i class="fal fa-atom" style="padding-right:5px;"></i> Faculty</span>`;
        }else{
          backG += "#004D4029";
          uType += `<span class="tg-adverified" style="background: var(--dispose-properly-label);color: #fff;"><i class="fal fa-atom" style="padding-right:5px;"></i> Student</span>`;
        }
        let item = `
              <li style="background: `+backG+`;padding: 10px;border-radius: 4px;margin-bottom: 4px;">`+uType+`
                <div class="request_icon_wrapper">
                  <div class="req_icon" style="margin-top:13px;">
                    <span style="text-transform: uppercase;">`+data[i].fname.charAt(0)+`</span>
                    <!-- <img src="/img/icons/danger.png" alt="" style="width:100%;"> -->
                  </div>
                  <div style="margin:5px;" class="m_notif_content">
                    <b>`+data[i].fname+` `+data[i].lname+`</b>
                    <h3 style="white-space: unset;margin-bottom: 5px;"><span style="text-transform:uppercase">`+data[i].chemName+`</span> <em class="req_formula_listing">(`+htmlDecode(data[i].chemFormula)+`)<em/> - `+data[i].reqPurpose+`</h3>
                    <time datetime="2017-08-08">`+eventTime+`</time>
                  </div>
                </div>                  
              </li>`;
          $('#mCSB_11_container').append(item);
        }
      }
    });
  });
  console.log(currentPage);
}
$(document).on('click','.req_approve', function(){
  let id = $(this).attr("data-reqid");
  $.ajax({
    url: URL_ROOT + "/Admin/approve_req",
    type: "POST",
    dataType: "json",
    data:{
      req_id:id
    },
    success:function(data){
      if(data['status'] == 1){
        socket.emit("req_approve",data);
      }
      console.log(data);
    },
    error:function(err){
      console.log(err)
    }
  });
});
// import { log, showAlertFloat } from './modules';

$(document).on("click", ".save-btn", function (e) {
  e.preventDefault();
  var data = $("#chemicalAdd").serializeArray();
  var chemicalFormula = $("#chemicalFormula").val();
  let category = $('.meta-selected-category').attr('data-index');
  let brand = $('.meta-selected-brand').attr('data-index');
  let note = $("#note").val();
  let usr = $(this).attr('data-usr');
  // Change value after serializing the form
  // user htmlDecode() method to decode OR php html_entity_decode() method. 

  data.find(item => item.name === 'mytextarea').value = htmlEncode(chemicalFormula);
  data.find(item => item.name === 'category').value = htmlEncode(category);
  data.find(item => item.name === 'chemBrand').value = htmlEncode(brand);
  data.push({name: 'note', value: note});
  $.ajax({
    url: URL_ROOT + "/admin/add",
    type: "POST",
    data: $.param(data),
    beforeSend: function(){
      $("#save-form").show(100);
    },
    success: function (data) {
			setTimeout(function(){
			//   window.location.href ="/admin/form"
			  showAlertFloat("","Chemical is Addedd");
			  $("#save-form").hide(100);
			}, 3000);
      
      log("Der","130.23.23.123","Add chemical",1);
    },
    error: function (e) {
      console.log(e);
    }
  });
  // console.log(decoded);
});

$(document).on("click", "#save-update-chem", function (e) {
  e.preventDefault();
  var data = $("#chemicalAddUpdate").serializeArray();
  var chemicalFormula = $("#chemicalFormula").val();
  let category = $('.meta-selected-category').attr('data-index');
  let brand = $('.meta-selected-brand').attr('data-index');
  let note = $("#note").val();
  let usr = $(this).attr('data-usr');
  // Change value after serializing the form
  // user htmlDecode() method to decode OR php html_entity_decode() method. 

  data.find(item => item.name === 'mytextarea').value = htmlEncode(chemicalFormula);
  data.find(item => item.name === 'category').value = htmlEncode(category);
  data.find(item => item.name === 'chemBrand').value = htmlEncode(brand);
  data.push({name: 'note', value: note});
  $.ajax({
    url: URL_ROOT + "/admin/updateChemical",
    type: "POST",
    data: $.param(data),
    beforeSend: function(){
      $("#save-form").show(100);
    },
    success: function (data) {
      setTimeout(function(){
      //   window.location.href ="/admin/form"
        showAlertFloat("","Chemical is Addedd");
        $("#save-form").hide(100);
      }, 3000);
      
      log("Der","130.23.23.123","Add chemical",1);
    },
    error: function (e) {
      console.log(e);
    }
  });
  // console.log(decoded);
});

function htmlEncode(value) {
  if (value) {
    return jQuery('<div />').text(value).html();
  } else {
    return '';
  }
}
function htmlDecode(value) {
  if (value) {
    return $('<div />').html(value).text();
  } else {
    return '';
  }
}
$(document).on("click", ".setup-btn", function () {
  var form = $(this).attr("data-form");
  var link = $(this).attr("data-link");
  /* Admin configuration Script*/
  var current, next, prev;

  current = $(this).parent();
  next = $(this)
    .parent()
    .next();

  if (form == 1) {
    /* progress */
    $(".progress li")
      .eq($("div.awesome").index(next))
      .addClass("active");
    current.hide();
    next.show();
    animate(current, next);
  }

  if (form == 2) {
    var dbCon = $("#c-n").serializeArray();
    /* Check for the inputs if they are valid */
    $.ajax({
      url: URL_ROOT + "/init/adminSetup",
      type: "POST",
      dataType: "json",
      data: $.param(dbCon),
      success: function (data) {
        /* If inputs are valid show connecting to the DB */
        if (data["status"] == 1) {
          $(".modal")
            .show(100)
            .animate({ opacity: "1" }, 300);
          $(".loadingTxt").text("Connecting to database");
          $(".loading")
            .show(100)
            .animate({ opacity: "1", "margin-right": "25%" }, 800);
          $.ajax({
            url: URL_ROOT + "/init/configGen",
            type: "POST",
            dataType: "json",
            data: $.param(dbCon),
            success: function (data) {
              if (data["status"] == 1) {
                $.ajax({
                  url: URL_ROOT + "/init/err",
                  type: "POST",
                  dataType: "json",
                  success: function (data) {
                    /* If this goes wrong error will throw up*/
                    if (data["error"] == 0) {
                      $.ajax({
                        url: URL_ROOT + "/init/uploadTable",
                        dataType: "json",
                        beforeSend: function () {
                          setTimeout(function () {
                            $(".loadingTxt").text("Uploading Tables");
                          }, 5000);
                        },
                        success: function (data) {
                          /* Checking SQL upload status*/
                          setTimeout(function () {
                            if (data["error"] == 0) {
                              $(".modal").hide(100);
                              $(".loading").hide();
                              $(".error").hide();
                              /* progress */
                              $(".progress li")
                                .eq($("div.awesome").index(next))
                                .addClass("active");
                              current.hide();
                              next.show();
                              animate(current, next);
                            } else {
                              $(".loading")
                                .animate(
                                  { opacity: "0", "margin-right": "50%" },
                                  300
                                )
                                .hide(50);
                              $(".error")
                                .delay(130)
                                .animate(
                                  { opacity: "1", "margin-right": "25%" },
                                  800
                                );
                            }
                          }, 5000);
                        }
                      });
                    } else {
                      $(".loading")
                        .animate({ opacity: "0", "margin-right": "50%" }, 300)
                        .hide(50);
                      $(".error")
                        .delay(130)
                        .animate({ opacity: "1", "margin-right": "25%" }, 800);
                    }
                  },
                  error: function (e) {
                    console.log(e);
                  }
                });
              } else {
                $(".loading")
                  .animate({ opacity: "0", "margin-right": "50%" }, 300)
                  .hide(50);
                $(".error")
                  .delay(130)
                  .animate({ opacity: "1", "margin-right": "25%" }, 800);
              }
            }
          });
        } else {
          if (data["DB_HOST_err"]) {
            /* Get the parent/container of the input field for firstname and */
            feedbackShow("dbVal", data["DB_HOST_err"]);
          } else {
            feedbackHide("dbVal");
          }

          if (data["DB_NAME_err"]) {
            /* Get the parent/container of the input field for firstname and */
            feedbackShow("hostVal", data["DB_NAME_err"]);
          } else {
            feedbackHide("hostVal");
          }

          if (data["DB_USER_err"]) {
            /* Get the parent/container of the input field for firstname and */
            feedbackShow("userVal", data["DB_USER_err"]);
          } else {
            feedbackHide("userVal");
          }
        }
      },
      error: function (e) {
        console.log(e);
      }
    });
    // $('.progress li').eq($('div.awesome').index(next)).addClass('active');

    // current.hide();
    // next.show();
    // animate(current, next);
  }

  if (form == 3) {
    var ch_site = $("#sf_site_info").serializeArray();
    var fd = new FormData();
    var photo_data = $("#imgInp").prop("files")[0];
    var siteName = $("input[name=siteName").val();
    var adminEmail = $("input[name=adminEmail").val();
    var adminUserName = $("input[name=adminUserName").val();
    var adminUserPass = $("input[name=adminUserPass").val();
    var adminUserCPass = $("input[name=adminUserCPass").val();
    fd.append("siteLogo", photo_data);
    fd.append("siteName", siteName);
    fd.append("adminEmail", adminEmail);
    fd.append("adminUserName", adminUserName);
    fd.append("adminUserPass", adminUserPass);
    fd.append("adminUserCPass", adminUserCPass);

    $.ajax({
      url: URL_ROOT + "/init/chSetup",
      type: "POST",
      dataType: "json",
      processData: false, // important
      contentType: false, // important
      // data: $.param(ch_site),
      data: fd,
      success: function (data) {
        if (data["status"] == 1) {
          $("body").css("overflow", "hidden");
          $(".modal")
            .show(100)
            .animate({ opacity: "1" }, 300);
          $(".finish").animate({ opacity: "1", "margin-right": "25%" }, 800);
        } else {
          if (data["siteName_err"]) {
            /* Get the parent/container of the input field for firstname and */
            feedbackShow("siteVal", data["siteName_err"]);
          } else {
            feedbackHide("siteVal");
          }

          if (data["adminEmail_err"]) {
            /* Get the parent/container of the input field for firstname and */
            feedbackShow("adminEmailVal", data["adminEmail_err"]);
          } else {
            feedbackHide("adminEmailVal");
          }

          if (data["adminUserName_err"]) {
            /* Get the parent/container of the input field for firstname and */
            feedbackShow("adminUserVal", data["adminUserName_err"]);
          } else {
            feedbackHide("adminUserVal");
          }

          if (data["adminUserPass_err"]) {
            /* Get the parent/container of the input field for firstname and */
            feedbackShow("adminPassVal", data["adminUserPass_err"]);
          } else {
            feedbackHide("adminPassVal");
          }

          if (data["adminUserCPass_err"]) {
            /* Get the parent/container of the input field for firstname and */
            feedbackShow("adminCPassVal", data["adminUserCPass_err"]);
          } else {
            feedbackHide("adminCPassVal");
          }
        }
      },
      error: function (e) {
        console.log(e);
      }
    });
  }

  /* if setup this is the link*/
  if (link == "login") {
    window.location.href = URL_ROOT + "/admin/login";
  }
});
/* Admin initialization*/
$(document).on("click", ".error > span", function () {
  $(".error").animate({ opacity: "0", "margin-right": "50%" }, 800);
  $(".modal")
    .delay(500)
    .animate({ opacity: "0" }, 300)
    .hide(100);
});

$(document).on("click", ".login-admin", function () {
  login();
});

$("#loginCredentials").keypress(function (e) {
  if (e.keyCode == 13) {
    login();
  }
});
function login() {
  var adminData = $("#loginCredentials").serializeArray();
  $.ajax({
    url: URL_ROOT + "/init/adminLogin",
    type: "POST",
    dataType: "json",
    data: $.param(adminData),
    success: function (data) {
          let state = 0;
          if (data["data"].status == 1 && data["row"].fId != "") {
            feedbackDefault("f-form");
            state = 1;
            console.log(window.location.href)
            window.location.href = URL_ROOT + "/admin";
          } else if (data["data"].status == 2) {
            console.log(data["data"].status);
            // log("Der","130.23.23.123","Add Login",1);

            // log(data['data'].adminUserName,p,"SLogin attempt",1);
            $("#flash-msgs").show();
              // .effect("shake", { times: 4 }, 1000);
          } else {
            if (data["data"].adminUserName_err) {
              // log(data['data'].adminUserName,p,"Login attempt",0);
              /* Get the parent/container of the input field for firstname and */
              feedbackShow("adminUVal", data["data"].adminUserName_err);
            } else {
              feedbackHide("adminUVal");
            }
    
            if (data["data"].adminUserPass_err) {
              // log(data['data'].adminUserName,pos.geoplugin_request,"Login attempt",0);
              /* Get the parent/container of the input field for firstname and */
              feedbackShow("adminPVal", data["data"].adminUserPass_err);
            } else {
              feedbackHide("adminPVal");
            }
          }
          log(data['data'].adminUserName,"Login attempt",state);
    },
    error: function (err) {
      console.log(err);
    }
  });
}
function getOrigin() {
}
function animate(current, next) {
  var left, opacity, scale;
  current.animate(
    { opacity: 0 },
    {
      step: function (now, _mx) {
        scale = 1 - (1 - now) * 0.2;
        left = now * 50 + "%";
        opacity = 1 - now;
        current.css({ transform: "scale(" + scale + ")" });
        next.css({ left: left, opacity: opacity });
      },
      duration: 800,
      complete: function () {
        current.hide();
      }
    }
  );
}

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $("#blah").attr("src", e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function () {
  $("#blah").show(100);
  readURL(this);
});

/*This two function below will show and hide the feedback during the validation process*/
function feedbackDefault(container) {
  $("." + container + " .form-group > input").removeClass("invalid-box-shadow");
  $("." + container + " .invalid-feedback").hide();
}

function feedbackShow(container, data) {
  $("." + container + " .form-group > input").addClass("invalid-box-shadow");
  $("." + container + " .invalid-feedback")
    .show()
    .text(data);
}

function feedbackHide(container) {
  $("." + container + " .form-group > input").removeClass();
  $("." + container + " .invalid-feedback").hide();
}

// $(document).on("click", ".req_logs_", function() {
//   var stat = $(".request_side").attr("data-status");
//   if (stat == "open") {
//     $(".request_side").attr("data-status", "");
//     $(".request_side").css("right", "-33%");
//   } else {
//     $(".request_side").attr("data-status", "open");
//     $(".request_side").css("right", "0");
//   }
// });

$(window).scroll(function () {
  var w = $(window).scrollTop();
  var e = $(".dashboard-nav").offset().top;
  var t = e - w;
  if (t < -100) {
    console.log("Now");
    // $(".dashboard-nav").css("position","fixed");
  }
});

$(document).on("click", "#notif-icon", function () {
  $(".m_notification").toggleClass("m_notif_show");
});

//todo Here is the permission to show notficaiton

$(document).on("click", "#add_record", function () {
  $(".m_add_hidden").css({"display":"flex"});
  if (!Push.Permission.has()) {
    Push.Permission.request(onGranted, onDenied);
  } else {
    // alert(Push.Permission.has());
  }
  Push.Permission.request(onGranted, onDenied);
  // Push.Permission.DENIED; // 'denied'

  console.log(Push.Permission.has());
  demo();
  // $(".m_notification").print();
  return false;
});
// setInterval(function(){demo()},5000);

var notif = new Audio(URL_ROOT + "/media/audio/notif.mp3");
function demo() {
  Push.create("New request received!", {
    body: "Some data show in here.",
    icon: URL_ROOT + "/img/icons/clock.png",
    link: "/#",
    // timeout: 4000,
    requireInteraction: true,
    onClick: function () {
      console.log("Fired!");
      window.focus();
      this.close();
    },
    vibrate: [200, 100, 200, 100, 200, 100, 200]
  });
  notif.play();
  // playSound(URL_ROOT + '/media/audio/notif');
}
// callback For Push Notification if Granted
function onGranted() { }
// callback For Push Notification if Denied
function onDenied() { }

// function playSound(filename){
//   var mp3Source = '<source src="' + filename + '.mp3" type="audio/mpeg">';
//   var oggSource = '<source src="' + filename + '.ogg" type="audio/ogg">';
//   var embedSource = '<embed hidden="true" autostart="true" loop="false" src="' + filename +'.mp3">';
//   document.getElementById("sound").innerHTML='<audio autoplay="autoplay">' + mp3Source + oggSource + embedSource + '</audio>';
// }
// $("#tinymce").submit(function (e) {
//   e.preventDefault();
//   // var name = $('#mytextarea').val();

//   console.log($("#chemicalFormula").val());
// });

// Precaution Selection
$(document).on("change", "#pre_warning_label", function () {
  var option = $(this).val();
  var content =
    "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas commodi incidunt similique";
  $(".caution_note_label").show(100);
  if (option == 1) {
    precaution(
      "/img/icons/safety/sprout.png",
      "Nature Friendly",
      "var(--nature-friendly-label)",
      content,
      "var(--nature-friendly-label)"
    );
  } else if (option == 2) {
    precaution(
      "/img/icons/safety/precaution.png",
      "Proceed with caution",
      "var(--proceed-with-caution-label)",
      content,
      "var(--proceed-with-caution-label)"
    );
  } else if (option == 3) {
    precaution(
      "/img/icons/safety/biohazard.png",
      "Dispose properly",
      "var(--dispose-properly-label)",
      content,
      "var(--dispose-properly)"
    );
  } else if (option == 4) {
    precaution(
      "/img/icons/safety/danger.png",
      "Biohazard",
      "var(--biohazard-label)",
      content,
      "var(--biohazard)"
    );
  } else {
    $(".caution_note_label").hide(100);
  }
});

function precaution(
  icon,
  label_text,
  label_background,
  content,
  content_background
) {
  $("#precaution_icon").attr("src", URL_ROOT + icon);
  $("#precaution_label").text(label_text);
  $("#precaution_label").css("background-color", label_background);
  $("#precaution_content").text(content);
  $(".warning_content").css("background-color", content_background);
}
// End of Precaution Selection

$(document).on("click", ".open_file_ex", function () {
  $(".new_user_photo_set").show(50);
});
$(document).ready(function () {
  $(document).mousemove(function (event) {
    // console.log(event.pageX + ", " + event.pageY);
  });
});
