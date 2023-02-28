<link rel="stylesheet" href="/css/mystyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<header>
    <div class="h-container">
        <div class="logo">
            <img src="{{ URL('images/logo.png') }}" alt="">
        </div>
        <div class="menu">
          <a href="/admin/dashboard"  class="link">
            <i class="fa-solid fa-chart-line"></i>
            <div>{{trans('display.dashboard')}}</div>
          </a>
          <a href="/admin/information"  class="link">
                <i class="fa-solid fa-bell"></i>
                <div>{{trans("display.information")}}</div>
              </a>
              <a href="/admin/online"  class="link">
                <i class="fa-solid fa-graduation-cap"></i>
                <div>{{trans('display.online_course')}}</div>
              </a>
              <div class="dropdown">
                <button class="dropbtn">
                  <a id="sub" href="/admin/exam"  class="link">
                    <i class="fa-solid fa-square-check"></i>
                    <div>{{trans('display.exam')}}</div>
                  </a>
                </button>
                <div class="dropdown-content">
                  <a href="/admin/exam">{{trans('display.exam')}}</a>
                  <a href="/admin/question">{{trans('display.question')}}</a>
                  <a href="/admin/result">{{trans('display.exam_takers')}}</a>
                </div>
              </div>
            <!-- <a id="sub" href="/admin/exam"  class="link">
              <i class="fa-solid fa-graduation-cap"></i>
              <div>{{trans('display.exam')}}</div>
            </a> -->
            <a href="/admin/certificate"  class="link">
                <i class="fa-solid fa-certificate"></i>
                <div>{{trans('display.certificate')}}</div>
            </a>
            <a href="/admin/faq"  class="link">
                <i class="fa-solid fa-circle-info"></i>
                <div>{{trans('display.faq')}}</div>            
            </a>
            <a href="/admin/feedback"  class="link">
                <i class="fa-solid fa-envelope"></i>
                <div>{{trans('display.feedback')}}</div>
            </a>
            <a href="/admin/users"  class="link">
              <i class="fa-solid fa-user"></i>
              <div>{{trans('display.user')}}</div>
            </a>
        </div>
        <div class="dropdown">
          <button class="dropbtn">
              <a href="/profile" class="header-user-profile"><i class="fa-solid fa-user"></i></a>
          </button>
          <div style="right:0;" class="dropdown-content">
              <a href="/profile">{{trans('display.profile')}}</a>
              <a href="/do/logout">{{trans('display.log_out')}}</a>
          </div>  
        </div>
    </div>
</header>
<div style="display:flex; margin-bottom:30px;">
    <div class="main-section">
        <div class="main-sec-search">
            <div class="searchu">
                <input type="search" placeholder="Search...">
                <div class="searchu-i"><i class="fa-solid fa-search"></i></div>
            </div>
            <div class="searchu-button">
                <div class="s-b-1">
                    <i class="fa-solid fa-bell"></i>
                </div>
                <div class="s-b-1">
                    <i class="fa-solid fa-comments"></i>
                </div>
            </div>
        </div>
        <div class="main-sec-banner">
            <div style="text-align:center;  color: rgba(255, 251, 251, 0.952);">banner</div>
        </div>
        <div class="main-sec-3part">
            <div class="part-3">
                
            </div>
            <div class="part-3">
    
            </div>
            <div class="part-3">
    
            </div>
        </div>
        <div class="main-sec-2-big">
            <div class="big-part">
                <div style="width:100%; height:100%;">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
            <div class="big-part">
                <div style="width:100%; height:100%;">
                    <canvas id="hisChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="admin-profile-section">
        <div class="admin-pro">
            <div class="my-profile">
                <div style="align-self:center;">MY PROFILE</div>
                <button class="pro-edit-button"><i class="fa-solid fa-pen-to-square"></i></button>
            </div>
            <div class="admin-info">
                <div class="ad-pic">
                    <div class="ad-img">
                        <img src="/images/default-avatar.png" alt="pro-img">
                    </div>
                    <div class="ad-fo">
                        <div>{{$userData->firstname}}</div>
                        <div>DENTIST</div>
                    </div>
                </div>
                <div class="ad-in">
                    <div class="adin">
                        <div class="adin-q">Date Birth</div>
                        <div class="adin-a">17.07.80</div>
                    </div>
                    <div class="adin">
                        <div class="adin-q">Blood</div>
                        <div class="adin-a">A(||)</div>
                    </div>
                    <div class="adin">
                        <div class="adin-q">Working Hours</div>
                        <div class="adin-a">9am-5pm</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="admin-tool">
            <div class="my-profile">
                <div style="align-self:center;">CALENDAR</div>
                <!-- <button class="pro-edit-button"><i class="fa-solid fa-pen-to-square"></i></button> -->
                <select name="months" id="months">
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
            </div>
            <div>
                <div style="text-align:center; color:white;"></div>
            </div>
        </div>
    </div>
</div>
<style>
    body{
      background-color:#10152b;    
      /* background-color: #002024;  */
      /* background-color: #001e22;     */
    }
    header{
      /* background-color: #00a98d; */
      background-color: #51c5b3;
      opacity: 1;
    }
    .menu a.link{
      /* color:rgb(82 82 82); */
      color:#000000b6;
    }
    ::placeholder{
      color:rgba(255, 251, 251, 0.952)
    }
    select{
      background-color: #95e0e4;
      border:none;
      width: auto;
      height: 25px;
      border-radius: 5px;
      align-self:center;
      outline: none;
    }
    .dropbtn {
      background-color: inherit;
      font-size: 16px;
      border: none;
    }
    .dropdown {
      position: relative;
      display: inline-block;
    }
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      white-space:nowrap;
    }

    .dropdown:hover .dropdown-content {display: block;}
</style>
<!-- chart scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
        
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        }
      }
    }
  });

  const crx = document.getElementById('hisChart');
  new Chart(crx, {
    type: 'bar',
    data: {
      labels: ['bum ah', 'wee', 'bumaa ah', 'woo', 'sumya ah', 'wii'],
      datasets: [{
        label: '# of Votes',
        data: [30, 19, 3, 8, 12, 3],
        borderWidth: 1,
        backgroundColor: '#73ccbe'
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>