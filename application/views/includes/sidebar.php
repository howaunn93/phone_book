<style>
  .sidebar {
    height: 100vh;
    width: 160px;
    position: fixed;
    top: 0;
    left: 0;
    background-color: #2c3e50;
    padding-top: 0;
    transition: width 0.3s ease;
    overflow-x: hidden;
  }

  .sidebar a {
    display: flex;
    align-items: center;
    padding: 12px 20px;
    color: #fff;
    text-decoration: none;
    font-size: 18px;
    white-space: nowrap;
    transition: padding 0.3s ease;
  }

  .sidebar a i {
    margin-right: 10px;
    font-size: 20px;
  }

  .sidebar a span {
    transition: opacity 0.3s ease;
  }
  
  .sidebar {
    z-index: 1;
  }

  @media screen and (max-width: 767px) {
    .sidebar {
      width: 40px;
    }

    .sidebar a {
      padding: 12px 10px;
    }

    .sidebar a span {
      opacity: 0;
      width: 0;
      overflow: hidden;
    }

    .sidebar a i {
      margin-right: 0;
    }
  }
</style>


<div class="sidebar">
  <a href="<?php echo base_url(); ?>">
    <i class='fas fa-address-book'></i><span> PhoneBook</span>
  </a>
</div>
