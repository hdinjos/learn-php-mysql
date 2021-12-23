<body>

  <?php
  require("functions.php");
  if (isset($_POST["submit"])) {
    if (addUser($_POST) > 0) {
      echo "
        <script>
          alert('berhasil menambah data');
          document.location.href = 'index.php';
        </script>
    ";
    } else {
      echo "terjadi kesalahan";
    }
  }
  ?>
  <h1>Create users</h1>

  <form method="POST" action="" enctype="multipart/form-data">
    <div>
      <input type="text" name="Name" placeholder="Name" />
    </div>
    <div>
      <input type="text" name="Age" placeholder="Age" />
    </div>
    <div>
      <input type="text" name="Address" placeholder="Address" />
    </div>
    <div>
      <input type="text" name="Hobby" placeholder="Hobby" />
    </div>
    <div>
      <input type="file" name="Avatar" placeholder="Image Profile" />
    </div>
    <div>
      <input type="submit" name="submit" value="Add" />
    </div>
  </form>
</body>