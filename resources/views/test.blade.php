<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style> 
    *{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    }
    .header-section{
        width: 100%;
        height: 100vh;
        position: relative;
        background: url(https://img.freepik.com/free-photo/woman-with-headset-having-video-call-laptop_23-2148854872.jpg?w=900&t=st=1669879785~exp=1669880385~hmac=ad9c2f51a3a364ebcd036004bab3232bf0bd7bd10fa347e1b78bf68fbcf7e558) no-repeat;
        background-size: cover;
        background-position: center;
    }


    header{
        width:100%;
        height:100px;
        background-color: #00a98d65;
    }
    .h-container{
        max-width: 1400px;
        margin: auto;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 40px;
    }
    .logo{
        width:300px;
        height: 100%;
        margin: 20px 0;
        padding:10px 0;
    }
    .logo img{
        width:100%;
        height:100%;
    }
    .menu{
        display: flex;
        justify-content: space-evenly;
        align-items: center;
        gap: 40px;
    }
    .menu .link {
        position: relative;
        display: flex;
        align-items: center;
        gap: 5px;
        color: rgba(0, 0, 0, 0.715);
        font-size:0.9rem;
        font-weight: 700;
    }
    .menu .link::after {
        content: '';
        position:absolute;
        left:0;
        bottom:-4px;
        height:3px;
        width:0px;
        /* background-color: #41c85a; */
        /* background-color: #468A7D; */
        background-color: #0C4F60;
        transition: 0.4s ease;
    }
    .menu .link:hover::after{
        width: 100%;
    }
    /* content heseg */
    .content{
        max-width: 650px;
        height: 100%;
        /* margin: 60px 100px; */
        display: flex;
        align-items: center;
        margin: 0 100px;
    }
    .content .info h2{
        /* color: #5C9DB5; */
        color: #468A7D;
        font-size: 70px;
        text-transform: uppercase;
        font-weight: 800;
        letter-spacing: 2px;
        line-height: 60px;
        margin-bottom: 30px;
    }
    
    .content .info h2 span{
        color: #97B1AA;
        font-size: 50px;
        font-weight: 600;
    }
    
    .content .info p{
        font-size: 24px;
        font-weight: 500;
        margin-bottom: 40px;
    }
    .btn{
        width: 200px;
        height: 60px;
        /* background: #5C9DB5; */
        background: #468A7D;
        border-radius: 5px;
        padding: 10px 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .content .info-btn{
        color: #fff;
        text-decoration: none;
        text-transform: uppercase;
        font-weight: 500;
        letter-spacing: 2px;
        transition: 0.3s;
        transition-property: background;
    }
    
    .content .btn:hover{
        background: #0C4F60;
        cursor: pointer;
    }


    /* content end */
    main{
        position:relative;
        z-index: 1;
    }
    /* background heseg */
    .background{
        position: relative;
        width: 100%;
        height: 100vh;
    }
    .background img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* section news */
    section.news{
        max-width:1400px;
        margin:auto;
    }

    .news-title, .online-title {
        width:100%;
        margin:80px 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .news-title h1, .online-title p{
        color:#468A7D;
        /* text-align:center; */
        padding:15px;
        font-size: 1.5rem;
        font-weight:700;
    }
    .t-circle{
        width: 10px;
        height: 10px;
        border-radius: 10px;
        background-color: #468A7D;
    }
    .t-line{
        width: 150px;
        height: 3px;
        background-color: #468A7D;

    }
    /* news cart */
    .news-cart{
        display:flex;
        gap:30px;
    }
    .cart{
        width:450px;
        height:550px;
        display:grid;
        grid-template-rows: 70% 30%;
        border-radius: 10px;
        overflow: hidden;
    }
    .news-cart-img img{
        position: relative;
        width:100%;
        height: 100%;
        object-fit:cover;
    }
    .news-cart-content{
        width: 100%;
        height: 100%;
        padding:20px;
        background-color: #eaeaea;
    }

    .news-cart-content-text h1{
        font-size: 30px;
        font-weight: 500;
    }
    .news-cart-content-info{
        display: flex;
        justify-content: space-between;
        margin-top: 25px;
    }
    .news-cart-content-info-icon{
        display:flex;
        align-items:center;
        gap: 5px;
        color: #41c85a;
    }
    .news-cart-content-info-date {
        color: #888;
        font-weight: 600;
    }
    .cart:hover{
        /* box-shadow: x y blur color */
        box-shadow: 5px 10px 18px #888888;
    }
    .news-cart-img{
        transition: transform .75s;
    }

    .cart:hover .news-cart-img{
        transform: scale(1.15);
    }


    /* pic and text  */
    .box{
        width: 100%;
        height: 100vh;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
    }
    .b-text{
        max-width: 70%;
        margin: auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .b-text p:nth-child(1){
        font-size: 30px;
    }
    .b-text p:nth-child(2){
        font-size: 20px;
        margin-top: 20px;
    }
    .b-button{
        width: 130px;
        height: 50px;
        font-size: 30px;
        /* background-color:#468A7D ; */
        /* border-radius: 10px; */
        border: .5px solid black;
        position: relative;
        margin-top: 30px;
        transition: all 0.3s;
    }
    .b-button::after{
        content: "";
        position: absolute;
        top: 120%;
        left: 0;
        height: 100%;
        width: 100%;
        background-color: #468A7D;
        filter: blur(2em);
        opacity: 0.7;
        pointer-events: none;
        transform: perspective(1.5rem) rotateX('35deg') scale(1, 0.6);

    }
    .b-button:hover{
        color: #252525;
        background-color: #468A7D;
        box-shadow: 0 0 1em 0.25em #468A7D, 
        0 0 4em 1em #468A7D, 
        inset 0 0 0.75em 0.25em #468A7D
    }

    .b-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    /* infor */
    .infor{
        width: 100%;
        height: 80vh;
        background-color: #468A7D;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .infor span{
        font-size: 30px;
    }
    /* pic sequence */
    .last-pics{
        display: grid;
        grid-template-columns: repeat(5, 1fr);
    }
    .pics{
        width: 100%;
        height: 50vh;
    }
    .display{
        width: 100%;
        height: 100%;
        position: relative;
        z-index: 1;
    }
    .display img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }


    /* footer */
    footer{
        width: 100%;
        height: auto;
        background-color: #252525;
    }
    .f-container{
        max-width: 1400px;
        margin: auto;
        display: flex;
        justify-content: space-between;
        padding: 30px 0;
        gap: 20px;
    }
    .text{
        font-size: 25px;
        font-weight: 400;
    }
    .i-text{
        margin-top: 20px;
        font-weight: 400;
        font-size: 15px;
        line-height: 2;
    }
    .i-img{
        width: 100%;
        height: 90px;
        overflow: hidden;
        margin-top: 30px;
    }
    .i-img img{
        width: 100%;
        height: 100%;
    }
    .line{
        width: 40px;
        height: 2px;
        margin-top: 15px;
        background-color: #41c85a;
    }
    .intro, .sys, .holboo{
        width: 450px;
        color: white;
    }
    /* sys */

    /* holbo */
    .holboo-info{
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
    .info-1{
        margin-top: 30px; 
    }
    .info-1 p{
        line-height: 2;
    }
    .info-icon{
        margin-top: 40px;
        display: flex;
        gap: 30px;
    }
    .info.icon i{
        display: flex;
        gap: 30px;
    }
    .c-con{
        background-color: #333;
    }
    .copyright{
        color: white;
        max-width: 1400px;
        margin: auto;
        padding: 10px 0;
    }

    .bars{
    display: none;
    }
    .bars:hover{
    cursor:pointer;
}
    @media(max-width:1100px){
        header{
            width: 100%;
        }
        .h-container{
            display: flex;
            justify-content: space-between;
            padding: 0 40px;
        }
        .menu{
            display: none;
        }
        .bars{
            display: block;
            font-size:25px;
        }
        .news, .news-cart{
            max-width: 800px;
            margin: auto;
        }
        .news-title h1, .online-title p{
            color:#468A7D;
            /* text-align:center; */
            padding:15px;
            font-size: 1rem;
            font-weight:700;
        }
        .t-line{
            width: 110px;
            height: 3px;
            background-color: #468A7D;
        }
    }
    @media(max-width:850px){
        .news, .news-cart{
            max-width: 650px;
            margin: auto;
        }
    }
    </style>
</head>
<body>
    <header>
        <div class="h-container">
            <div class="logo">
                    <img src="{{ URL('images/logo.png') }}" alt="">
            </div>
            <div class="menu">
                    <a href="test"  class="link">
                        <i class="fa-solid fa-house"></i>
                        <p>Нүүр</p>
                    </a>
                    <a href="medeelel"  class="link">
                        <i class="fa-solid fa-bell"></i>
                        <p>Мэдээлэл</p>
                    </a>
                    <a href="online"  class="link">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <p>Цахим хичээл</p>
                    </a>
                    <a href="exam"  class="link">
                        <i class="fa-solid fa-square-check"></i>
                        <p>Шалгалт</p>
                    </a>
                    <a href="certi"  class="link">
                        <i class="fa-solid fa-certificate"></i>
                        <p>Гэрчилгээ хайлт</p>
                    </a>
                    <a href="faq"  class="link">
                        <i class="fa-solid fa-circle-info"></i>
                        <p>Асуулт хариулт</p>
                    </a>
                    <a href="feedback"  class="link">
                        <i class="fa-solid fa-envelope"></i>
                        <p>Санал хүсэлт</p>
                    </a>
                    
            </div>
            <div class="bars">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
    </header>
    <div class="header-section">
        <div class="content">
            <div class="info">
                <h2>Lorem <br><span>Be Creative!</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <div class="btn">
                    <a href="login" class="info-btn">нэвтрэх</a>
                </div>
            </div>
        </div>
    </div>
    
    <main>

    <!-- section news -->
    <section class="news">
        <div class="news-title">
            <div class="t-circle"></div>
            <div class="t-line"></div>
            <h1>СҮҮЛД ОРСОН ЗАР/МЭДЭЭЛЭЛ</h1>
            <div class="t-line"></div>
            <div class="t-circle"></div>
        </div>
        <div class="news-cart">
            <div class="cart"> <!-- cart-->
                <div class="news-cart-img">
                    <img src="{{ URl('images/1.jpg') }}" alt="">
                </div>
                <div class="news-cart-content">
                    <div class="news-cart-content-text">
                        <h1>Газрын цахим биржийн танилцуулга</h1>
                    </div>
                    <div class="news-cart-content-info">
                        <div class="news-cart-content-info-icon">
                            <i class="fa-solid fa-eye"></i>
                            <p>0</p>
                        </div>
                        <div class="news-cart-content-info-date ">
                            <p>2022-12-12</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cart"> <!-- cart-->
                <div class="news-cart-img">
                    <img src="{{ URl('images/1.jpg') }}" alt="">
                </div>
                <div class="news-cart-content">
                    <div class="news-cart-content-text">
                        <h1>Газрын цахим биржийн танилцуулга</h1>
                    </div>
                    <div class="news-cart-content-info flex justify-between">
                        <div class="news-cart-content-info-icon">
                            <i class="fa-solid fa-eye"></i>
                            <p>0</p>
                        </div>
                        <div class="news-cart-content-info-date">
                            <p>2022-12-12</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- section online course -->
    <section class="online">
        <div class="online-title">
            <div class="t-circle"></div>
            <div class="t-line"></div>
            <p>ЦАХИМ ХИЧЭЭЛҮҮД</p>
            <div class="t-line"></div>
            <div class="t-circle"></div>
        </div>
        <!-- <div class="online-course">
            <div class="online-cart">
                <div class="online-img">
                    <img src="http://exam.mle.mn/uploaded/images/2020/May/16464.png" alt="">
                </div>
                <div class="online-info">
                    <p>Уул уурхайн газрын төлбөр бодох</p>
                    <p>Газрын кадастрын мэдээллийн сангийн "Ланд менежер" програм хангамжид Уул уурхайн газрын төлбөр бодох</p>
                    <p>2020-05-21</p>
                </div>
            </div>
            <div class="online-cart">
                <div class="online-img">
                    <img src="http://exam.mle.mn/uploaded/images/2020/May/131313.png" alt="">
                </div>
                <div class="online-info">
                    <p>Салбартай хуулийн этгээд бүртгэх</p>
                    <p>Газрын кадастрын мэдээллийн сангийн цахим мэдээллийн системд салбартай хуулийн этгээд бүртгэх</p>
                    <p>2020-05-21</p>
                </div>
            </div>
            <div class="online-cart">
                <div class="online-img">
                    <img src="http://exam.mle.mn/uploaded/images/2019/Oct/9988.jpg" alt="">
                </div>
                <div class="online-info">
                    <p>Газрын кадастрын мэдээллийн санд нэвтрэх</p>
                    <p>Газрын кадастрын мэдээллийн санд нэвтрэх</p>
                    <p>2019-10-31</p>
                </div>
            </div>
            <div class="online-cart">
                <div class="online-img">
                    <img src="http://exam.mle.mn/uploaded/images/2019/Oct/1.jpg" alt="">
                </div>
                <div class="online-info">
                    <p>Газрын кадастрын мэдээллийн санд нэвтрэх</p>
                    <p>Газрын кадастрын мэдээллийн санд нэвтрэх</p>
                    <p>2019-10-31</p>
                </div>
            </div>
            <div class="online-cart">
                <div class="online-img">
                    <img src="http://exam.mle.mn/uploaded/images/2019/Oct/42696560_1115914141890559_4299975996666281984_o.jpg" alt="">
                </div>
                <div class="online-info">
                    <p>Газрын кадастрын мэдээллийн сангийн танилцуулга</p>
                    <p>Лэнд менежер программ хангамж</p>
                    <p>2019-10-31</p>
                </div>
            </div>
        </div> -->
    </section>

    <!-- pic and text sec -->
    <section>
        <div class="box">
            <div class="b-text">
                    <p>Газрын кадастрын мэдээллийн сангийн танилцуулга</p>
                    <p>Лэнд менежер программ хангамж</p>
                    <p>2019-10-31</p>
                    <button class="b-button">Үзэх</button>
            </div>
            <div class="b-img">
                <img src="{{ URL('images/3.jpg') }}" alt="">
            </div>
        </div>
        <div class="box">
            <div class="b-img">
                <img src="{{ URL('images/1.jpg') }}" alt="">
            </div>
            <div class="b-text">
                <p>Уул уурхайн газрын төлбөр бодох</p>
                <p>Газрын кадастрын мэдээллийн сангийн "Ланд менежер" програм хангамжид Уул уурхайн газрын төлбөр бодох</p>
                <p>2020-05-21</p>
                <button class="b-button">Үзэх</button>
            </div>
        </div>
        <div class="box">
            <div class="b-text">
                <p>Газрын кадастрын мэдээллийн санд нэвтрэх</p>
                <p>Газрын кадастрын мэдээллийн санд нэвтрэх</p>
                <p>2019-10-31</p>
                <button class="b-button">Үзэх</button>
            </div>
            <div class="b-img">
                <img src="{{ URL('images/2.jpg') }}" alt="">
            </div>
        </div>
    </section>
    </main>
    <!-- information -->
    <div class="infor">
        <span>Lorem</span>
        <p>ipsum dolor sit amet consectetur adipisicing elit. Animi explicabo libero tempore!</p>
    </div>
    <footer>
        <div class="f-container">
            <div class="intro">
                <div class="f-title">
                    <div class="text">Танилцуулга</div>
                    <div class="line"></div>
                </div>
                <div class="i-text">
                    <p>Цахим шалгалт, гэрчилгээ лавлагаа, цахим хичээл, мэдээ мэдээлэл, зар мэдээ, цахим шалгалт удирдлага хяналт, гэрчилгээ хэвлэлт зэргийг багтаасан сургалтын дараах шалгалт авах систем.</p>
                </div>
                <div class="i-img">
                    <img src="{{URL('images/footer_logo.png') }}" alt="">
                </div>
            </div>
            <div class="sys">
                <div class="f-title">
                    <div class="text">Цахим системүүд</div>
                    <div class="line"></div>
                </div>
            </div>
            <div class="holboo">
                <div class="f-title">
                    <div class="text">Бидэнтэй холбогдох</div>
                    <div class="line"></div>
                </div>
                <div class="holboo-info">
                    <div class="info-1">
                        <div class="info-1-1">
                            <p>Монгол улс, Улаанбаатар, Чингэлтэй дүүрэг, Барилгачдын талбай-3, засгийн газрын XII байр</p>
                        </div>
                        <div class="info-icon">
                            <i class="fa-brands fa-facebook"></i>
                            <i class="fa-brands fa-twitter"></i>
                            <i class="fa-brands fa-youtube"></i>
                        </div>
                    </div>
                    <div class="info-1">
                        <p>Имэйл: info@gazar.gov.mn</p>
                        <p>Утас: +976-51-260638</p>
                        <p>Факс: +976-11-322683</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="c-con">
            <div class="copyright"><p>Copyright 2019 © Газар зохион байгуулалт, геодези, зураг зүйн газар. Хөгжүүлсэн BitSoft</p></div>
        </div>
    </footer>

</body>

</html>