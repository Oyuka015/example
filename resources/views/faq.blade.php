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
header{
    width: 100%;
    /* padding: 10px 100px; */
    height: 100px;
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
    padding: 10px 0;
}
.logo img{
    width: 100%;
    height: 100%;
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
    font-size: 0.9rem;
    font-weight:700;
    text-decoration: none;
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
/* banner content */
.header-section{
    width: 100%;
    height: 35vh;
}
.content{
    position: relative;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.content::before {    
    content: "";
    background-image: url('https://img.freepik.com/premium-photo/white-questions-mark-illustration-yellow-background-copy-space-faq-question-answer-time-by-3d-rendering_50039-2919.jpg?size=626&ext=jpg&ga=GA1.2.821502220.1669877714&semt=sph');
    background-size: cover;
    background-position: center;
    position: absolute;
    top: 0px;
    right: 0px;
    bottom: 0px;
    left: 0px;
    opacity: 0.65;
}
.content h1, .content .h-link a, .content .h-link p{
    position: relative;
    line-height: 1.5;
    color: #252525;
    font-weight: 900;
    text-align: center;
    text-decoration: none;
}
.h-link{
    display: flex;
    gap: 20px;
    font-weight: 450;
}
.h-link p{
    color: #9999;
}
/* faq start */
.q-container{
    max-width: 1400px;
    margin: auto;
    margin-top: 80px;
    margin-bottom: 50px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.q-title h1{
    font-size: 40px;
    color: #252525;
}
.q-title span{
    color: rgb(248, 211, 28);
}
.q-line{
    width: 35px;
    height: 2.5px;
    margin-top: 20px;
    background-color: #252525;
}
.q-list{
    max-width: 1400px;
    margin: auto;
    margin-top: 50px;
}
.list{
    width: 600px;
    margin-bottom: 10px;
}
.list .faq-q{
    width: 100%;
    height: 40px;
    display: flex;
    align-items: center;
    background-color: rgba(194, 190, 190, 0.76);
    padding: 5px 10px;
    font-size: 17px;
    font-weight: 500;
    gap: 10px;
    cursor: pointer;
}
.list .faq-a{
    width: 100%;
    height: 40px;
    padding: 10px 37px 0;
    display: none;
    border: 1px solid rgba(206, 203, 203, 0.726);
}
.list .faq-q p{
    width: 100%;
}
.list.showMenu .faq-a{
    display: block;
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
        font-size: 25px;
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
            <h1>Асуулт хариулт</h1>
            <div class="h-link">
                <a href="test">Нүүр</a>
                <p>/</p>
                <a href="#">Асуулт хариулт</a>
            </div>
        </div>
    </div>
    <div class="q-container">
        <div class="q-title">
            <h1><span>Түгээмэл асуулт</span> хариултууд</h1>
            <div class="q-line"></div>
        </div>
        <div class="q-list">
            <div class="list ">
                <div class="faq-q">
                    <i class="fa-regular fa-circle-dot"></i>
                    <p>Сургалт хэзээ болох вэ?</p>
                </div>
                <div class="faq-a">
                    <p>Сургалт улирал тутамд нэгээс доошгүй удаа зохион байгуулагдана.</p>
                </div>
            </div>
            <div class="list">
                <div class="faq-q">
                    <i class="fa-regular fa-circle-dot"></i>
                    <p>Чадамжийн гэрчилгээ олгох уу?</p>
                </div>
                <div class="faq-a">
                    <p>Сургалт улирал тутамд нэгээс доошгүй удаа зохион байгуулагдана.</p>
                </div>
            </div>
            <div class="list">
                <div class="faq-q">
                    <i class="fa-regular fa-circle-dot"></i>
                    <p>Сургалт хэд хоног явагдах вэ?</p>
                </div>
                <div class="faq-a">
                    <p>Сургалт улирал тутамд нэгээс доошгүй удаа зохион байгуулагдана.</p>
                </div>
            </div>
            <div class="list">
                <div class="faq-q">
                    <i class="fa-regular fa-circle-dot"></i>
                    <p>Сургалтын төлбөр хэд вэ?</p>
                </div>
                <div class="faq-a">
                    <p>Сургалт улирал тутамд нэгээс доошгүй удаа зохион байгуулагдана.</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        let q = document.querySelectorAll(".faq-q");
        for(i=0; i < q.length; i++){
            q[i].addEventListener('click', (e)=>{
                let qParent = e.target.parentElement.parentElement;
                qParent.classList.toggle("showMenu");
            });
        }

    </script>
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