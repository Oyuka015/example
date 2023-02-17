<link rel="stylesheet" href="/css/mystyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="nav-bar">
    <div class="ys"></div>
    <div class="bar-logo">
        <img src="/images/castle.png" alt="">
    </div>
    <div class="bar-menus">
        <div class="bar-menu">
            <i class="fa-solid fa-house"></i>
            <div class="bar-sub">
                <a href="">Home</a>
            </div>
        </div>
        <div class="bar-menu">
            <a href="/admin/online">
                <i class="fa-solid fa-book"></i>
                <div class="bar-sub">
                    <a href="/admin/online">Lessons</a>
                </div>
            </a>
        </div>
        <div class="bar-menu">
           <a href="/admin/exam">
            <i class="fa-solid fa-square-check"></i>
                <div class="bar-sub">
                    <a href="/admin/exam">Exam</a>
                </div>
           </a>
        </div>
        <div class="bar-menu">
            <a href="/admin/certificate">
                <i class="fa-solid fa-graduation-cap"></i>
                <div class="bar-sub">
                    <a href="/admin/certificate">Certificate</a>
                </div>
            </a>
        </div>
    </div>
    <div class="bar-logout">
        <div class="bar-menu">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <div class="bar-sub">
                <a href="logout">Log out</a>
            </div>
        </div>
    </div>
</div>
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
        <div style="text-align:center;">banner ch ymu neg ym bnaa</div>
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
                    <div>Dr. Alisha Nicholls</div>
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
            <button class="pro-edit-button"><i class="fa-solid fa-pen-to-square"></i></button>
        </div>
        <div>
            <div style="text-align:center; color:white;">calendariiin orond neg ym hiih bhda</div>
        </div>
    </div>
</div>
<style>
    body{
        display:flex;
        background-color:#1D1F1F;    
    }
    ::placeholder{
        color:rgba(255, 251, 251, 0.952)
    }
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
          beginAtZero: true
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
        borderWidth: 1
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