<style>
  .footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 30px;
    background-color: lightgray;
    color: #f2f2f2;
    font-size: 14px;
    z-index: 0;

    display: flex;
    align-items: center;
    justify-content: center;
  }

  .footer p {
    margin: 0;
    padding: 0;
  }
</style>

<div class="footer">
  <p>&copy; <span id="year"></span></p>
</div>

<script>
  $('#year').text(new Date().getFullYear());
</script>