@extends('layouts.main')
@section('custom-css')
<style>
  body {
    margin: 0;
  }

  html {
    box-sizing: border-box;
  }

  *,
  *:before,
  *:after {
    box-sizing: inherit;
  }

  .column {
    float: left;
    width: 33.3%;
    margin-bottom: 16px;
    padding: 0 8px;
  }

  .card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    margin: 8px;
    background-color: #f5f5f5;
  }

  .about-section {
    text-align: center;
    color: black;
    padding: 0px 30px;
  }

  .container {
    padding: 5px 16px;
  }

  .container::after,
  .row::after {
    content: "";
    clear: both;
    display: table;
  }

  .title {
    color: grey;
    font-family: "Trebuchet MS", Helvetica, sans-serif;
  }

  .h2 {
    font-family: Georgia, serif;
  }

  .text {
    font-family: 'Courier New', monospace;
  }

  .card:hover {
    background-color: #d6d6d6;
  }

  @media screen and (max-width: 650px) {
    .column {
      width: 100%;
      display: block;
    }
  }
</style>
@endsection
@section('content')
<div class="about-section">
  <img src="https://continuumsecurityconsultants.com/wp-content/uploads/2021/11/team.png" class="text-align:center;" width="600" height="150">
  <div class="row">
    <div class="column">
      <div class="card border-danger">
        <div class="container">
          <img src="https://bootstrapious.com/i/snippets/sn-about/avatar-1.png" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
          <h2 class="h2">Truc Phuong</h2>
          <p class="title">Leader</p>
          <p class="text">phuong@example.com</p>
        </div>
      </div>
    </div>

    <div class="column">
      <div class="card border-warning">
        <div class="container">
          <img src="https://bootstrapious.com/i/snippets/sn-about/avatar-1.png" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
          <h2 class="h2">Tan Toan</h2>
          <p class="title">Developer</p>
          <p class="text">toan@example.com</p>
        </div>
      </div>
    </div>

    <div class="column">
      <div class="card border-success">
        <div class="container">
          <img src="https://bootstrapious.com/i/snippets/sn-about/avatar-1.png" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
          <h2 class="h2">Thanh Nhan</h2>
          <p class="title">Developer</p>
          <p class="text">nhanvtgcd191366@fpt.edu.vn</p>
        </div>
      </div>
    </div>

    <div class="column">
      <div class="card border-warning">
        <div class="container">
          <img src="https://bootstrapious.com/i/snippets/sn-about/avatar-1.png" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
          <h2 class="h2">Tat Dat</h2>
          <p class="title">Developer</p>
          <p class="text">dat@example.com</p>
        </div>
      </div>
    </div>

    <div class="column">
      <div class="card border-success">
        <div class="container ">
          <img src="https://bootstrapious.com/i/snippets/sn-about/avatar-1.png" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
          <h2 class="h2">Hiep Duc</h2>
          <p class="title">Developer</p>
          <p class="text">duc@example.com</p>
        </div>
      </div>
    </div>

    <div class="column">
      <div class="card border-danger">
        <div class="container">
          <img src="https://bootstrapious.com/i/snippets/sn-about/avatar-1.png" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
          <h2 class="h2">Van Huy</h2>
          <p class="title">Developer</p>
          <p class="text">huy@example.com</p>
        </div>
      </div>
    </div>

    <div class="column">
    </div>

    <div class="column">
      <div class="card border-danger">
        <div class="container">
          <img src="https://bootstrapious.com/i/snippets/sn-about/avatar-1.png" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
          <h2 class="h2">Tan Khoi</h2>
          <p class="title">Developer</p>
          <p class="text">khoi@example.com</p>
        </div>
      </div>
    </div>

    <div class="column">
    </div>
  </div>


  @endsection