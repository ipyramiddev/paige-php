<?php
session_start();
require_once 'config.php';
include('partials/header.php');
?>
<style>
    .wrap {
        padding: 30px 20px;
        margin-top:70px;
        padding-bottom: 0px;
    }
    .form-step {
        margin-bottom: 30px;
    }
    .form-row {
        display: flex;
        margin-bottom: 10px;
        font-size: 16px;
    }
    .form-row label {
        flex: 0 0 110px;
        line-height: 30px;
    }
    h3.step {
        font-size: 18px;
        font-weight: bold;
        color: #325754;
        margin-bottom: 10px;
    }
    .form-row input, .form-input input, .form-row select {
        flex-grow: 1;
        border: 1px solid #325754;
        height: 30px;
        outline: none;
        padding: 0 10px;
        border-radius: 4px;
    }
    .w-full {
        width: calc(100% - 50px);
    }
    .notice {
        /* border: 2px solid red; */
        padding: 10px;
        border-radius: 5px;
        color: #777977;
        margin: 30px 0 40px;
        background: #f0f0eb;
    }
    .extra-text {
        margin-top:20px;
    }
    @media(max-width: 767px) {
        .submit-btn {
            background-color: red;
            padding: 11px 24px;
            font-size: 1rem;
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

        .submit-btn:hover:hover {
            background-color: red;
            border-color: red;
        }
    }
</style>
<div class="wrap">
    <div class="form">
        <form action="./page4.php" method="POST" id="detailsForm" novalidate>
            <input type="hidden" name="contact_number" value="<?php echo  isset($_SESSION['step1Data']['username']) ? $_SESSION['step1Data']['username'] : ''; ?>">
            <div class="form-step">
                <h3 class="step">獎賞寄送地址</h3>
                <div class="form-row">
                    <label for="">收件人姓名</label>
                    <div class="input-text w-full">
                        <input type="text" name="recipients_name" class="w-full">
                    </div>
                </div>
                <div class="form-row">
                    <label for="">區域</label>
                    <div class="input-text w-full">
<!--                        <select name="country" class="w-full">-->
<!--                            <option value="中華人民共和國香港特別行政區">中華人民共和國香港特別行政區</option>-->
<!--                            <option value="中華人民共和國">中華人民共和國</option>-->
<!--                            <option value="臺灣">臺灣</option>-->
<!--                            <option value="澳門">澳門</option>-->
<!--                            <option value="other">其他（請輸入）</option>-->
<!--                        </select>-->
                         <input type="text" name="country" required class="w-full">
                    </div>
                </div>
                <div class="other-country-row"></div>
                <div class="form-row">
                    <label for="">地區</label>
                    <div class="input-text w-full">
<!--                        <select name="idtype" class="w-full">-->
<!--                            <option value="香港身份證">香港身份證</option>-->
<!--                            <option value="護照">護照</option>-->
<!--                        </select>-->
                         <input type="text" name="idtype" class="w-full">
                    </div>
                </div>
                <div class="form-row">
                    <label for="">詳細街道地址</label>
                    <div class="input-text w-full">
                        <input type="text" name="id_number" class="w-full">
                        <!-- <input type="text" name="details_address" class="w-full"> -->
                    </div>
                </div>

            </div>

            <div class="center"><button class="btn submit-btn" name="submit" type="submit">確定</button></div>
        </form>
        <div class="extra-text">
            <h3>條款以及細則</h3>
            <div class="notice" style="margin-top:0px;font-size:13px;">
                <p>以上所有優惠詳情請參閱有關優惠或獎賞的條款及細則。</p>
                <p>中國移動香港保留隨時更改或終止此優惠、修訂此條款及細則的權利，而恕不另行通知。如有任何爭議，中國移動香港將保留一切最終決定權。</p>
            </div>
        </div>
    </div>



</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.slim.min.js" integrity="sha512-yBpuflZmP5lwMzZ03hiCLzA94N0K2vgBtJgqQ2E1meJzmIBfjbb7k4Y23k2i2c/rIeSUGc7jojyIY5waK3ZxCQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>
    //script to check input
    // jQuery('.form-step input').on('input', function() {
    //     let check = true;
    //     jQuery('.form-step input').each(function() {
    //         if (jQuery(this).val() == '') check = false;
    //         console.log(jQuery(this).val());

    //     });
    //     console.log(check);

    //     if (check) jQuery('.btn').removeClass('disabled');
    //     else jQuery('.btn').addClass('disabled')
    // });
    jQuery(document).ready(function() {
        jQuery('select[name=country]').change(function() {
            if (this.value == 'other') {
                jQuery('.other-country-row').html('<div class="form-row other-country"><label for=""></label><div class="input-text w-full other-country-input"><input type="text" name="other_country" class="w-full"></div></div>');
            } else
                jQuery('.other-country-row').html();
        })
    });
</script>

<script>
    jQuery.extend(jQuery.validator.messages, {
        required: "請檢查並填寫正確的內容"
    });
    $("#detailsForm").validate({
        rules: {
            recipients_name: "required",
            country: "required",
            idtype: "required",
            id_number: "required",
            contact_number: "required",
        }
    });
</script>

<?php
include('partials/footer.php');
