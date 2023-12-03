<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Display</title>
  <style>
    body {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #fff; /* Set your desired background color */
    }

    #header {
      width: 100%;
      padding: 20px;
      box-sizing: border-box;
      text-align: left;
      position: absolute;
      top: 0;
      left: 0;
    }

    #logo {
      max-width: 100px; /* Adjust the maximum width as needed */
      height: auto;
    }

    #container {
      text-align: center;
      margin-top: 80px; /* Adjust the margin-top based on the logo's height */
    }

    #toggleButton {
      cursor: pointer;
      background-color: #fff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    #toggleButton:hover {
      background-color: #fff; /* Darken the color on hover */
    }

    #toggleButton:active {
      transform: scale(0.95); /* Add a slight scale-down effect on click */
    }

    #dataScreen {
      width: 100%;
      max-width: 1200px;
      margin: 20px auto;
      padding: 20px;
      box-sizing: border-box;
      overflow-x: auto;
      /* border: 1px solid #333;
      border-radius: 8px; */
      /* background-color: #fff; */
    }

    #dataList {
      width: 100%;
      border-collapse: collapse;
    }

    #dataList th, #dataList td {
      padding: 12px;
      border: 1px solid #ddd;
      text-align: left;
    }

    #dataList th {
      background-color: #3498db;
      color: #fff;
    }

    #dataList tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #dataList tr:hover {
      background-color: #ddd;
    }
  </style>
</head>
<body>

<div id="header">
  <img id="logo" src="/images/utp.png" alt="Your Logo">
</div>

<div id="container">
  <form action="{{ route('clickButton.btnclicked') }}" method="GET">
    <button class="clickable-button" id="toggleButton">
      <!-- <a href="{{ route('clickButton.btnclicked') }}"></a> -->
      <img src="/images/power-on.png" alt="Power On Icon" height="80" width="80">
    </button>
  </form>
  <div id="dataScreen">
    <table id="dataList">
      <thead>
        <tr>
          <th>Timestamp</th>
          <th>Visitor</th>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $item)
          <tr>
            <td>{{$item->timestamp}}</td>
            <td>{{$item->visitor}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

</body>
</html>
