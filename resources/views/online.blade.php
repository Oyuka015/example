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
    <link rel="stylesheet" href="/css/mystyle.css">
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
                <a href="profile" class="header-user-profile"><i class="fa-solid fa-user"></i></a>
                <div class="bars">
                <i class="fa-solid fa-bars"></i>
                </div>
        </div>
    </header>
    <div class="online-course-header-section">
        <div class="small-header">
            <h1>Цахим хичээл</h1>
            <div class="h-link">
                <a href="test">Нүүр</a>
                <p>/</p>
                <a href="#">Цахим хичээл</a>
            </div>
        </div>
    </div>
    <div class="online-course-main">
        <div class="online-course-list-section">
            <div class="lesson-search">
                <input type="search" placeholder="Search...">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <div class="lesson-list">
                <div class="lesson-title">
                    Уул уурхайн газрын төлбөр бодох
                    Уул уурхайн газрын төлбөр бодох
                    Уул уурхайн газрын төлбөр бодох
                    Уул уурхайн газрын төлбөр бодох
                    Уул уурхайн газрын төлбөр бодох
                </div>
            </div>
        </div>
        <div class="courses">
            <div class="online-courses-title">
                <div class="title-circle"></div>
                <div class="title-line"></div>
                {{trans('display.lessons')}}
                <div class="title-line"></div>
                <div class="title-circle"></div>
            </div>
            <div class="online-courses-lessons">
                <div class="online-courses-lesson-card">
                    <div class="lesson-card-img">
                        <div class="lesson-img">
                            <img src="{{ URL('images/2.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="lesson-card-info">
                        <div class="online-course-lesson-name">Уул уурхайн газрын төлбөр бодох</div>
                        <div class="online-course-lesson_summary">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, quasi vero. Neque.
                        </div>
                        <button class="lesson-card-btn">Үзэх</button>
                    </div>
                </div>
                <div class="online-courses-lesson-card">
                    <div class="lesson-card-img">
                        <div class="lesson-img">
                            <img src="{{ URL('images/2.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="lesson-card-info">
                        <div class="online-course-lesson-name">Уул уурхайн газрын төлбөр бодох</div>
                        <div class="online-course-lesson_summary">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, quasi vero. Neque.
                        </div>
                        <button class="lesson-card-btn">Үзэх</button>
                    </div>
                </div>
                <div class="online-courses-lesson-card">
                    <div class="lesson-card-img">
                        <div class="lesson-img">
                            <img src="{{ URL('images/2.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="lesson-card-info">
                        <div class="online-course-lesson-name">Уул уурхайн газрын төлбөр бодох</div>
                        <div class="online-course-lesson_summary">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, quasi vero. Neque.
                        </div>
                        <button class="lesson-card-btn">Үзэх</button>
                    </div>
                </div>
                <div class="online-courses-lesson-card">
                    <div class="lesson-card-img">
                        <div class="lesson-img">
                            <img src="{{ URL('images/2.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="lesson-card-info">
                        <div class="online-course-lesson-name">Уул уурхайн газрын төлбөр бодох</div>
                        <div class="online-course-lesson_summary">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, quasi vero. Neque.
                        </div>
                        <button class="lesson-card-btn">Үзэх</button>
                    </div>
                </div>
                <div class="online-courses-lesson-card">
                    <div class="lesson-card-img">
                        <div class="lesson-img">
                            <img src="{{ URL('images/2.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="lesson-card-info">
                        <div class="online-course-lesson-name">Уул уурхайн газрын төлбөр бодох</div>
                        <div class="online-course-lesson_summary">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, quasi vero. Neque.
                        </div>
                        <button class="lesson-card-btn">Үзэх</button>
                    </div>
                </div>
                <div class="online-courses-lesson-card">
                    <div class="lesson-card-img">
                        <div class="lesson-img">
                            <img src="{{ URL('images/2.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="lesson-card-info">
                        <div class="online-course-lesson-name">Уул уурхайн газрын төлбөр бодох</div>
                        <div class="online-course-lesson_summary">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, quasi vero. Neque.
                        </div>
                        <button class="lesson-card-btn">Үзэх</button>
                    </div>
                </div>
                <div class="online-courses-lesson-card">
                    <div class="lesson-card-img">
                        <div class="lesson-img">
                            <img src="{{ URL('images/2.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="lesson-card-info">
                        <div class="online-course-lesson-name">Уул уурхайн газрын төлбөр бодох</div>
                        <div class="online-course-lesson_summary">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, quasi vero. Neque.
                        </div>
                        <button class="lesson-card-btn">Үзэх</button>
                    </div>
                </div>
                <div class="online-courses-lesson-card">
                    <div class="lesson-card-img">
                        <div class="lesson-img">
                            <img src="{{ URL('images/2.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="lesson-card-info">
                        <div class="online-course-lesson-name">Уул уурхайн газрын төлбөр бодох</div>
                        <div class="online-course-lesson_summary">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, quasi vero. Neque.
                        </div>
                        <button class="lesson-card-btn">Үзэх</button>
                    </div>
                </div>
                <div class="online-courses-lesson-card">
                    <div class="lesson-card-img">
                        <div class="lesson-img">
                            <img src="{{ URL('images/2.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="lesson-card-info">
                        <div class="online-course-lesson-name">Уул уурхайн газрын төлбөр бодох</div>
                        <div class="online-course-lesson_summary">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, quasi vero. Neque.
                        </div>
                        <button class="lesson-card-btn">Үзэх</button>
                    </div>
                </div>
                <div class="online-courses-lesson-card">
                    <div class="lesson-card-img">
                        <div class="lesson-img">
                            <img src="{{ URL('images/2.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="lesson-card-info">
                        <div class="online-course-lesson-name">Уул уурхайн газрын төлбөр бодох</div>
                        <div class="online-course-lesson_summary">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, quasi vero. Neque.
                        </div>
                        <button class="lesson-card-btn">Үзэх</button>
                    </div>
                </div>
                <div class="online-courses-lesson-card">
                    <div class="lesson-card-img">
                        <div class="lesson-img">
                            <img src="{{ URL('images/2.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="lesson-card-info">
                        <div class="online-course-lesson-name">Уул уурхайн газрын төлбөр бодох</div>
                        <div class="online-course-lesson_summary">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit, quasi vero. Neque.
                        </div>
                        <button class="lesson-card-btn">Үзэх</button>
                    </div>
                </div>
            </div>
        </div>
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