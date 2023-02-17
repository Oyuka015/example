<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Chart.js with Laravel 9</title>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.js" integrity="sha512-k4siP6VHWDrE4iK9tc5xP87gQAXhkOrOVYeOMlkWRe5CjGk+0V6IdO9nVUTByn/LOLXGYp372zWAiHXlvyYttw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js" integrity="sha512-XYCKHbo5QmBRv8QwuQIlXqemaOB4edxoQO0Io3jZQt9Zarms1O4wMRrkKhx0IZdBneph+oYmKznIOpM3/As3eA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.umd.js" integrity="sha512-vCUbejtS+HcWYtDHRF2T5B0BKwVG/CLeuew5uT2AiX4SJ2Wff52+kfgONvtdATqkqQMC9Ye5K+Td0OTaz+P7cw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
</head>
<body>

<div>
  <canvas id="myChart"></canvas>
</div>

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
//     const config = {
//     type: 'bubble',
//     data: data,
//     options: {}
//     };
//     const data = {
//   datasets: [{
//     label: 'First Dataset',
//     data: [{
//       x: 20,
//       y: 30,
//       r: 15
//     }, {
//       x: 40,
//       y: 10,
//       r: 10
//     }],
//     backgroundColor: 'rgb(255, 99, 132)'
//   }]
// };
</script>


</body>
</html>